<?php
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

class AdministratorController extends AppController{
	public function initialize(){
		$arrCSS1 = array(
			'plugins/morris/morris.css',
			'plugins/switchery/switchery.min.css',

			'style.css',
			'custom.css'
		);
		$this->set('arrCSS1', $arrCSS1);

		$arrJS1 = array(
			'modernizr.min.js',
			'jquery.min.js',
			'tether.min.js',
			'bootstrap.min.js',
			'detect.js',
			'fastclick.js',
			'jquery.blockUI.js',
			'waves.js',
			'jquery.nicescroll.js',
			'jquery.scrollTo.min.js',
			'jquery.slimscroll.js',

			'plugins/switchery/switchery.min.js',

			'plugins/morris/morris.min.js',
			'plugins/raphael/raphael-min.js',

			'plugins/waypoints/lib/jquery.waypoints.js',
			'plugins/counterup/jquery.counterup.min.js',

			'jquery.core.js',
			'jquery.app.js',

			'pages/jquery.dashboard.js'


		);
		$this->set('arrJS1', $arrJS1);
		$this->viewBuilder()->layout('administrator');
	}

	public function index()
	{
		
	}

	public function login()
	{
		$this->viewBuilder()->layout('login');
	}

	public function users()
	{

	}

	public function addUser()
	{
		$usersTable = TableRegistry::get('users');
		if ($this->request->is('post')) {
			$data = $this->request->data;

			$userEntity = $usersTable->newEntity();

			$this->redirect(
		        array('controller' => 'Administrator', 'action' => 'users')
		    );
		}
	}

/* Begin Roles */
	public function roles()
	{
		$rolesTable  = TableRegistry::get('roles');
		$rolesEntity = $rolesTable->find();
		$this->set("listRole", $rolesEntity);
	}

	public function addRole()
	{
		$rolesTable  = TableRegistry::get('roles');
        if ($this->request->is('post')) {
            $data = $this->request->data;

        	$rolesEntity = $rolesTable->newEntity();
        	if (trim($data['nameRole']) != null) {
        		$rolesEntity->name = $data['nameRole'];
        	}
        	$rolesTable->save($rolesEntity);

	        $this->redirect(
		        array('controller' => 'Administrator', 'action' => 'roles')
		    );
        }
	}

	public function editRole($id)
	{
		$rolesTable  = TableRegistry::get('roles');
		$rolesEntity = $rolesTable->get($id);
		$this->set("role", $rolesEntity);
        if ($this->request->is('post')) {
            $data = $this->request->data;

        	
        	if (trim($data['nameRole']) != null) {
        		$rolesEntity->name = $data['nameRole'];
        	}
        	$rolesTable->save($rolesEntity);

	        $this->redirect(
		        array('controller' => 'Administrator', 'action' => 'roles')
		    );
        }
	}

	public function deleteRole($id)
	{
		$rolesTable  = TableRegistry::get('roles');
		$rolesEntity = $rolesTable->get($id);

		$rolesTable->delete($rolesEntity);

		$this->redirect(
	        array('controller' => 'Administrator', 'action' => 'roles')
	    );
	}
/* end Roles */

}

	