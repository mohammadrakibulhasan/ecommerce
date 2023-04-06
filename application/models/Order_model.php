<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Order_model extends CI_Model
{

	public function read($id)
	{


		$query = $this->db->select('t1.id, t2.orderid,t2.status')
			->from('userorder AS t1, orderstatus AS t2')
			->where('t1.id = t2.orderid')
			->where('t1.userid', $id);
		$query = $this->db->get();

		return $query->result_array();
	}
	public function readall()
	{


		$query = $this->db->select('t1.id,t2.orderid,t2.status')
			->from('userorder AS t1, orderstatus AS t2')
			->where('t1.id = t2.orderid');
			// ->where('t1.userid', $id);
		$query = $this->db->get();

		return $query->result_array();
	}

}
