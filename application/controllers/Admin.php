<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function home()
	{
		if (!$this->session->userdata('id')) {
			redirect('user/login');
		}

		$data['title'] = 'Home';
		$data['css'] = base_url() . 'asset/css/home.css';
		$id = $this->session->userdata('id');
		$data['admin'] = $this->User_model->getuserdetails($id);

		$this->load->view('admin/header', $data);
		// $this->load->view('admin/product');
		$this->load->view('admin/footer');
	}
	public function profile()
	{
		if (!$this->session->userdata('id')) {
			redirect('user/login');
		}

		$data['title'] = 'Home';
		$data['css'] = base_url() . 'asset/css/home.css';
		$id = $this->session->userdata('id');
		$data['admin'] = $this->Admin_model->getuserdetails($id);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/details');
		$this->load->view('admin/footer');
	}

	public function user()
	{
		if (!$this->session->userdata('id')) {
			redirect('user/login');
		}

		$data['title'] = 'Users';
		$data['css'] = base_url() . 'asset/css/home.css';
		// $id = $this->session->userdata('id');
		$id = $this->session->userdata('id');
		$data['admin'] = $this->Admin_model->getuserdetails($id);
		$data['user'] = $this->Admin_model->getalluser();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/user');
		$this->load->view('admin/footer');
	}
	public function fill()
	{
		if (!$this->session->userdata('id')) {
			redirect('user/login');
		}
		// echo $_POST["cat"];
		$cat = '';
		$price = '';
		if ($this->input->post('cate1') != null) {
			$cat = $this->input->post('cate1');
		}
		if ($this->input->post('price') != null) {
			$price = $this->input->post('price');
		}

		// $cat = $this->input->post('cat');

		// $data['title'] = 'Product';
		// $data['css'] = base_url() . 'asset/css/home.css';
		// $id = $this->session->userdata('userid');

		// $data['user'] = $this->User_model->getuserdetails($id);
		$data['category'] = $this->Product_model->category();
		$data['product'] = $this->Product_model->getall($cat, $price);
		// $data['category'] = $this->Product_model->category();
		// $data['filter'] = 
		// $this->load->view('user/header', $data);
		$this->load->view('admin/filteredproduct', $data);
		// $this->load->view('user/footer');
	}
	public function addproduct()
	{
		if (!$this->session->userdata('id')) {
			redirect('user/login');
		}

		$data['title'] = 'Product';
		$data['css'] = base_url() . 'assets/css/style.css';
		$id = $this->session->userdata('id');

		$data['admin'] = $this->Admin_model->getuserdetails($id);
		// $data['category'] = $this->Product_model->category();
		$this->load->view('admin/header', $data);
		$this->load->view('admin/addproduct');
		$this->load->view('admin/footer');
	}

	public function addprod()
	{
		$data = [

			'productName' => $this->input->post('product_description[1][name]'),
			'productDescription' => $this->input->post('product_description[1][product_description]'),
			'productModel' => $this->input->post('product_description[1][model]'),
			'SKU' => $this->input->post('sku'),
			'UPC' => $this->input->post('upc'),
			'location' => $this->input->post('location'),
			'price' => $this->input->post('price'),
			'taxClass' => $this->input->post('tax_class_id'),
			'quantity' => $this->input->post('quantity'),
			'minimum' => $this->input->post('minimum'),
			'subtract' => $this->input->post('subtract'),
			'stock' => $this->input->post('stock_status_id'),
			'dateAvailable' => $this->input->post('date_available'),
			'shipping' => $this->input->post('shipping'),
			'length' => $this->input->post('length'),
			'width' => $this->input->post('width'),
			'height' => $this->input->post('height'),
			'lengthClass' => $this->input->post('length_class_id'),
			'weight' => $this->input->post('weight'),
			'weightClass' => $this->input->post('weight_class_id'),
			'status' => $this->input->post('status'),
			'sortOrder' => $this->input->post('sort_order'),
			'manufacturer' => $this->input->post('manufacturer'),
			'category' => $this->input->post('category'),

		];
		$i = 0;
		
		foreach ($this->input->post('product_discount[][]') as $k) {

			$discount = [
				'quantity' => $this->input->post('product_discount[' . $i . '][quantity]'),
				'priority' => $this->input->post('product_discount[' . $i . '][priority]'),
				'price' => $this->input->post('product_discount[' . $i . '][price]'),
				'date_start' => $this->input->post('product_discount[' . $i . '][date_start]'),
				'date_end' => $this->input->post('product_discount[' . $i . '][date_end]'),

			];

			// $discount['quantity'] = $this->input->post('product_discount[' . $i . '][quantity]');
			// $discount['priority'] = $this->input->post('product_discount[' . $i . '][priority]');
			// $discount['price'] = $this->input->post('product_discount[' . $i . '][price]');
			// $discount['date_start'] = $this->input->post('product_discount[' . $i . '][date_start]');
			// $discount['date_end'] = $this->input->post('product_discount[' . $i . '][date_end]');

			$i = $i + 1;
			// echo $discount;
			// echo '<pre>';
			// print_r($discount);
		}
		$i = 0;
		foreach ($this->input->post('product_special[][]') as $k) {

			$special = [
				'priority' => $this->input->post('product_special[' . $i . '][priority]'),
				'price' => $this->input->post('product_special[' . $i . '][price]'),
				'date_start' => $this->input->post('product_special[' . $i . '][date_start]'),
				'date_end' => $this->input->post('product_special[' . $i . '][date_end]'),

			];

			// $special['priority'] = $this->input->post('product_special[' . $i . '][priority]');
			// $special['price'] = $this->input->post('product_special[' . $i . '][price]');
			// $special['date_start'] = $this->input->post('product_special[' . $i . '][date_start]');
			// $special['date_end'] = $this->input->post('product_special[' . $i . '][date_end]');

			$i = $i + 1;
			// echo $discount;
			// echo '<pre>';
			// print_r($special);
		}

		$config = array(
			'upload_path' => "./assets/img/product/",
			'allowed_types' => "jpg|png|jpeg|gif",
			'max_size' => "2048000" // file size , here it is 1 MB(1024 Kb)
		);
		$this->upload->initialize($config);


		if ($this->upload->do_upload('myfile')) {

			$image = $this->upload->data();
			echo '<pre>';
			print_r($image);
		}

		// $special[][] = $this->input->post("product_special[][]");
		// $image = $this->input->post("image");
		// $addimage[][] = $this->input->post("product_image[][]");

		echo '<pre>';
		print_r($data);
		// print_r($discount);

		// echo $discount;
		// print_r($discount . $special . $image . $addimage);
		exit();
	}
	public function product()
	{
		if (!$this->session->userdata('id')) {
			redirect('user/login');
		}


		$data['title'] = 'Product';
		$data['css'] = base_url() . 'asset/css/home.css';
		$id = $this->session->userdata('id');

		// $data['filter'] = 
		$order = 'ASC';
		$data['order'] = 'ASC';
		if ($this->input->get('sort') == 'desc') {
			$order = 'DESC';
			$data['order'] = 'DESC';
		}
		if ($this->input->get('sort') == 'asc') {
			$order = 'ASC';
			$data['order'] = 'ASC';
		}

		$data['admin'] = $this->Admin_model->getuserdetails($id);
		// $data['category'] = $this->Product_model->category();
		$data['product'] = $this->Product_model->getall($order);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/product');
		$this->load->view('admin/footer');
		// echo $result;
	}

	public function category()
	{
		if (!$this->session->userdata('id')) {
			redirect('user/login');
		}

		$data['title'] = 'Home';
		$data['css'] = base_url() . 'asset/css/home.css';
		$id = $this->session->userdata('id');
		$data['admin'] = $this->Admin_model->getuserdetails($id);
		$data['category'] = $this->Product_model->category();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/category');
		$this->load->view('admin/footer');
	}
	public function addcategory()
	{
		if (!$this->session->userdata('id')) {
			redirect('user/login');
		}

		$data['title'] = 'Home';
		$data['css'] = base_url() . 'asset/css/home.css';
		$id = $this->session->userdata('id');
		// $data['admin'] = $this->Admin_model->getuserdetails($id);
		// $data['category'] = $this->Product_model->addcategory();

		$cat = array(
			'category' => $this->input->post('catname'),
		);

		$result = $this->Product_model->addcategory($cat);

		if ($result) {
			redirect('admin/category');
		}

		$this->load->view('admin/header', $data);
		$this->load->view('admin/category');
		$this->load->view('admin/footer');
	}

	public function deletecategory()
	{
		if (!$this->session->has_userdata('id')) {
			redirect(base_url() . 'user/login');
		}


		$id = $_POST["id"];
		$data = $this->Product_model->deletecategory($id);
	}
	public function editcategory()
	{
		if (!$this->session->has_userdata('id')) {
			redirect(base_url() . 'user/login');
		}


		$id = $_POST["id"];
		$data = $this->Product_model->editcategory($id);

		echo json_encode($data);
	}
	public function updatecategory()
	{
		if (!$this->session->has_userdata('id')) {
			redirect(base_url() . 'user/login');
		}
		$id = $_POST["id"];
		$cat = [
			'category' => $_POST["category"]
		];
		$r = $this->Product_model->updatecategory($id, $cat);

		if ($r) {
			echo "data was updated";
		}
	}

	public function orderlist()
	{
		if (!$this->session->userdata('id')) {
			redirect('user/login');
		}
		$data['title'] = 'Order List';
		$data['css'] = base_url() . 'asset/css/home.css';
		// $id = $this->session->userdata('userid');
		$data['order'] = $this->Order_model->readall();
		$id = $this->session->userdata('id');

		// $data['admin'] = $this->User_model->getuserdetails($id1);
		$data['admin'] = $this->Admin_model->getuserdetails($id);


		$this->load->view('admin/header', $data);
		$this->load->view('admin/orderlist');
		$this->load->view('admin/footer');
	}

	public function editstatus()
	{
		if (!$this->session->userdata('id')) {
			redirect('user/login');
		}

		$id = $this->input->post('id');

		$status = $this->input->post('status');

		$r = $this->Admin_model->editstatus($id, $status);
		if ($r) {
			echo "data was updated";
		}
	}

	public function invoice()
	{
		if (!$this->session->userdata('id')) {
			redirect('user/login');
		}

		$orderid = $this->input->get('orderid');
		// echo $orderid;
		$data['order'] = $this->Invoice_model->orderdetails($orderid);
		$data['dcharge'] = $this->Invoice_model->charge($orderid);


		$data['title'] = 'invoice';
		$data['css'] = base_url() . 'asset/css/home.css';
		$id = $this->session->userdata('id');

		$data['admin'] = $this->User_model->getuserdetails($id);


		$this->load->view('admin/header', $data);
		$this->load->view('admin/invoice');
		$this->load->view('admin/footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user/login');
	}

	public function categories()
	{
		$data['title'] = 'Home';
		$data['css'] = base_url() . 'asset/css/home.css';
		$id = $this->session->userdata('id');
		$data['admin'] = $this->Admin_model->getuserdetails($id);
		$order = 'ASC';
		$data['order'] = 'ASC';
		$count = '';
		$data['count'] = '';
		if ($this->input->get('sort') == 'desc') {
			$order = 'DESC';
			$data['order'] = 'DESC';
		}
		if ($this->input->get('sort') == 'asc') {
			$order = 'ASC';
			$data['order'] = 'ASC';
		}
		if ($this->input->get('count') == 'desc') {
			$count = 'DESC';
			$data['count'] = 'DESC';
		}
		if ($this->input->get('count') == 'asc') {
			$count = 'ASC';
			$data['count'] = 'ASC';
		}



		$data['category'] = $this->Product_model->category($order, $count);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/category');
		$this->load->view('admin/footer');
	}

	public function multi()
	{
		// print_r($_POST['id']);
		foreach ($this->input->post('id') as $k => $val) {
			$id = $val;

			echo 'id = ' . $id;
		}


		// ok();


	}
}
