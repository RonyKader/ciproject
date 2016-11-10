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

	/**
	 * Service Check Method
	 */
	public function serviceCheck()
	{
		$ajaxData['getData'] = $this->Developer_model->get_serviceInfo();
		echo json_encode($ajaxData['getData']);
		// echo $ajaxData;
	}

	/**
	 * Service Add Method
	 */
	public function serviceAdd()
	{
		if ( $this->input->server('REQUEST_METHOD') == 'POST' ) 
		{
		   	$config['upload_path'] = './assets/uploads/';
		   	$config['allowed_types'] = 'gif|jpg|png|jpeg';
		   	// $config['max_size']    = '100000000';
		   	// $config['overwrite'] = TRUE;
		   	// $config['remove_spaces'] = TRUE;
		   	// $config['encrypt_name'] = FALSE;

		   	$this->load->library('upload', $config);
		   	$this->upload->do_upload('image');

		   	$image_path = $this->upload->data();
		   	$gidsimg = $image_path["file_name"];

		   	// printR( $image_path ); 
		   	// var_dump($image_path);
		   	$this->upload->display_errors();

		   	$data = array(
		     	'restaurant_id'	=> $this->input->post('restaurant'),
		     	'service_id' 		=> $this->input->post('service'),
		     	'image' 			=> "assets/uploads/".$gidsimg
		   	);

		   	$createService = $this->Developer_model->createService($data);
		   	if ( $createService ) :
		   		$this->session->set_flashdata( 'FlsMsg',$this->alert->success('Service Add Process Success') );
		   		redirect( 'Developer/createForm');
		   	else:
		   		$this->session->set_flashdata( 'FlsMsg',$this->alert->danger('Service Add Process Fail') );
		   		redirect( 'Developer/createForm');
		   	endif;	

		}


		// $config['upload_path'] = './uploads/';
		// $config['allowed_types'] = 'gif|jpg|png';
		// $this->load->library('upload', $config);
		
		// if ( ! $this->upload->do_upload('image'))
		// {
		// 	$ImageData =  $this->upload->display_errors();
		// 	// $this->session->set_flashdata('FlsMsg',$this->alert->danger($ImageData));
		// 	// redirect( 'Developer/createForm' );
		// }
		// else
		// {
		// 	$ImageData = $this->upload->data();
		// }
		// if ( isset( $ImageData ) ) 
		// {
		// 	 echo "Lol";
		// }
		// printR( $ImageData );
		// $data = $this->input->post();
		// printR($data);
	}
}