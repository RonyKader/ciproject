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


	public function getServiceInfo($limit,$ofset)
	{
		$this->db->select('ms.*,rs.id AS restId,rs.restaurantname,sr.id as serviceId,sr.servicename');
		$this->db->from('master_service AS ms');
		$this->db->join('restaurant AS rs','ms.restaurant_id = rs.id');
		$this->db->join('services AS sr','ms.service_id = sr.id');
		$this->db->order_by('id ASC');
		$this->db->limit($limit,$ofset);
		$query = $this->db->get();
		return $query->result();
	}

	public function totalServiceRow()
	{
		$this->db->select('*');
		$this->db->from('master_service');
		$query = $this->db->get();
		return $query->num_rows();

	}
}