<?php

class De extends CI_Controller 
{
	function getall()
	{
	    $this->load->model('stat_model');
        
        foreach ($this->stat_model->get(1)->result() as $row)
				{
				    echo $row->id;
				    echo $row->message;
				    //echo $row->email;
				}

		//echo 'Total Results: ' . $query->num_rows();

        //print_r $this->stat_model->get(1);
	}

}