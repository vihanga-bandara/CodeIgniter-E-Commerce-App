<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/10/2018
 * Time: 12:19 AM
 */

class BookController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("BookModel");
		$this->load->model("VisitorTrackModel");
	}

	public function index()
	{
		$config = array();
		$config["base_url"] = base_url() . "BookController/get_books";
		$config["total_rows"] = $this->BookModel->record_count();
		$config["per_page"] = 8;
		$config["uri_segment"] = 3;
		$check_row_links = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($check_row_links);

		$this->pagination->initialize($config);

		$current_page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data["fetched_res"] = $this->BookModel->fetch_all_books_pagination($config["per_page"], $current_page);
		$this->data["paginated_links"] = $this->pagination->create_links();
		$this->data["categories"] = $this->BookModel->fetch_category();

		$this->load->view("UserBooksView", $this->data);
	}

	public function category_form_authenticate()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("category", "Category", 'required|alpha');

		if ($this->form_validation->run())
		{
			$data = array(
				'category' => $this->input->post('category')
			);
			if ($this->BookModel->add_category($data))
			{
				$this->session->set_flashdata("success_message_category", 'Successfully created a new category');
				redirect(base_url() . "AdminController/load_category_form");
			} else
			{
				$this->session->set_flashdata("error_message", 'Invalid Data');
				redirect(base_url() . "AdminController/load_category_form");
			}
		} else
		{
			$this->session->set_flashdata("error_message", 'Invalid Data');
			redirect(base_url() . "AdminController/load_category_form");

		}
	}

	public function book_form_authenticate()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("title", "Title", 'required');
		$this->form_validation->set_rules("author", "Author", 'required');
		$this->form_validation->set_rules("price", "Price", 'required');
		$this->form_validation->set_rules("description", "Description", 'required');
		$this->form_validation->set_rules("image", "Image", 'required');
		if ($this->form_validation->run())
		{
			$data = array(
				'title' => $this->input->post('title'),
				'author' => $this->input->post('author'),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'category_name' => $this->input->post('category'),
				'image' => $this->input->post('image'),
			);

			if ($this->BookModel->add_book($data))
			{
				$this->session->set_flashdata("success_message_book", 'Successfully added a book');
				redirect(base_url() . "AdminController/load_book_form");
			} else
			{
				$this->session->set_flashdata("error_message", 'Invalid book details');
				redirect(base_url() . "AdminController/load_book_form");
			}
		} else
		{
			$this->session->set_flashdata("error_message", 'Invalid book details');
			redirect(base_url() . "AdminController/load_book_form");
		}
	}

	public function search()
	{
		$search_template = $this->input->post("search");
		$this->data['search_items'] = $this->BookModel->admin_search($search_template);
		$this->load->view("AdminSearch", $this->data);
	}

	public function get_books(){
		$config = array();
		$config["base_url"] = base_url() . "BookController/get_books";
		$config["total_rows"] = $this->BookModel->record_count();
		$config["per_page"] = 8;
		$config["uri_segment"] = 3;
		$check_row_links = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($check_row_links);

		$this->pagination->initialize($config);

		$current_page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data["fetched_res"] = $this->BookModel->fetch_all_books_pagination($config["per_page"], $current_page);
		$this->data["paginated_links"] = $this->pagination->create_links();
		$this->data["categories"] = $this->BookModel->fetch_category();
		$this->load->view("UserBooksView", $this->data);
	}

	public function get_category(){
		$category_name = $this->uri->segment(3);
		$this->load->model("BookModel");

		$config = array();
		$config["base_url"] = base_url() . "BookController/get_category/". $category_name;
		$config["total_rows"] = $this->BookModel->record_count_category($category_name);
		$config["per_page"] = 3;
		$config["uri_segment"] = 4;
		$check_row_links = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($check_row_links);

		$this->pagination->initialize($config);

		$current_page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$this->data["fetched_res"] = $this->BookModel->fetch_all_books_category_pagination($config["per_page"], $current_page, $category_name);
		$this->data["paginated_links"] = $this->pagination->create_links();
		$this->data["categories"] = $this->BookModel->fetch_category();
		$this->load->view("UserBooksView", $this->data);
	}


}
