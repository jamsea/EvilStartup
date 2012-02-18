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
	
	public function vote($id)
	{
		$this->load->model('startup_model');
		$this->startup_model->vote($id);
	}

	public function me()
	{
		echo "string";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */