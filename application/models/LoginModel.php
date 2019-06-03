<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/9/2018
 * Time: 1:56 AM
 */

class LoginModel extends CI_Model
{
	function verify_login($user_name, $password)
	{
		$this->db->where('username', $user_name);
		$this->db->where('password', $password);
		$fetched_query = $this->db->get("tbl_admin");
		if ($fetched_query->num_rows() > 0)
		{
			return true;
		} else
		{
			return false;
		}
	}
}
