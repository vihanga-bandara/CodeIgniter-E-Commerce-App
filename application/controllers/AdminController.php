<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/9/2018
 * Time: 3:48 PM
 */

class AdminController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("BookModel");
		$this->load->model("VisitorTrackModel");
	}

	public function index()
	{
		$this->data["TopBooks"] = $this->VisitorTrackModel->fetchTopViewedBooks(null);
		$this->load->view("AdminPanelView", $this->data);
	}

	public function load_category_form()
	{
		$this->data["categories"] = $this->BookModel->fetch_category();
		$this->load->view("AddCategory",$this->data);
	}

	public function load_book_form()
	{
		$this->data['categories'] = $this->BookModel->fetch_category();
		$this->load->view("AddBook", $this->data);
	}

	public function load_search_form()
	{
		$this->load->view("AdminSearch");
	}

	public function load_view_books()
	{
		$this->data["book_detail"] = $this->BookModel->fetch_all_books();
		$this->load->view("AdminBooksView", $this->data);
	}


	public function load_admin_book_view()
	{
		$id = $this->uri->segment(3);
		$this->data["book_detail"] = $this->BookModel->fetch_book_by_id($id);
		$this->data['ViewCount'] = $this->VisitorTrackModel->fetchViewCountBook($id);
		$this->load->view("AdminBookView", $this->data);
	}
	public function load_statistics_view()
	{
		$id = $this->uri->segment(3);
		$this->data["book_detail"] = $this->BookModel->fetch_book_by_id($id);
		$this->data['TopTenObj'] = $this->VisitorTrackModel->fetchTopTenViewCount();
		$this->data['ViewCount'] = $this->VisitorTrackModel->fetchVisitorsVisited();
		$this->data['MostViewedBook'] = $this->VisitorTrackModel->fetchTopViewedBook();
		$this->data['AllPageViewCount'] = $this->VisitorTrackModel->fetchAllViewCount();
		//add new user - keep a tab on latest user for date and then get the ones after
		$this->load->view("AdminStatsView", $this->data);
	}

	public function fetchTopTenViewCount(){
		$fetchedResult = $this->VisitorTrackModel->fetchTopTenViewCount();
		$books = array();
		foreach ($fetchedResult as $book)
		{
			$count = $book['visitor_count'];
			array_push($books, $count);
		}

		return $books;
	}
}
