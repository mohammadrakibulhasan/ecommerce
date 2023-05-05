<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product_model extends CI_Model
{

    public function add($data)
    {
        $query = $this->db->insert('products', $data);
        return $query;
    }
    public function addproductattribute($data)
    {
        $query = $this->db->insert('productattribute', $data);
        return $query;
    }
    public function addoption($data)
    {
        $query = $this->db->insert('optionss', $data);
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
    public function getmanufacturer()
    {

        $q = $this->db->get('manufacturers');

        return $q->result_array();
    }
    public function getattribute()
    {

        $q = $this->db->get('attribute');

        return $q->result_array();
    }
    public function productattribute($id)
    {

        $query = $this->db->get_where('productattribute', array('productid' => $id));

        return $query->result_array();
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
    public function getspecialid($id)
    {

        $query = $this->db->get_where('special', array('productid' => $id));

        return $query->result_array();
    }
    public function getoption()
    {

        $query = $this->db->get('options');

        return $query->result_array();
    }
    public function getoptionvalue($id)
    {

        $query = $this->db->get_where('optionss', array('productid' => $id));

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
    public function filter($order = '', $count = '')
    {
        if ($count != null) {

            $this->db->order_by('sortorder', $count);
        }
        if ($order != null) {

            $this->db->order_by('filtername', $order);
        }
        $q = $this->db->get('filter');
        return $q->result_array();
    }
    public function attribute($order = '', $count = '')
    {
        if ($count != null) {

            $this->db->order_by('sortorder', $count);
        }
        if ($order != null) {

            $this->db->order_by('attributename', $order);
        }
        $q = $this->db->get('attribute');
        return $q->result_array();
    }

    public function addattribute($data)
    {
        $query = $this->db->insert('attribute', $data);
        return $query;
    }

    public function editattribute($id)
    {
        $q = $this->db->get_where('attribute', array('id' => $id));

        return $q->first_row('array');
    }

    public function updateattribute($id, $data)
    {
        $q = $this->db->set($data)
            ->where('id', $id)
            ->update('attribute');
        return $q;
    }
    public function deleteattribute($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('attribute');
    }




    public function attributegroup($order = '', $count = '')
    {
        if ($count != null) {

            $this->db->order_by('sortorder', $count);
        }
        if ($order != null) {

            $this->db->order_by('attributename', $order);
        }
        $q = $this->db->get('attributegroup');
        return $q->result_array();
    }
    public function addattributegroup($data)
    {
        $query = $this->db->insert('attributegroup', $data);
        return $query;
    }

    public function editattributegroup($id)
    {
        $q = $this->db->get_where('attributegroup', array('id' => $id));

        return $q->first_row('array');
    }

    public function updateattributegroup($id, $data)
    {
        $q = $this->db->set($data)
            ->where('id', $id)
            ->update('attributegroup');
        return $q;
    }
    public function deleteattributegroup($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('attributegroup');
    }
    public function manufacturer($order = '', $count = '')
    {
        if ($count != null) {

            $this->db->order_by('sortorder', $count);
        }
        if ($order != null) {

            $this->db->order_by('manufacturer', $order);
        }
        $q = $this->db->get('manufacturers');
        return $q->result_array();
    }

    public function addmanufacturers($data)
    {
        $query = $this->db->insert('manufacturers', $data);
        return $query;
    }

    public function editmanufacturer($id)
    {
        $q = $this->db->get_where('manufacturers', array('id' => $id));

        return $q->first_row('array');
    }

    public function updatemanufacturer($id, $data)
    {
        $q = $this->db->set($data)
            ->where('id', $id)
            ->update('manufacturers');
        return $q;
    }
    public function deletemanufacturer($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('manufacturers');
    }
    
    public function addfilter($data)
    {
        $query = $this->db->insert('filter', $data);
        return $query;
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
    public function deletefilter($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('filter');
    }
    public function deleteproduct($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('products');
    }


    public function editfilter($id)
    {
        $q = $this->db->get_where('filter', array('id' => $id));

        return $q->first_row('array');
    }
    public function editcategory($id)
    {
        $q = $this->db->get_where('category', array('id' => $id));

        return $q->first_row('array');
    }
    public function updatefilter($id, $data)
    {
        $q = $this->db->set($data)
            ->where('id', $id)
            ->update('filter');
        return $q;
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
    public function editproductattribute($data, $id)
    {
        $q = $this->db->set($data)
            ->where('id', $id)
            ->update('productattribute');
        return $q;
    }
    public function editoption($data, $id)
    {
        $q = $this->db->set($data)
            ->where('id', $id)
            ->update('optionss');
        return $q;
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
    public function editproductattributeadd($data)
    {
        $query = $this->db->insert('productattribute', $data);
        return $query;
    }
    public function editoptionadd($data)
    {
        $query = $this->db->insert('optionss', $data);
        return $query;
    }
    public function editoptionvalueadd($data)
    {
        $query = $this->db->insert('optionsvalue', $data);
        return $query;
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
    public function deleteproductattribute($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('productattribute');
    }
    public function deleteoption($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('optionss');
    }
    public function deletediscount($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('discount');
    }
    public function deletespecial($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('special');
    }
}
