<?php
class User_model extends CI_Model
{
	private $tbl = 'users_tbl';
	
	function getParent($id)
	{
		//return $this->db->query("SELECT * FROM " . $this->tbl . " WHERE imei=" . $imei ." ORDER BY LastUpdate DESC LIMIT 1")->result_array();
	}
	
	
	function add($msg)
	{
		return $this->db->insert($this->tbl_stats, $msg);
	}
}
