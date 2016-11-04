<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Developer extends CI_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Developer_model');
	}

	/**
	 * @createForm for service add
	 */
	public function createForm()
	{	
		$data['get_restaurantInfo'] 	= $this->Developer_model->get_restaurantInfo();
		$data['get_serviceInfo'] 	= $this->Developer_model->get_serviceInfo();
		// echo "<pre>";
		// print_r($data['get_serviceInfo']); exit();
		$data['main_content'] 			= 'developer/formPage';
		$this->load->view( 'templates/template',$data );
	}

	public function serviceCheck()
	{
		$ajaxData['getData'] = $this->Developer_model->get_serviceInfo();
		echo json_encode($ajaxData['getData']);
		// echo $ajaxData;
	}
}