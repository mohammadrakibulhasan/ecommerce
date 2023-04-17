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
		$data['category'] = $this->Product_model->getcategory();
		// $data['category'] = $this->Product_model->category();
		$this->load->view('admin/header', $data);
		$this->load->view('admin/addproduct');
		$this->load->view('admin/footer');
	}

	public function addprod()
	{
		$config = array(
			'upload_path' => "./assets/img/product/",
			'allowed_types' => "jpg|png|jpeg|gif",
			'max_size' => "2048000" // file size , here it is 1 MB(1024 Kb)
		);
		$this->upload->initialize($config);


		if ($this->upload->do_upload('myfile')) {

			$image = $this->upload->data('file_name');
			// echo '<pre>';
			// print_r($image);
		}
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
			'image' => $image,

		];
		$add = $this->Product_model->add($data);
		$getid = $this->Product_model->getid($data);
		$id = $getid['id'];
		$i = 0;

		foreach ($this->input->post('product_discount[][]') as $k) {

			$discount = [
				'quantity' => $this->input->post('product_discount[' . $i . '][quantity]'),
				'priority' => $this->input->post('product_discount[' . $i . '][priority]'),
				'price' => $this->input->post('product_discount[' . $i . '][price]'),
				'date_start' => $this->input->post('product_discount[' . $i . '][date_start]'),
				'date_end' => $this->input->post('product_discount[' . $i . '][date_end]'),
				'productid' => $id,

			];
			$adddiscount = $this->Product_model->adddiscount($discount);


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
				'productid' => $id,
				'priority' => $this->input->post('product_special[' . $i . '][priority]'),
				'price' => $this->input->post('product_special[' . $i . '][price]'),
				'date_start' => $this->input->post('product_special[' . $i . '][date_start]'),
				'date_end' => $this->input->post('product_special[' . $i . '][date_end]'),

			];
			$addspecial = $this->Product_model->addspecial($special);


			// $special['priority'] = $this->input->post('product_special[' . $i . '][priority]');
			// $special['price'] = $this->input->post('product_special[' . $i . '][price]');
			// $special['date_start'] = $this->input->post('product_special[' . $i . '][date_start]');
			// $special['date_end'] = $this->input->post('product_special[' . $i . '][date_end]');

			$i = $i + 1;
			// echo $discount;
			// echo '<pre>';
			// print_r($special);
		}


		$this->upload->initialize($config);
		$uploadDir = './assets/img/product/';
		if (isset($_FILES['product_image'])) {
			$fileCount = count($_FILES['product_image']['name']);
			for ($i = 0; $i < $fileCount; $i++) {
				$fileTmpPath = $_FILES['product_image']['tmp_name'][$i]['addfile'];
				$fileName = $_FILES['product_image']['name'][$i]['addfile'];
				$fileDestPath = $uploadDir . $fileName;
				move_uploaded_file($fileTmpPath, $fileDestPath);

				$aimage = [
					'productid' => $id,
					'image' => $fileName,
				];
				$addimage = $this->Product_model->addimage($aimage);
			}
		}

		// $special[][] = $this->input->post("product_special[][]");
		// $image = $this->input->post("image");
		// $addimage[][] = $this->input->post("product_image[][]");
		//product_image[' + image_row + '][addfile]

		// echo '<pre>';
		// print_r($_FILES);
		// print_r($_FILES['product_image']['name']);
		// echo $_FILES;
		// print_r($data);
		// print_r($discount);

		// echo $discount;
		// print_r($discount . $special . $image . $addimage);
		// exit();
	}

	public function upprod()
	{
		if (!$this->session->userdata('id')) {
			redirect('user/login');
		}


		$data['title'] = 'Product';
		$data['css'] = base_url() . 'asset/css/home.css';
		$id = $this->session->userdata('id');
		$pid = $this->input->get('id');
		$data['admin'] = $this->Admin_model->getuserdetails($id);
		// $data['manufacturer'] = $this->Product_model->getmanufacturer();
		$data['category'] = $this->Product_model->getcategory();
		$data['product'] = $this->Product_model->getproduct($pid);
		$data['discount'] = $this->Product_model->getdiscount($pid);
		$data['special'] = $this->Product_model->getspecialrow($pid);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/updateproduct');
		$this->load->view('admin/footer');
	}
	public function upprodvalue()
	{
		if (!$this->session->userdata('id')) {
			redirect('user/login');
		}

		if ($this->input->post('product_discount_add[][]')) {

			$i = 0;
			foreach ($this->input->post('product_discount_add[][]') as $k) {

				$discount = [
					'quantity' => $this->input->post('product_discount_add[' . $i . '][quantity]'),
					'priority' => $this->input->post('product_discount_add[' . $i . '][priority]'),
					'price' => $this->input->post('product_discount_add[' . $i . '][price]'),
					'date_start' => $this->input->post('product_discount_add[' . $i . '][date_start]'),
					'date_end' => $this->input->post('product_discount_add[' . $i . '][date_end]'),
					'productid' => $this->input->post('product_description[1][id]'),

				];
				// $productid = $this->input->post('product_description[1][id]');
				$editdiscountadd = $this->Product_model->editdiscountadd($discount);

				$i = $i + 1;
				// echo $discount;
			// echo '<pre>';
			// print_r($_POST);
			// print_r($discount);
		}
		// exit();

		}

		if ($this->input->post('product_special_add[][]')) {

			$i = 0;
			foreach ($this->input->post('product_special_add[][]') as $k) {

				$special = [
					'priority' => $this->input->post('product_special_add[' . $i . '][priority]'),
					'price' => $this->input->post('product_special_add[' . $i . '][price]'),
					'date_start' => $this->input->post('product_special_add[' . $i . '][date_start]'),
					'date_end' => $this->input->post('product_special_add[' . $i . '][date_end]'),
					'productid' => $this->input->post('product_description[1][id]'),

				];
				// $productid = $this->input->post('product_description[1][id]');
				$editspecialadd = $this->Product_model->editspecialadd($special);

				$i = $i + 1;
				// echo $discount;
			// echo '<pre>';
			// print_r($_POST);
			// print_r($special);
		}
		// exit();

		}

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
			// 'image' => $image,

		];
		$productid = $this->input->post('product_description[1][id]');
		$edit = $this->Product_model->edit($data, $productid);
		// $getid = $this->Product_model->getid($data);
		// $id = $getid['id'];

		$i = 1;
		// $pid = $this->input->get('id');
		// $pid = 1;


		// $data['discount'] = $this->Product_model->getdiscount($pid);
		// $data['special'] = $this->Product_model->getspecialrow($pid);

		foreach ($this->input->post('product_discount[][]') as $k) {

			$discount = [
				// 'id' => $this->input->post('product_discount[discount-row-' .  $i . '][product_discount_id]'),
				'quantity' => $this->input->post('product_discount[discount-row-' .  $i . '][quantity]'),
				'priority' => $this->input->post('product_discount[discount-row-' . $i . '][priority]'),
				'price' => $this->input->post('product_discount[discount-row-' . $i . '][price]'),
				'date_start' => $this->input->post('product_discount[discount-row-' . $i . '][date_start]'),
				'date_end' => $this->input->post('product_discount[discount-row-' . $i . '][date_end]'),

			];
			$id = $this->input->post('product_discount[discount-row-' . $i . '][product_discount_id]');
			$editdiscount = $this->Product_model->editdiscount($discount, $id);


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
		$i = 1;
		foreach ($this->input->post('product_special[][]') as $k) {

			$special = [
				// 'productid' => $id,
				// 'id' => $this->input->post('product_special[special-row-' . $i . '][product_special_id]'),
				'priority' => $this->input->post('product_special[special-row-' . $i . '][priority]'),
				'price' => $this->input->post('product_special[special-row-' . $i . '][price]'),
				'date_start' => $this->input->post('product_special[special-row-' . $i . '][date_start]'),
				'date_end' => $this->input->post('product_special[special-row-' . $i . '][date_end]'),

			];
			$id = $this->input->post('product_special[special-row-' . $i . '][product_special_id]');

			$editspecial = $this->Product_model->editspecial($special, $id);


			// $special['priority'] = $this->input->post('product_special[' . $i . '][priority]');
			// $special['price'] = $this->input->post('product_special[' . $i . '][price]');
			// $special['date_start'] = $this->input->post('product_special[' . $i . '][date_start]');
			// $special['date_end'] = $this->input->post('product_special[' . $i . '][date_end]');

			$i = $i + 1;
			// echo $discount;
			// echo '<pre>';
			// print_r($special);
		}
		redirect('admin/product');


		// $this->upload->initialize($config);
		// $uploadDir = './assets/img/product/';
		// if(isset($_FILES['product_image'])) {
		// 	$fileCount = count($_FILES['product_image']['name']);
		// 	for($i=0; $i<$fileCount; $i++) {
		// 		$fileTmpPath = $_FILES['product_image']['tmp_name'][$i]['addfile'];
		// 		$fileName = $_FILES['product_image'
		// 		]['name'][$i]['addfile'];
		// 		$fileDestPath = $uploadDir . $fileName;
		// 		move_uploaded_file($fileTmpPath, $fileDestPath);

		// 		$aimage = [
		// 			'productid' => $id,
		// 			'image' => $fileName,	
		// 		];
		// $addimage = $this->Product_model->addimage($aimage);

		// 	}
		// }

		// echo '<pre>';
		// print_r($_POST);
		// print_r($data);
		// print_r($discount);
		// print_r($special);



	}
	public function deleteproduct()
	{
		if (!$this->session->has_userdata('id')) {
			redirect(base_url() . 'user/login');
		}


		$id = $this->input->post('id');
		$data = $this->Product_model->deleteproduct($id);
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
		$data['special'] = $this->Product_model->getspecial();
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

	public function deletespecial()
	{
		if (!$this->session->userdata('id')) {
			redirect('user/login');
		}

		$id = $this->input->post('id');

		$r = $this->Product_model->deletespecial($id);

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
