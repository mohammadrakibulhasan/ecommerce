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


    public function getall($order = '', $cat = '', $price = '')
    {
        if ($cat != null) {

            $this->db->where('category', $cat);
        }
        if ($price != null) {

            $this->db->where('productPrice>=', $price);
        }
        if ($order != null) {
            $this->db->order_by('productName', $order);
        }


        $q = $this->db->get('products');
        return $q->result_array();
    }
    public function getcategory()
    {

        $q = $this->db->get('category');

        return $q->result_array();
    }
    public function getproduct($id)
    {

        $query = $this->db->get_where('products', array('id' => $id));

        return $query->first_row('array');
    }
    public function getdiscount($id)
    {

        $query = $this->db->get_where('discount', array('productid' => $id));

        return $query->result_array();
    }
    public function getspecialrow($id)
    {

        $query = $this->db->get_where('special', array('productid' => $id));

        return $query->result_array();
    }
    public function getspecial()
    {

        $query = $this->db->get('special');

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
    public function deleteproduct($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('products');
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
    public function editdiscount($data, $id)
    {
        $q = $this->db->set($data)
            ->where('id', $id)
            ->update('discount');
        return $q;
    }
    public function editspecial($data, $id)
    {
        $q = $this->db->set($data)
            ->where('id', $id)
            ->update('special');
        return $q;
    }
    public function edit($data, $id)
    {
        $q = $this->db->set($data)
            ->where('id', $id)
            ->update('products');
        return $q;
    }
    public function editdiscountadd($data)
    {
        $query = $this->db->insert('discount', $data);
        return $query;
    }
    public function editspecialadd($data)
    {
        $query = $this->db->insert('special', $data);
        return $query;
    }
}
