<?php
	
	namespace App\Controller;

	use Cake\Controller\Controller;
	use Cake\Event\Event;

	class LoginController extends Controller{
		public function initialize(){
			$arrCSS1 = array(
				'plugins/morris/morris.css',
				'plugins/switchery/switchery.min.css',
				'style.css'
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
		}
		
		public function index(){
			$this->viewBuilder()->layout('login');
		}
	}

?>