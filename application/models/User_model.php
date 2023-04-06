<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_Model
{


	public function login($username, $password)
	{

		$query = $this->db->get_where('user', array('username' => $username, 'password' => $password));

		if ($query->num_rows()) {

			return $query->first_row('array');
		}
	}
	public function signup($username, $password, $email)
	{

		$data = array(
			'username' => $username,
			'password' => $password,
			'email' => $email
		);
		$query = $this->db->insert('user', $data);
		return $query;
	}

	public function getuserdetails($id)
	{
		$q = $this->db->get_where('user', array('id' => $id));
		return $q->first_row('array');
	}
	public function getorderid($userid)
	{
		$query = $this->db->order_by("id", "desc")->get_where('userorder', array('userid' => $userid));

		return $query->first_row('array');
	}
	public function setorder($userid)
	{
		$data = array(
			'userid' => $userid
		);
		$query = $this->db->insert('userorder', $data);

		return $query;
	}
	public function order($pname, $pid, $cat, $color, $size, $price, $oldPrice, $image, $qty, $subtotal, $userid, $orderid)
	{
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$time = $dt->format('g:i a, F j, Y');
		// echo $time;

		$data = array(
			'orderid' => $orderid,
			'productName' => $pname,
			'productid' => $pid,
			'category' => $cat,
			'color' => $color,
			'size' => $size,
			'price' => $price,
			'oldPrice' => $oldPrice,
			'image' => $image,
			'quantity' => $qty,
			'subtotal' => $subtotal,
			'userid' => $userid
		);
		$query = $this->db->insert('orders', $data);
		return $query;
	}



	public function status($orderid)
	{
		$data = array(
			'orderid' => $orderid,
		);
		$query = $this->db->insert('orderstatus', $data);

		return $query;
	}

	public function details($orderid, $mydata)
	{
		// $this->db->set($mydata);
		// $this->db->where('orderid', $orderid);
		// $this->db->update('orderstatus');

		$q = $this->db->update('orderstatus', $mydata, array('orderid' => $orderid));
		return $q;
	}

	public function upload($data, $id)
	{
		$q = $this->db->set($data)
			->where('id', $id)
			->update('user');
		return $q;
	}
}
