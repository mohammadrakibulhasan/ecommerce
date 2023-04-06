<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('userid')) {
			redirect('user/home');
		}
		redirect('user/login');
	}
	public function login()
	{

		if ($this->session->userdata('userid')) {
			redirect('user/home');
		}
		if ($this->input->post('submit')) {
			// echo 'hello';
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$value = $this->User_model->login($username, $password);

			// print_r($value);
			if ($value != null) {
				$id = $value['id'];
				$type = $value['type'];

				// echo $id.'<br>type:'.$type;

				// exit();


				if ($type == 'admin') {
					$this->session->set_userdata('id', $id);
					$this->session->set_userdata('admin', $type);
					redirect(base_url() . 'admin/home');
				} else if ($type == 'user') {
					// echo 'you are a user';
					$this->session->set_userdata('userid', $id);
					$this->session->set_userdata('user', $type);
					redirect(base_url() . 'user/home');
					// exit();
				}
			} else {

				$id['error'] = "<h3 style='color:red'>Invalid login details</h3>";
				// echo 'failed';

			}
		}
		// redirect('user/home');
		$this->load->view('inc/header');

		$this->load->view('login', @$id);

		$this->load->view('inc/footer');
	}
	public function signup()
	{

		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules(
				'username', 'Username',
				'required|min_length[5]|max_length[12]|is_unique[user.username]',
				array(
						'required'      => 'You have not provided %s.',
						'is_unique'     => 'This %s already exists.'
				)
		);
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confpassword', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');

		if ($this->form_validation->run() == FALSE) {
			// $this->session->set_flashdata('signupfailed', 'Something Wrong');
			// redirect(base_url() . 'user/signup');
			// die();
			$this->load->view('signup');
		} else {
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');


			$data = $this->User_model->signup($username, $password, $email);

			if ($data) {
				// $this->session->set_userdata('user', $data);
				redirect(base_url() . 'user/login');
			} else {
			}
		}
		}
		// redirect('user/home');
		$this->load->view('inc/header');

		$this->load->view('signup');

		$this->load->view('inc/footer');
	}
	public function home()
	{
		if (!$this->session->userdata('userid')) {
			redirect('user/login');
		}
		// redirect('user/home');
		$id = $this->session->userdata('userid');
		$data['user'] = $this->User_model->getuserdetails($id);
		$data['product'] = $this->Product_model->getall();
		// $this->load->view('user/header', $data);
		$this->load->view('user/head', $data);
		$this->load->view('user/home');
		$this->load->view('user/foot');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user/login');
	}

	public function profile()
	{
		if (!$this->session->userdata('userid')) {
			redirect('user/login');
		}

		$data['title'] = 'Home';
		$data['css'] = base_url() . 'asset/css/home.css';
		$id = $this->session->userdata('userid');
		$data['user'] = $this->User_model->getuserdetails($id);

		$this->load->view('user/header', $data);
		$this->load->view('user/details');
		$this->load->view('user/footer');
	}

	public function fill()
	{
		if (!$this->session->userdata('userid')) {
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
		$this->load->view('user/filteredproduct', $data);
		// $this->load->view('user/footer');
	}
	public function product()
	{
		if (!$this->session->userdata('userid')) {
			redirect('user/login');
		}
		// echo $_POST["cat"];
		// $cat = '';
		// if ($this->input->post('cate1') != null) {
		// 	$cat = $this->input->post('cate1');
		// }

		// $cat = $this->input->post('cat');

		$data['title'] = 'Product';
		$data['css'] = base_url() . 'asset/css/home.css';
		$id = $this->session->userdata('userid');

		$data['user'] = $this->User_model->getuserdetails($id);
		$data['product'] = $this->Product_model->getall();
		$data['category'] = $this->Product_model->category();
		$data['price'] = $this->Product_model->gethighestprice();
		// $data['filter'] = 
		$this->load->view('user/header', $data);
		$this->load->view('user/product');
		$this->load->view('user/footer');
		// echo $result;
	}

	public function cart()
	{
		if (!$this->session->userdata('userid')) {
			redirect('user/login');
		}

		$data['title'] = 'Cart';
		$data['css'] = base_url() . 'asset/css/home.css';
		$id = $this->session->userdata('userid');

		$data['user'] = $this->User_model->getuserdetails($id);

		// echo '<pre>';
		// print_r($this->cart->contents());
		$this->load->view('user/header', $data);
		$this->load->view('user/cart');
		$this->load->view('user/footer');
	}
	public function order()
	{
		if (!$this->session->has_userdata('userid')) {
			redirect(base_url() . 'user/login');
		}
		// $mydata = $this->cart->contents();
		// $mydata = $this->cart->total_items();
		// echo '<pre>';
		// print_r($mydata);
		// exit();
		if ($this->input->post('val') == 'bkash') {

			$mydata = [

				'customername' => $this->input->post('bname'),
				'address' => $this->input->post('baddress'),
				'mobilenumber' => $this->input->post('bmobilenumber'),
				'paymentvia' => $this->input->post('bnumber'),
				'amount' => $this->input->post('bamount'),
				'total' => $this->input->post('btotal'),
				'paymentmethod' => $this->input->post('val'),
				'delivarycharge' => $this->input->post('delivarycharge'),
				'location' => $this->input->post('location')
			];
		}
		else if ($this->input->post('val') == 'nagad') {

			$mydata = [
				'customername' => $this->input->post('nname'),
				'address' => $this->input->post('naddress'),
				'mobilenumber' => $this->input->post('nmobilenumber'),
				'paymentvia' => $this->input->post('nnumber'),
				'amount' => $this->input->post('namount'),
				'total' => $this->input->post('btotal'),
				'paymentmethod' => $this->input->post('val'),
				'delivarycharge' => $this->input->post('delivarycharge'),
				'location' => $this->input->post('location')
			];
		}
		else if ($this->input->post('val') == 'rocket') {

			$mydata = [
				'customername' => $this->input->post('rname'),
				'address' => $this->input->post('raddress'),
				'mobilenumber' => $this->input->post('rmobilenumber'),
				'paymentvia' => $this->input->post('rnumber'),
				'amount' => $this->input->post('ramount'),
				'total' => $this->input->post('btotal'),
				'paymentmethod' => $this->input->post('val'),
				'delivarycharge' => $this->input->post('delivarycharge'),
				'location' => $this->input->post('location')
			];
		}
		else if ($this->input->post('val') == 'cash') {

			$mydata = [
				'customername' => $this->input->post('cname'),
				'address' => $this->input->post('caddress'),
				'mobilenumber' => $this->input->post('cmobilenumber'),
				'paymentvia' => $this->input->post('cnumber'),
				'amount' => $this->input->post('camount'),
				'total' => $this->input->post('btotal'),
				'paymentmethod' => $this->input->post('val'),
				'delivarycharge' => $this->input->post('delivarycharge'),
				'location' => $this->input->post('location')
			];
		}


		// echo '<pre>';
		// print_r($mydata);
		// exit();

		$data = array();

		$data = $this->cart->contents();

		if ($this->cart->total_items() > 0) {


			$userid = $this->session->userdata('userid');

			$setorder = $this->User_model->setorder($userid);

			// print_r($setorder);
			// exit();

			if ($setorder) {
				$gertorderid = $this->User_model->getorderid($userid);

				// print_r($gertorderid);
				// exit();
				$orderid = $gertorderid['id'];
				$status = $this->User_model->status($orderid);
				$details = $this->User_model->details($orderid,$mydata);
				foreach ($data as $items) :

					$pname = $items['name'];
					$pid = $items['id'];
					$cat = $items['category'];
					$color = $items['color'];
					$size = $items['size'];
					$price = $items['price'];
					$oldPrice = $items['oldPrice'];
					$image = $items['img'];
					$qty = $items['qty'];
					$subtotal = $items['subtotal'];
					$userid = $this->session->userdata('userid');

					// echo'<pre>';
					// print_r($items);

					$set = $this->User_model->order($pname, $pid, $cat, $color, $size, $price, $oldPrice, $image, $qty, $subtotal, $userid, $orderid);
					// echo'<pre>';
					// print_r($set);
					if ($set) {
						// echo 'Your Order is Done';
						$data = $this->Product_model->getproduct($pid);
						// print_r($data);
						$amount = $data[0]['amount'];
						$namount = $amount - $qty;
						$setamount = $this->Product_model->setamount($pid, $namount);
						// echo $amount;
						// exit();

					}
				endforeach;
			}
		}
		$this->session->set_flashdata('orderdone', 'Your order id placed');
		redirect(base_url() . 'user/cartdistroy');
	}
	public function invoice()
	{
		if (!$this->session->userdata('userid')) {
			redirect('user/login');
		}

		$orderid = $this->input->get('orderid');
		// echo $orderid;
		$data['order'] = $this->Invoice_model->orderdetails($orderid);
		$data['dcharge'] = $this->Invoice_model->charge($orderid);


		$data['title'] = 'invoice';
		$data['css'] = base_url() . 'asset/css/home.css';
		$id = $this->session->userdata('userid');

		$data['user'] = $this->User_model->getuserdetails($id);


		$this->load->view('user/header', $data);
		$this->load->view('user/invoice');
		$this->load->view('user/footer');
	}
	public function orderlist()
	{
		if (!$this->session->userdata('userid')) {
			redirect('user/login');
		}
		$data['title'] = 'Order List';
		$data['css'] = base_url() . 'asset/css/home.css';
		$id = $this->session->userdata('userid');
		$data['order'] = $this->Order_model->read($id);
		$id1 = $this->session->userdata('userid');

		$data['user'] = $this->User_model->getuserdetails($id1);

		$this->load->view('user/header', $data);
		$this->load->view('user/orderlist');
		$this->load->view('user/footer');
	}

	public function cartadd()
	{

		if (!$this->session->has_userdata('userid')) {
			redirect(base_url() . 'user/login');
		}


		$insert_data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('productName'),
			'price' => $this->input->post('productPrice'),
			'oldPrice' => $this->input->post('oldPrice'),
			'category' => $this->input->post('category'),
			'color' => $this->input->post('color'),
			'size' => $this->input->post('size'),
			'img' => $this->input->post('productImage'),
			'qty' => $this->input->post('qty')
		);

		// echo '<pre>';
		// print_r($insert_data);

		$this->cart->insert($insert_data);


		redirect(base_url() . 'user/product');
	}
	public function cartup()
	{


		if (!$this->session->has_userdata('userid')) {
			redirect(base_url() . 'user/login');
		}


		$data = array(
			'rowid'   => $_POST["id"],
			'qty'   => $_POST["qty"],

		);
		$this->cart->update($data);
		$this->load->view('user/cart');
	}
	public function cartremove($id)
	{

		if (!$this->session->has_userdata('userid')) {
			redirect(base_url() . 'user/login');
		}

		$this->cart->remove($id);
		redirect(base_url() . 'user/cart');
	}
	public function cartdistroy()
	{

		if (!$this->session->has_userdata('userid')) {
			redirect(base_url() . 'user/login');
		}
		// $this->load->view('header');
		$this->cart->destroy();
		redirect(base_url() . 'user/cart');
	}
}
