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

class AjaxController extends AppController
{
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
		$rolesTable = TableRegistry::get('roles');
		$roles = $rolesTable->find();
		$this->set("roles", $roles);
		
	}
	
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

	