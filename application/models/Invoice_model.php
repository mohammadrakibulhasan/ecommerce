<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Invoice_model extends CI_Model
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
	public function orderdetails($orderid)
	{
		$query = $this->db->get_where('orders', array('orderid' => $orderid));

		return $query->result_array();
	}

	public function charge($orderid)
	{
		$query = $this->db->get_where('orderstatus', array('orderid' => $orderid));
		return $query->first_row('array');
	}
	public function time($orderid)
	{
		$query = $this->db->get_where('userorder', array('id' => $orderid));
		return $query->first_row('array');
	}

}
