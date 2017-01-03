<?php
	namespace App\Controller;

	use Cake\Controller\Controller;
	use Cake\Event\Event;

	class AdministratorController extends Controller{
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
			$this->viewBuilder()->layout('admin');
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
			$arrCSS2 = array(
				'plugins/tablesaw/dist/tablesaw.css'
				);
			$this->set('arrCSS2', $arrCSS2);

			$arrJS2 = array(
				'plugins/tablesaw/dist/tablesaw.js',
				'plugins/tablesaw/dist/tablesaw-init.js'
				);
			$this->set('arrJS2', $arrJS2);
			$this->viewBuilder()->layout('admin');	
		}

		public function user($id = null)
		{
			$this->viewBuilder()->layout('admin');	
		}
	}
?>

