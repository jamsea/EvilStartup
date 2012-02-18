<?php defined('BASEPATH') OR exit('No direct script access allowed');


// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class V1 extends REST_Controller
{

    // function msgs_get()
    // {
    //     // if(!$this->get('msg'))
    //     // {
    //     //     $this->response(NULL, 400);
    //     // }

    //     $this->load->model('msg_model');
    //     $allmsgs = $this->msg_model->getAllMsgs();

    //     if($allmsgs)
    //     {
    //         $this->response($allmsgs, 200); // 200 being the HTTP response code

    //     }else{
            
    //         $this->response(array('error' => 'User could not be found'), 404);
        
    //     }
        
    // }

        function startups_get()
    {
        if(!$this->get('parent'))
        {
            $this->response(NULL, 400);
        }

        $this->load->model('msg_model');
        $allmsgs = $this->msg_model->getAllMsgsForParent($this->get('parent'),20);

        if($allmsgs)
        {
            $this->response($allmsgs, 200); // 200 being the HTTP response code

        }else{
            
            $this->response(array('error' => 'Messages could not be found'), 404);
        
        }
        
    }
    
    function userdb_post()
    {

        if(!$this->post('message'))
        {
            $this->response(array('error' => 'Need a Message'), 400);
            return;
        }

        $this->load->model('stat_model');
        $message = array('message' => $this->post('message'));
        $result = $this->stat_model->add($message);

        if($result){
            $this->response($result, 200); // 200 being the HTTP response code
        }else {
            $this->response(array('error' => 'Couldn\'t add new Message!'), 404);
        }

        
    }


    function user_post()
    {
       // $this->stat_model->updateUser( $this->get('id') );
        $message = array('id' => $this->get('id'), 'name' => $this->post('name'), 'email' => $this->post('email'), 'message' => 'ADDED!');
        
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
    // function user_delete()
    // {
    // 	//$this->some_model->deletesomething( $this->get('id') );
    //     $message = array('id' => $this->get('id'), 'message' => 'DELETED!');
        
    //     $this->response($message, 200); // 200 being the HTTP response code
    // }
    
    function users_get()
    {
        //$users = $this->some_model->getSomething( $this->get('limit') );
        $users = array(
			array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com'),
			array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com'),
			3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => array('hobbies' => array('fartings', 'bikes'))),
		);
        
        if($users)
        {
            $this->response($users, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
    }


	public function send_post()
	{
		var_dump($this->request->body);
	}


	public function send_put()
	{
		var_dump($this->put('foo'));
	}
}