<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product_model extends CI_Model
{

    public function add($data)
    {
        $query = $this->db->insert('products', $data);
        return $query;
    }
    public function adddiscount($data)
    {
        $query = $this->db->insert('discount', $data);
        return $query;
    }
    public function addspecial($data)
    {
        $query = $this->db->insert('special', $data);
        return $query;
    }
    public function addimage($data)
    {
        $query = $this->db->insert('addimage', $data);
        return $query;
    }
    public function getid()
    {
        $query = $this->db->order_by("id", "desc")->get('products');

		return $query->first_row('array');
    }


    public function getall($order='', $cat = '', $price = '')
    {
        if ($cat != null) {

            $this->db->where('category', $cat);
        }
        if ($price != null) {

            $this->db->where('productPrice>=', $price);
        }
        if($order != null)
        {
            $this->db->order_by('productName', $order);

        }


        $q = $this->db->get('product');
        return $q->result_array();
    }
    public function getproduct($id)
    {

        $query = $this->db->get_where('product', array('id' => $id));

        return $query->result_array();
    }
    public function setamount($id, $value)
    {
        $data = array(
            'amount' => $value,
        );

        $q = $this->db->where('id', $id)
            ->update('product', $data);

        return $q;
    }

    public function productview($pid)
    {
        $q = $this->db->get_where('product', array('id' => $pid));
        return $q->result_array();
    }

    public function category($order = '', $count = '')
    {
        if ($count != null) {

            $this->db->order_by('totalorder', $count);
        }
        if ($order != null) {

            $this->db->order_by('category', $order);
        }
        $q = $this->db->get('category');
        return $q->result_array();
    }

    public function addcategory($data)
    {
        $query = $this->db->insert('category', $data);
        return $query;
    }
    public function deletecategory($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('category');
    }
    public function editcategory($id)
    {
        $q = $this->db->get_where('category', array('id' => $id));

        return $q->first_row('array');
    }
    public function updatecategory($id, $data)
    {
        $q = $this->db->set($data)
            ->where('id', $id)
            ->update('category');
        return $q;
    }

    public function gethighestprice()
    {
        $this->db->select_max('productPrice');
        $q = $this->db->get('product');

        return $q->first_row('array');
    }
}
