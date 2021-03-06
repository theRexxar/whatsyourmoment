<?php 
/* -----------------------------------------------------------------------------------------
   IdiotMinds - http://idiotminds.com
   -----------------------------------------------------------------------------------------
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include the facebook.php from libraries directory
//require_once APPPATH.'libraries/facebook/facebook.php';

class Admin extends CI_Controller {

   public function __construct(){
	    parent::__construct();
		
		$this->config->load('facebook'); //Load the facebook.php file which is located in config directory
	    
	    $facebook = array(
			'appId'		=>  $this->config->item('appID'), 
			'secret'	=> $this->config->item('appSecret'),
		);

	    $this->load->model('wm_model');
	    $this->load->library('session');  //Load the Session 
		$this->load->library('facebook/facebook',$facebook); 
    }

	public function index($param = ""){
		
		$data = array();

		$data['detail_member'] = $this->wm_model->detail_member($param); 

		if($this->session->userdata("ses_user") != ""){
			$data['ses_user'] = $this->session->userdata("ses_user");
		}

		$this->load->view('admin', $data); //load the main.php file for view
		//$this->output->enable_profiler();
	}	
}

/* End of file fbci.php */
/* Location: ./application/controllers/fbci.php */