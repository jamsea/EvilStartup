<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wall extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	

		// // MEMCACHE EXMAPLE
		// 	$this->load->driver('cache');
		// 	if ($this->cache->memcached->is_supported()){
				
		// 		echo "supported";
		// 		$this->cache->memcached->save('foo', 'bar', 1000);

		// 		$foo = $this->cache->memcached->get('foo');
		// 		echo $foo;

		// 	}else{
		// 		echo "not supported";
		// 	}

		$this->load->model('startup_model');
		$data['all_startups'] = $this->startup_model->getAllStartups(20);

		$this->load->view('wall_view',$data);
	}

	public function me()
	{
		echo "string";
	}


		/**
	 * add() 
	 * 
	 */
	function add() {

		$this->load->library('form_validation');
		$is_ajax = false;
	
		
		$rules[] = array('field' => 'name', 'label' => 'Startup Name', 'rules' => 'trim|required');
		$rules[] = array('field' => 'desc', 'label' => 'Description', 'rules' => 'trim|required');
		$rules[] = array('field' => 'location', 'label' => 'Where you at?', 'rules' => 'trim|required');
		$rules[] = array('field' => 'funded', 'label' => 'funded', 'rules' => 'trim');
		$rules[] = array('field' => 'fundedby', 'label' => 'fundedby', 'rules' => 'trim');

		// load any variables to refill the form
		$variables['name'] = $this->input->post('name', TRUE);
		$variables['desc'] = $this->input->post('desc', TRUE);
		$variables['location'] = $this->input->post('location', TRUE);
		$variables['funded'] = $this->input->post('funded', TRUE);
		$variables['fundedby'] = $this->input->post('fundedby', TRUE);
	
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			// first load or failed form
			$error = array(
			'name' => form_error('name'),
			'desc' => form_error('desc'),
			'location' => form_error('location'),
			'funded' => form_error('funded'),
			'fundedby' => form_error('fundedby'),
				);
			$variables['error'] = $error;
			if ($is_ajax) {
				$config['content'] = json_encode($error);
			} else {
				$config['content'] = "";
				// 
				// change the view name to the name of what you save the view file as
				//
				//$config['content'] = $this->load->view('add_view', $variables, TRUE);
			}
		} else {
			// perform action based on submission of form, if you return $message in this manner
			// it defaults to replacing the form in the page with the message that is returned.
			
			//echo $variables['desc'];

			$this->load->model('startup_model');
			$data = array(
               'name' => $variables['name'],
               'desc' => $variables['desc'],
               'location' => $variables['location'],
               'funded' => $variables['funded'],
               'fundedby' => $variables['fundedby']
            );
			$this->startup_model->addstartup($data);


			$message = '<p>You just successfully submitted <strong>this</strong> form!</p>';
			$config['content'] = $message;


			if ($is_ajax) {
				$config['content'] = json_encode(array('form_message' => $message));
			} else {
				$config['content'] = $message;
			}
		}
		if ($is_ajax) {
			//echo $config['content'];
		} else {

			//$data['content'] = "Thanks!";
			//$config['javascript'] = 'addstartup.js';
			$this->load->view('add_view', $config);
			// $this->template->display($config);  // if using template library
		}
	
	} // add()
	
	/**
	Adds a vote to a startup based on it's id. S
	**/
	public function vote($id)
	{
		$this->load->library('form_validation');
		$is_ajax = false;
		
		$this->load->model('startup_model');
		$this->startup_model->vote($id);

		echo $this->startup_model->getRating($id);
		
	}
		
}