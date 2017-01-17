<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\ORM\Entity;
use Cake\Event\Event;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\View\View;
use Cake\I18n\Date;
use Cake\I18n\Time;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class ServerApiController extends AppController
{
    public function initialize()
    {
        $this->viewBuilder()->layout(false);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }

    public function index()
    {
        
    }   

    public function insertTicketByMachine()
    {
        $portableMachinesTable  = TableRegistry::get('portable_machines');
        $flag = false;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (!isset($data['qrcode'])) {
                $result['status'] = false;
                $result['message'] = "qrcode have not found!";
                die(json_encode($result));
            }
            $params = $this->cutQrcode($data['qrcode']);
            $params['qrcode'] = $data['qrcode'];
            if ($params['type'] != 1) {
                $result['status'] = false;
                $result['message'] = "The ticket isn't inserted by portable machine!";
                die(json_encode($result));
            }
            $flag = $this->insertTicket($params);
            
            if (isset($data['latitude']) && isset($data['longtitude'])) {
                $arrUpdate['nameTable'] = "portable_machines";
                $arrUpdate['id'] = $params['id'];
                $arrUpdate['latitude'] = $data['latitude'];
                $arrUpdate['longtitude'] = $data['longtitude'];
                $this->updateLatLong($arrUpdate);
            }
        } 
        $this->responseResult($flag);
    }

    public function checkQrcode()
    {
        $flag = false;
        if ($this->request->is('post')) {
            $busTicketsTable        = TableRegistry::get('bus_tickets');
            $data = $this->request->data();
            if (!isset($data['qrcode'])) {
                $result['status'] = false;
                $result['message'] = "qrcode have not found!";
                die(json_encode($result));
            }
            if (isset($data['arrQR'])) {
                $data['responseResult'] = false;
                $this->intervalInsertTicket($data);
            }
            $params = $this->cutQrcode($data['qrcode']);
            if ($params['type'] != 1) {
                $result['status'] = false;
                $result['message'] = "The ticket isn't inserted by portable machine!";
                die(json_encode($result));
            }
            $busTicketEntity = $busTicketsTable->find()->where(['is_used' => 0]);
            foreach ($busTicketEntity as $key => $value) {
                if ($value->ticket_number == $data['qrcode']) {
                    $busTicketEntity = $busTicketsTable->get($value->id);
                    $busTicketEntity->is_used = 1;
                    $busTicketsTable->save($busTicketEntity);
                    if (isset($data['busId'])) {
                        $data['id'] = $data['busId'];
                        $this->updateLatLongBus($data);
                    }
                    $flag = true;
                    break;
                }
            }
        }
        $this->responseResult($flag);
    }

    public function checkInOutStaff()
    {
        $flag = false;
        if ($this->request->is('post')) {
            $data = $this->request->data();
            if (isset($data['rfId']) && isset($data['busId'])) {
                $data = $this->getIdStaff($data);
                $this->checkInOut($data);
                $flag = true;
            }
        }
        $this->responseResult($flag);      
    }

    public function updateBusPosition()
    {
        $flag = false;
        if ($this->request->is('post')) {
            $data = $this->request->data();
            if (isset($data['busId'])) {
                if (isset($data['arrQR'])) {
                    $data['responseResult'] = false;
                    $this->intervalInsertTicket($data);
                    $flag = true;
                } else {
                    $data['id'] = $data['busId'];
                    $this->updateLatLongBus($data);
                    $flag = true;
                }
            }
        }
        $this->responseResult($flag);   
    }

    public function updateDevicePosition()
    {
        $flag = false;
        if ($this->request->is('post')) {
            $data = $this->request->data();
            $data['nameTable'] = "portable_machines";
            $data['id'] = $data['machineId'];
            $this->updateLatLong($data);
            $flag = true;
        }
        $this->responseResult($flag);
    }

    public function intervalInsertTicket($data)
    {
        $flag = true;
        $arrQR = explode(",", $data['arrQR']);
        foreach ($arrQR as $keyQR => $valQR) {
            $params = $this->cutQrcode($valQR);
            $params['qrcode'] = $valQR;
            $params['is_used'] = 1;
            $params['latitude'] = $data['latitude'];
            $params['longtitude'] = $data['longtitude'];
            $this->insertTicket($params);

            if ($flag) {
                $this->updateLatLongBus($params);
                $flag = false;
            }
        }
        if (!isset($data['responseResult'])) {
            $this->responseResult($flag);
        }
    }

    private function updateLatLongBus($data)
    {
        $table = TableRegistry::get('buses');
        $count = $table->find()->where(['id' => $data['id']])->count();
        if ($count <= 0) {
            $result['status'] = false;
            $result['message'] = "Buses have not found!";
            die(json_encode($result));
        }
        $entity = $table->get($data['id']);
        if (is_numeric($data['longtitude']) && is_numeric($data['latitude'])) {
            $entity->longtitude = str_replace(",","",$data['longtitude']);
            $entity->latitude = str_replace(",","",$data['latitude']);
        } else {
            $entity->longtitude = $entity->longtitude;
            $entity->latitude = $entity->latitude;
        }
        
        if ($table->save($entity)) {
            return true;
        } else {
            $result['status'] = false;
            die(json_encode($result));
        }
    }

    private function getIdStaff($data)
    {
        $staffTable = TableRegistry::get('staffs');
        $staffEntity = $staffTable->findByRfid($data['rfId']);
        if ($staffEntity->count() <= 0) {
            $result['status'] = false;
            $result['message'] = "Staffs have not found!";
            die(json_encode($result));
        }
        foreach ($staffEntity as $key => $value) {
            $data['staffId'] = $value->id;
        }

        return $data;
    }

    private function checkInOut($data)
    {
        $staffShiffsTable = TableRegistry::get('staff_shiffs');
        $staffShiffsEntity = $staffShiffsTable->find()->where(['bus_id' => $data['busId'], 'ended IS' => NULL]);
        if ($staffShiffsEntity->count() > 0) {
            foreach ($staffShiffsEntity as $key => $value) {
                if ($data['staffId'] != $value->staff_id) {
                    $data['id'] = $value->id;
                    $data['staffIdUp'] = $value->staff_id;
                    $this->manageStaffShiffs($data);
                    $data['id'] = NULL;
                    $this->manageStaffShiffs($data);
                } else {
                    $data['id'] = $value->id;
                    $data['staffIdUp'] = $value->staff_id;
                    $this->manageStaffShiffs($data);
                }
            }
        } else {
            $this->manageStaffShiffs($data);
        }
    }

    private function manageStaffShiffs($data)
    {
        $staffShiffsTable = TableRegistry::get('staff_shiffs');
        if (isset($data['id'])) {
            $staffShiffsEntity = $staffShiffsTable->get($data['id']);
            $staffShiffsEntity->staff_id = $data['staffIdUp'];
            $staffShiffsEntity->bus_id = $data['busId'];
            $staffShiffsEntity->ended = date('Y-m-d H:i:s', time());
            $date1 = date_create($staffShiffsEntity->started);
            $date2 = date_create($staffShiffsEntity->ended);
            $staffShiffsEntity->working_hours = date_diff($date1,$date2)->format("%i")/60;
            $staffShiffsTable->save($staffShiffsEntity);
        } else {
            $staffShiffsEntity = $staffShiffsTable->newEntity();
            $staffShiffsEntity->staff_id = $data['staffId'];
            $staffShiffsEntity->bus_id = $data['busId'];
            $staffShiffsEntity->started = date('Y-m-d H:i:s', time());
            $staffShiffsTable->save($staffShiffsEntity);
        }        
    }

    private function insertTicket($params)
    {
        $busesTable = TableRegistry::get('buses');
        $ticketTypesTable = TableRegistry::get('ticket_types');
        $busTicketsTable  = TableRegistry::get('bus_tickets');
        $portableMachinesTable = TableRegistry::get('portable_machines');

        $countTicketTypes = $ticketTypesTable->find()->where(['id' => $params['tt']])->count();
        if ($countTicketTypes <= 0) {
            $result['status'] = false;
            $result['message'] = "Ticket types have not found!";
            die(json_encode($result));
        }
       
        $arrQr = $this->cutQrcode($params["qrcode"]);
        if (!isset($params['used'])) {
            $params['used'] = "20".$arrQr['YY']."-".$arrQr['MM']."-".$arrQr['DD']." ".$arrQr['HH'].":".$arrQr['mm'].":".$arrQr['ss'];
        }
        if (!isset($params['is_used'])) {
            $params['is_used'] = 0;
        }
        
        $busTicketsEntity = $busTicketsTable->newEntity();
        $busTicketsEntity->ticket_price_id = $params['tt'];

        if ($params['type'] == 0) {
            $busTicketsEntity->bus_id = $params['id'];
            $busTicketsEntity->portable_machine_id = 0;
            $countBus = $busesTable->find()->where(['id' => $params['id']])->count();
            if ($countBus <= 0) {
                $result['status'] = false;
                $result['message'] = "Buses have not found!";
                die(json_encode($result));
            }
        } else if ($params['type'] == 1) {
            $busTicketsEntity->bus_id = 0;
            $busTicketsEntity->portable_machine_id = $params['id'];
            $countPortableMachine = $portableMachinesTable->find()->where(['id' => $params['id']])->count();
            if ($countPortableMachine <= 0) {
                $result['status'] = false;
                $result['message'] = "Portable Machines have not found!";
                die(json_encode($result));
            }
        } else {
            $result['status'] = false;
            die(json_encode($result));
        }
        if ($busTicketsTable->find()->where(['ticket_number' => $params['qrcode']])->count() > 0) {
            $result['status'] = false;
            $result['message'] = "qrcode already exists";
            die(json_encode($result));
        }
        $busTicketsEntity->ticket_number = $params['qrcode'];
        $busTicketsEntity->is_used = $params['is_used'];
        $busTicketsEntity->used = $params['used'];
        if ($busTicketsTable->save($busTicketsEntity)) {
            return true;
        } else {
            $result['status'] = false;
            die(json_encode($result));
        }
    }

    private function updateLatLong($data)
    {
        $table = TableRegistry::get($data['nameTable']);
        $count = $table->find()->where(['id' => $data['id']])->count();
        if ($count <= 0) {
            $result['status'] = false;
            die(json_encode($result));
        }
        $entity = $table->get($data['id']);
        if (is_numeric($data['longtitude']) && is_numeric($data['latitude'])) {
            $entity->longtitude = str_replace(",", "",$data['longtitude']);
            $entity->latitude = str_replace(",", "",$data['latitude']);
        } else {
            $entity->longtitude = $entity->longtitude;
            $entity->latitude = $entity->latitude;
        }
        
        if ($table->save($entity)) {
            return true;
        } else {
            $result['status'] = false;
            die(json_encode($result));
        }        
    }

    private function responseResult($flag)
    {
        if ($flag) {
            $result['status'] = true;
        } else {
            $result['status'] = false;
        }
        echo json_encode($result);
    }

    private function cutQrcode($qrcode)
    {
        $qrcode = preg_replace('/[^a-zA-Z0-9\']/', '', $qrcode);
        $qrcode = str_replace("'", '', $qrcode);
        if (strlen($qrcode) == 30 ) {
            if (is_numeric($qrcode)) {
                // 011001171234010854711701174500
                $arr['version'] = (int)substr($qrcode, 0, 2);   // 01
                $arr['type'] = (int)substr($qrcode, 2, 1);      // 1
                $arr['id'] = (int)substr($qrcode, 3, 3);        // 001
                $arr['YY'] = (int)substr($qrcode, 6, 2);        // 17
                $arr['nr'] = (int)substr($qrcode, 8, 4);        // 1234
                $arr['MM'] = (int)substr($qrcode, 12, 2);       // 01
                $arr['code'] = (int)substr($qrcode, 14, 6);     // 085471
                $arr['DD'] = (int)substr($qrcode, 20, 2);       // 17
                $arr['tt'] = (int)substr($qrcode, 22, 2);       // 01
                $arr['HHMMss'] = (int)substr($qrcode, 24, 6);   // 174500

                $arr['HH'] = (int)substr($qrcode, 24, 2);
                $arr['mm'] = (int)substr($qrcode, 26, 2);
                $arr['ss'] = (int)substr($qrcode, 28, 2);

                if ($arr['YY'] != (int)date('y') || $arr['MM'] != (int)date('m') || $arr['DD'] != (int)date('d')) {
                    $result['status'] = false;
                    $result['message'] = "qrcode incorrect!";
                    die(json_encode($result));
                }

                if ($arr['HH'] > 23 || $arr['mm'] > 59 || $arr['ss'] > 59) {
                    $result['status'] = false;
                    $result['message'] = "qrcode incorrect!";
                    die(json_encode($result));
                }
                return $arr;
            } else {
                $result['status'] = false;
                $result['message'] = "qrcode incorrect!";
                die(json_encode($result));
            }
            
            
        } else if (strlen($qrcode) == 40) {
            $result['status'] = false;
            $result['message'] = "Think!";
            die(json_encode($result));
        } else {
            $result['status'] = false;
            $result['message'] = "qrcode incorrect!";
            die(json_encode($result));
        }
    }

}