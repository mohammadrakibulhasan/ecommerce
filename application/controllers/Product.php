<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function view()
	{
		$data['title'] = 'Product View';
		$data['css'] = base_url().'asset/css/home.css';
		$pid = $this->input->get('pid');
		// echo $pid;
		$data['product'] = $this->Product_model->productview($pid);
		$id = $this->session->userdata('userid');

		$data['user'] = $this->User_model->getuserdetails($id);
		$this->load->view('user/header',$data);
		$this->load->view('user/productview');
		$this->load->view('user/footer');
	}
	public function adminview()
	{
		$data['title'] = 'Product View';
		$data['css'] = base_url().'asset/css/home.css';
		$pid = $this->input->get('pid');
		// echo $pid;
		$data['product'] = $this->Product_model->productview($pid);
		$id = $this->session->userdata('id');

		$data['admin'] = $this->Admin_model->getuserdetails($id);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/productview');
		$this->load->view('admin/footer');
	}
}
