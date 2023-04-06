<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model
{


    public function getalluser()
    {

        $q = $this->db->get_where('user', array('type' => 'user'));
        return $q->result_array();
    }

    public function getuserdetails($id)
    {
        $q = $this->db->get_where('user', array('id' => $id));
        return $q->first_row('array');
    }


    public function editstatus($id, $status)
    {
        $data = array(
            'status' => $status,
        );
        $q = $this->db->where('orderid', $id)
			->update('orderstatus', $data);

        return $q;
    }
}
