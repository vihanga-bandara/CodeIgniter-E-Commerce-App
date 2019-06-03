<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("BookModel");
		$this->load->model("VisitorTrackModel");
		$this->load->model("LoginModel");
	}

	public function index()
	{
		$this->loadHome();
	}

	private function loadHome()
	{
		if ($this->session->has_userdata('userId'))
		{
			$this->load->model("BookModel");
			$this->data["home_books"] = $this->BookModel->fetch_limit_books();
			$this->load->view("HomeView", $this->data);
		} else
		{
			$this->getVisitorId();
			$this->load->model("BookModel");
			$this->data["home_books"] = $this->BookModel->fetch_limit_books();
			$this->load->view("HomeView", $this->data);
		}
	}
	private function getVisitorId()
	{
		$user_data = array(
			"userId" => uniqid(),
			"bookArray" => array(),
			"userType" => "anonymous_user"
		);
		$this->session->set_userdata($user_data);
	}

	public function admin_login()
	{
		$this->load->view("AdminLoginView");
	}

	public function admin_logout()
	{
		$this->session->unset_userdata("username");
		redirect(base_url());
	}

	public function login_valid()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("username", "Username", 'required');
		$this->form_validation->set_rules("password", "Password", 'required');

		if ($this->form_validation->run())
		{
			$this->load->model("BookModel");
			$user_name = $this->input->post("username");
			$password = $this->input->post("password");

			if ($this->LoginModel->verify_login($user_name, $password))
			{
				$session = array(
					"username" => $user_name
				);
				$this->session->set_userdata($session);
				redirect(base_url() . "AdminController");
			} else
			{
				$this->session->set_flashdata("error_message", 'Username or Password is invalid');
				redirect(base_url() . "HomeController/admin_login");
			}
		} else
		{
			$this->admin_login();
		}
	}

	public function enter_admin()
	{
		if ($this->session->userdata("username") != '')
		{
			redirect(base_url() . "AdminController");
		} else
		{
			$this->session->set_flashdata("error_message", 'Session has expired or invalid');
			redirect(base_url() . "HomeController/admin_login");
		}
	}

	public function load_user_book_view()
	{
		$bookId = $this->uri->segment(3);
		$userId = $this->session->userId;
		//check if userId and BookId has been set - can be removed
		if (!empty($userId) && !empty($bookId))
		{
			$visitedBooks = $this->session->visitedBooks;

			//check if bookId attr already exists in array
			if(empty($visitedBooks)){
				//update visitor count for book
				$this->BookModel->updateBookCount($bookId);
				/*add bookId to array so that for the same session,
				 another visit to the same page will not be counted */
				$visitedBooks[] = $bookId;
				//update session variable
				$this->session->set_userdata("visitedBooks", $visitedBooks);
				//Add record of page visited by user for unique session
				$this->VisitorTrackModel->addPageVisit($userId,$bookId);
			}
			if (!empty($visitedBooks) && !in_array($bookId, $visitedBooks))
			{
				//update visitor count for book
				$this->BookModel->updateBookCount($bookId);
				/*add bookId to array so that for the same session,
				 another visit to the same page will not be counted */
				$visitedBooks[] = $bookId;
				//update session variable
				$this->session->set_userdata("visitedBooks", $visitedBooks);
				//Add record of page visited by user for unique session
				$this->VisitorTrackModel->addPageVisit($userId,$bookId);
			}
			$this->data["bookDetails"] = $this->BookModel->fetch_book_by_id($bookId);
			$this->data['RecommendBooks'] = $this->fetchRecommendedBooks($bookId);
			$this->data['TopViewedBooks'] = $this->VisitorTrackModel->fetchTopViewedBooks($bookId);
			$this->data['ViewCount'] = $this->VisitorTrackModel->fetchViewCountBook($bookId);
			$this->load->view("UserBookView", $this->data);
		}
	}
	public function fetchRecommendedBooks($bookId){
		$fetchedResult = $this->VisitorTrackModel->fetchRecommendedBooks($bookId);
		$books = new ArrayObject();
		if(!empty($fetchedResult)){
			foreach($fetchedResult as $result){
				$books->append($this->BookModel->fetch_book_by_id($result->book_id));
			}
		}
		return $books;
	}

}

