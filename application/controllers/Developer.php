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
		$this->load->library('pagination');
		
		$config['base_url'] = base_url('Developer/createForm/');
		$config['total_rows'] = $this->Developer_model->totalServiceRow();
		$config['per_page'] = 3;
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = "</ul>";
		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";
		$config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='active'><a>";
		$config['cur_tag_close'] = "</a></li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>";
		
		$this->pagination->initialize($config);
		
		$data['get_restaurantInfo'] 	= $this->Developer_model->get_restaurantInfo();
		$data['get_serviceInfo'] 	= $this->Developer_model->get_serviceInfo();
		$data['serviceInfo'] = $this->Developer_model->getServiceInfo($config['per_page'], $this->uri->segment(3));
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

			if (!file_exists('./assets/uploads/customfolder_')) 
			{
			    $imagepath = mkdir('./assets/uploads/customfolder' ,0777);
			}
			else
			{
				$imagepath = './assets/uploads/customfolder';
			}

		   	$config['upload_path'] = $imagepath;
		   	$config['allowed_types'] = 'gif|jpg|png|jpeg';
		   	$config['max_size']    = '100000000';
		   	$config['overwrite'] = TRUE;
		   	$config['remove_spaces'] = TRUE;
		   	$config['encrypt_name'] = FALSE;

		   	$this->load->library('upload', $config);
		   	$this->upload->do_upload('image');
		   	if ( !$this->upload->do_upload('image') ) 
		   	{
		   		$data['error'] = $this->upload->display_errors();
		   		$data['main_content'] 	= 'developer/formPage';
				$this->load->view( 'templates/template',$data );
		   	}
		   	else
		   	{
			   	$image_path = $this->upload->data();
			   	$gidsimg = $image_path["file_name"];
			   	if ( $gidsimg != '' ) 
			   	{
			   		$img = base_url().'assets/uploades/customfolder/'.$gidsimg;
			   	}		   		
		   	}

		   	$data = array(
		     	'restaurant_id'	=> $this->input->post('restaurant'),
		     	'service_id' 		=> $this->input->post('service'),
		     	// 'image' 			=> $img
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
	}


}