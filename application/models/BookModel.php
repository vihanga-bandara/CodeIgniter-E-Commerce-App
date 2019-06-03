<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/9/2018
 * Time: 5:50 PM
 */

class BookModel extends CI_Model
{
	public function add_book($data)
	{
		if ($this->db->insert("tbl_books", $data))
		{
			return true;
		} else
		{
			return false;
		}
	}

	public function add_category($data)
	{
		if ($this->db->insert("tbl_category", $data))
		{
			return true;
		} else
		{
			return false;
		}
	}

	public function fetch_category()
	{
		$this->db->select('*');
		$this->db->from('tbl_category');
		$fetched_query = $this->db->get();
		return $fetched_query->result();
	}

	public function admin_search($search_template)
	{
		$this->db->like("author", $search_template);
		$this->db->or_like("title", $search_template);
		$fetched_query = $this->db->get("tbl_books");
		return $fetched_query->result();
	}

	public function fetch_book_by_id($id)
	{
		$this->db->where('id', $id);
		$fetched_query = $this->db->get("tbl_books");
		$book_details = $fetched_query->row();
		return $book_details;
	}

	public function fetch_all_books()
	{
		$this->db->select('*');
		$this->db->from('tbl_books');
		$fetched_query = $this->db->get();
		return $fetched_query->result();
	}

	public function fetch_all_books_pagination($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('tbl_books');
		$this->db->limit($limit, $start);
		$fetched_query = $this->db->get();
		return $fetched_query->result();
	}

	public function fetch_all_books_category_pagination($limit,$start,$category_name)
	{
		$this->db->select('*');
		$this->db->from('tbl_books');
		$this->db->where('category_name', $category_name);
		$this->db->limit($limit, $start);
		$fetched_query = $this->db->get();
		return $fetched_query->result();
	}

	public function record_count(){
		return $this->db->count_all("tbl_books");
	}
	public function record_count_category($category_name){
		return $this->db->where('category_name',$category_name)->from("tbl_books")->count_all_results();
	}

	public function fetch_limit_books(){
		$this->db->select('*');
		$this->db->order_by('id', 'RANDOM');
		$this->db->from('tbl_books');
		$this->db->limit(8);
		$fetched_query = $this->db->get();
		return $fetched_query->result();
	}

	public function fetch_all_book_category($category_name)
	{
		$this->db->where('category_name', $category_name);
		$fetched_query = $this->db->get("tbl_books");
		if ($fetched_query->num_rows() > 0)
		{
			return $fetched_query->result();
		} else
		{
			return "";
		}
	}
	public function getTopBooksByUser($book_id)
	{
		//sub query
		$this->db->select('*')->from('tbl_tracker')->where('book_id', $book_id);
		$sub_query = $this->db->get_compiled_select();

		//main query
		$this->db->select('count(book_id)');
		$this->db->from('tbl_tracker');
	}

	//Increments visitor_count column in tbl_books
	public function updateBookCount($id)
	{
		$this->db->set('visitor_count', 'visitor_count+1', FALSE);
		$this->db->where('id', $id);
		$this->db->update('tbl_books');
	}

	public function getCountById($id){
		$this->db->select('visitor_count');
		$this->db->from('tbl_books');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
}
