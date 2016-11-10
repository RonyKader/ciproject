<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Developer_model extends CI_Model 
{
	public function get_restaurantInfo()
	{
		$this->db->select('*');
		$this->db->from('restaurant');
		$query = $this->db->get();
		return $query->result();
	}
	/**
	 * Service Information
	 */
	public function get_serviceInfo()
	{
		$this->db->select('*');
		$this->db->from('services');
		$query = $this->db->get();
		return $query->result();
	}

	public function createService($data)
	{
		$data = $this->security->xss_clean($data);
		$query = $this->db->insert('master_service',$data);
		if ( $query ) :
			return true;
		else:
			return false;
		endif;
	}
}