<?php
/**
 * Created by PhpStorm.
 * User: sajith
 * Date: 11/10/18
 * Time: 8:25 PM
 */

class VisitorTrackModel extends CI_Model
{
	//Records Visitor details to a particular page
	public function addPageVisit($userId, $bookId)
	{
		$details = array(
			"user_id" => $userId,
			"book_id" => $bookId,
			"date" => $this->getCurrentDate()->format('Y-m-d H:i:s')
		);
		$this->db->insert('tbl_tracker', $details);
	}

	public function getCurrentDate()
	{
		$currentDate = new DateTime('now');
		return $currentDate;
	}

	public function fetchRecommendedBooks($bookId)
	{
		//SELECT book_id FROM `tbl_tracker` WHERE user_id IN (SELECT user_id FROM tbl_tracker where book_id = 4)
		//inner query
		$this->db->select('user_id');
		$this->db->where('book_id', $bookId);
		$this->db->from('tbl_tracker');
		$users = $this->db->get()->result_array();
		$books = array();
		foreach ($users as $user)
		{
			$id = $user['user_id'];
			array_push($books, $id);
		}

		if(!empty($books))
		{
			//using inner query results to get the bookId
			$this->db->distinct('book_id');
			$this->db->select('book_id');
			$this->db->from('tbl_tracker');
			$this->db->where_in('user_id', $books);
			$this->db->where_not_in('book_id', $bookId);
			$this->db->limit(5);
			$fetched_result = $this->db->get()->result();
			return $fetched_result;
		}
		else
		{
			return null;
		}
	}

	public function fetchTopViewedBooks($bookId)
	{
		$this->db->select('*');
		$this->db->where('visitor_count !=', 0);
		if(!empty($bookId)){
			$this->db->where('id !=', $bookId);
		}
		$this->db->from('tbl_books');
		$this->db->order_by('visitor_count', 'DESC');
		$this->db->limit(5);
		$fetched_result = $this->db->get();
		return $fetched_result->result();
	}

	public function fetchViewCountBook($bookId)
	{
		$this->db->select('visitor_count');
		$this->db->where('id', $bookId);
		$this->db->from('tbl_books');
		return $fetched_result = $this->db->get()->result();
	}
	public function fetchAllViewCount(){
		$this->db->select_sum('visitor_count');
		$this->db->from('tbl_books');
		return $fetched_result = $this->db->get()->result();
	}
	public function fetchTopViewedBook(){
		$this->db->select('title');
		$this->db->where('visitor_count !=', 0);
		$this->db->from('tbl_books');
		$this->db->order_by('visitor_count', 'DESC');
		$this->db->limit(1);
		$fetched_result = $this->db->get();
		return $fetched_result->result();
	}
	public function fetchTopTenViewCount(){
		$this->db->select('visitor_count, title');
		$this->db->where('visitor_count !=', 0);
		$this->db->from('tbl_books');
		$this->db->order_by('visitor_count', 'DESC');
		$this->db->limit(10);
		$fetched_result = $this->db->get();
		$arr = array();
		foreach($fetched_result->result_array() as $row){
			$keyName = "";
			$keyValue = "";
			foreach($row as $key=>$count){
				if($key == "visitor_count"){
					$keyValue = $count;
				}
				else
				{
					$keyName = $count;
				}
			}

			if(!empty($keyValue) && !empty($keyName)){
				$arr[$keyName] = $keyValue;
			}
		}
		return $arr;
	}
	public function fetchVisitorsVisited(){
		$this->db->select('COUNT(DISTINCT user_id) as visitors');
		$this->db->from('tbl_tracker');
		$fetched_result = $this->db->get();
		$sql = $this->db->last_query();
		return $fetched_result->result();
	}
}
