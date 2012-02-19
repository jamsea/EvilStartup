<?php
class Startup_model extends CI_Model
{
	private $tbl = 'startup_tbl';
	
	function getAllStartups($perPage)
	{	
		$offset = $this->getOffset();
		return $this->db->query("SELECT * FROM " . $this->tbl . " WHERE active=1 ORDER BY created DESC LIMIT " .$offset.", ".$perPage)->result();
	}

	function getOffset()
	{
        $page = $this->input->post('page');
        if(!$page):
        	$offset = 0;
        else:
        	$offset = $page;
        endif;
        return $offset;
    }

    function addstartup($data)
    {

		$this->db->insert('startup_tbl', $data); 
    }

	function count()
	{
	  $sql = "SELECT * FROM msg_tbl";
          $q = $this->db->query($sql);
          return $q->num_rows();
       }
	function add($msg)
	{
		return $this->db->insert($this->tbl, $msg);
	}
	
	function vote($id)
	{
		$this->db->query("UPDATE " . $this->tbl . " SET rating=rating+1 WHERE id=" . $id);
	}
	
}
