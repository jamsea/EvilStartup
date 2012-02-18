<?php
class Stat_model extends CI_Model
{
	private $tbl_stats = 'gpslocations';
	
	function get($imei)
	{
		return $this->db->query("SELECT * FROM " . $this->tbl_stats . " WHERE imei=" . $imei ." ORDER BY LastUpdate DESC LIMIT 1")->result_array();
	}
	
	function add($msg)
	{
		return $this->db->insert($this->tbl_stats, $msg);
	}
}
