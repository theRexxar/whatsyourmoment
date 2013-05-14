<?php 
/* -----------------------------------------------------------------------------------------
   IdiotMinds - http://idiotminds.com
   -----------------------------------------------------------------------------------------
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include the facebook.php from libraries directory
//require_once APPPATH.'libraries/facebook/facebook.php';

class Moments extends CI_Controller {

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

	public function index(){
		$ses_user = "";
		$data = array();

		$data['love']       = $this->wm_model->love(); 
		$data['friendship'] = $this->wm_model->friendship(); 
		$data['hobby']      = $this->wm_model->hobby(); 
		$data['trends']     = $this->wm_model->trends(); 
		$data['work']       = $this->wm_model->work(); 
		$data['family']     = $this->wm_model->family();
		$data['etc']        = $this->wm_model->etc(); 	

		if($this->session->userdata("ses_user") != ""){
			$ses_user = $this->session->userdata("ses_user");
		}
		$this->load->view('moments', $data); //load the main.php file for view

		$this->output->enable_profiler();
	}
	
	
}

/* End of file fbci.php */
/* Location: ./application/controllers/fbci.php */