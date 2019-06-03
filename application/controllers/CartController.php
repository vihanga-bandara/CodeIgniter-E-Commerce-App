<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/10/2018
 * Time: 3:26 PM
 */

class CartController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('CartView');
	}

	public function add()
	{
		$book = array(
			"id" => $this->input->post('id'),
			"qty" => $this->input->post('qty'),
			"price" => $this->input->post('price'),
			"name" => $this->input->post('title'),
			"image" => $this->input->post('image'),
		);

		$this->cart->insert($book);
		$this->session->set_flashdata('message_cart', 'Added ' . $book["name"] . ' to the cart ');
		redirect('/BookController', 'refresh');
	}
	public function update()
	{
		$data = $this->input->post();
		$this->cart->update($data);
		redirect(site_url() . 'CartController', 'refresh');
	}

	public function delete()
	{
		$row_id = $this->uri->segment(3);
		$this->cart->remove($row_id);
		redirect(site_url() . 'CartController', 'refresh');
	}

}
