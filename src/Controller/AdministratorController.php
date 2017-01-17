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

class AdministratorController extends AppController
{
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
		$usersTable = TableRegistry::get('users');
		$rolesTable = TableRegistry::get('roles');
		$userEntity = $usersTable->find()->contain(['Roles']);
		$this->set("users", $userEntity);
	}

	public function addUser()
	{
		$usersTable = TableRegistry::get('users');
		$rolesTable = TableRegistry::get('roles');
		$roles = $rolesTable->find();
		$this->set("roles", $roles);
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$countUser = $usersTable->find()->where(['username' => $data['username']])->orWhere(['email' => $data['email']])->count();
			if ($countUser > 0) {
				
			}
			if (!isset($data['username']) || !isset($data['password'])) {
				$this->redirect(
			        array('controller' => 'Administrator', 'action' => 'users')
			    );
			}
			

			if ($data['password'] == $data['passConfirm']) {
				$userEntity = $usersTable->newEntity();
				$userEntity->username = $data['username'];
				$userEntity->passsalt = $this->generatePassSalt(10);
				$passHash = $userEntity->passsalt.$data['password'];
				$userEntity->password = hash('sha512', $passHash);
				$userEntity->email = $data['email'];
				$userEntity->role_id = $data['roleId'];
				$userEntity->created = date('Y-m-d H:i:s', time());
				$usersTable->save($userEntity);
				$this->redirect(
			        array('controller' => 'Administrator', 'action' => 'users')
			    );
			}
			
		}
	}

	public function editUser($id)
	{
		$usersTable = TableRegistry::get('users');
		$rolesTable = TableRegistry::get('roles');
		$roles = $rolesTable->find();
		$this->set("roles", $roles);

		$user = $usersTable->find()->contain(['Roles'])->where('users.id', $id)->first();
		$this->set("user", $user);
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$userEntity = $usersTable->get($id);
			$userEntity->email = $data['email'];
			$userEntity->role_id = $data['roleId'];
			$countEmail = $usersTable->find()->where('email', $data['email'])->count();
			if ($countEmail <= 0) {
				$usersTable->save($userEntity);
				$this->redirect(
			        array('controller' => 'Administrator', 'action' => 'users')
			    );
			}
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
	
	private function generatePassSalt($length)
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()"; 
		$size = strlen( $chars );
		$str = '';
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
	}

	
}

	