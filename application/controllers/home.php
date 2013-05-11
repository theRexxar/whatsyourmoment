<?php 
/* -----------------------------------------------------------------------------------------
   IdiotMinds - http://idiotminds.com
   -----------------------------------------------------------------------------------------
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include the facebook.php from libraries directory
//require_once APPPATH.'libraries/facebook/facebook.php';

class Home extends CI_Controller {

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

		if($this->session->userdata("ses_user") != ""){
			$ses_user = $this->session->userdata("ses_user");
		}
		$this->load->view('home', $ses_user); //load the main.php file for view
	}
	
	function logout(){
		$base_url=$this->config->item('base_url'); //Read the baseurl from the config.php file
		$this->session->sess_destroy();  //session destroy
		header('Location: '.$base_url);  //redirect to the home page
	}

	function fblogin(){
		
		$base_url=$this->config->item('base_url'); //Read the baseurl from the config.php file
		//get the Facebook appId and app secret from facebook.php which located in config directory for the creating the object for Facebook class
		
		$user = $this->facebook->getUser(); // Get the facebook user id 
		$user_profile = $this->facebook->api('/me');  //Get the facebook user profile data
		
		
		if($user){
			
			try{
				$user_profile = $this->facebook->api('/me');  //Get the facebook user profile data
				
				$params = array('next' => $base_url.'home/logout');
				
				$ses_user = array('User'=>$user_profile,
				   'logout' =>$this->facebook->getLogoutUrl($params)   //generating the logout url for facebook 
				);
		        
		        
		        $params = array(
					'fb_id'    => $ses_user['User']['id'],
					'username' => $ses_user['User']['username'],
					'name'     => $ses_user['User']['name'],
					'email'    => $ses_user['User']['email']
				);

				$this->session->set_userdata("ses_user",$ses_user['User']['id']);
		        //var_dump($ses_user);exit();
		        
				$already_member = $this->wm_model->cekUser($params['fb_id']); 
				
				if(!$already_member) {
				  $this->wm_model->submitUser($params); 
				}

				header('Location: '.$base_url);
			}catch(FacebookApiException $e){
				error_log($e);
				$user = NULL;
			}		
		}	

		$this->load->view('home', $params);
	}

	function submit_quote(){
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
        $error = array();

        $config = array(
		               array(
		                     'field'   => 'qoutes',
		                     'label'   => 'Quote',
		                     'rules'   => 'trim|required'
		                  ),
		               array(
		                     'field'   => 'category',
		                     'label'   => 'Category',
		                     'rules'   => 'trim|required'
		                  )
		            );
		
		$this->form_validation->set_rules($config); 
		$this->form_validation->set_error_delimiters('','');

		if ($this->form_validation->run() == FALSE) //kalo form validation gagal alias form gak lengkap
		{
			$error[] = $this->form_validation->error_string();
		}
		else
		{
			$params = array(
                			"fb_id" 	=> $this->session->userdata("ses_user"),
                			"quote" 	=> $this->input->post('qoutes'),
                			"category" 	=> $this->input->post('category'),
                		);

			$submit = $this->wm_model->submitForm($params);
                           
			if ( ! $submit) //kalo gagal input ke database
            {
                $error[] = 'Gagal simpan data ke database';  
            }
		}

		if(!empty($error)) //kondisi kalo ada error alias form submit gagal
        { 
			$return['success'] = 0;
			$return['error'] = $error;
			
			header('Location: '.base_url().'thankyou');  //redirect to the home page
		}
		else //kalo gak ada error alias form submit sukses
        { 
			$return['success'] = 1;
			
			header('Location: '.base_url().'thankyou');  //redirect to the home page
		}
		
		//echo json_encode($return);
	}

	function submit_photo(){
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
        $error = array();

        $config = array(
		               array(
		                     'field'   => 'category',
		                     'label'   => 'Category',
		                     'rules'   => 'trim|required'
		                  ),
		                array(
		                     'field'   => 'caption',
		                     'label'   => 'Caption',
		                     'rules'   => 'trim|required'
		                  )
		            );
		
		$this->form_validation->set_rules($config); 
		$this->form_validation->set_error_delimiters('','');

		if ($this->form_validation->run() == FALSE) //kalo form validation gagal alias form gak lengkap
		{
			$error[] = $this->form_validation->error_string();
		}
		else
		{
			$dir="user/";
        	$dir_thumb="user/thumbs/";

			if(!empty($_FILES['userfile']['name'])) //kalo pilih image
    		{
                $params = array(
                			"fb_id" 	=> $this->session->userdata("ses_user"),
                			"category" 	=> $this->input->post('category'),
                			"caption" 	=> $this->input->post('caption')
                		);
                
                //config image name
                $fb_id		= $this->session->userdata("ses_user");
    			$acak		= rand(000,999);
    			$bersih		= $_FILES['userfile']['name'];
    			$nm 		= str_replace(" ","_","$bersih");
    			$pisah 		= explode(".",$nm);
    			$nama_murni = md5($pisah[0]);
    			$dot		= ".";
    			$ext 		= $pisah[1];
    			$resize  	= "_resize";
                
    			$ubah 			= $fb_id."_".$acak.$dot.$ext; //format actual image name
    			$ubah_resize 	= $fb_id."_".$acak.$resize.$dot.$ext; //format image resize name
                
    			$params['photo'] 	= $ubah_resize;
                
                //config image actual size
    			$config = array(
    							'file_name'			=> $ubah,
    							'allowed_types'	    => 'gif|jpg|png|bmp|jpeg',
    							'upload_path' 	    => config_item('uploads_path'),
    							'max_size' 			=> 2000
    							);
    
    			$this->load->library('upload',$config);
                                                                
    			if($this->upload->do_upload()) //kalo upload berhasil
    			{                                      			 
    				$image_data = $this->upload->data();
                    
                    //config image resize
                    $configResize = array(
											'image_library'  =>'gd2',
											'source_image'   => $image_data['full_path'],
											'new_image'      => config_item('uploads_path').$ubah_resize,
											'maintain_ratio' => TRUE,
											'quality'        => 80,
											'log_threshold'  => 2,
											'width'          => 800,
											'height'         => 700,
											'master_dim'     => 'auto'
    										);

    				$this->load->library('image_lib', $configResize, 'image_lib1');
    				$this->image_lib1->resize();
                    
                    $submit = $this->wm_model->submitForm($params);
                           
        			if ( ! $submit) //kalo gagal input ke database
                    {
                        $error[] = 'Gagal simpan data ke database';  
                    }  
            	}
                else //kalo upload error
    			{
                    $error[] = $this->upload->display_errors('','');
                }
    		}
            else //kalo gak pilih image
            {   
                $error[] = 'Anda belum memilih file foto';
            }
		}

		if(!empty($error)) //kondisi kalo ada error alias form submit gagal
        { 
			$return['success'] = 0;
			$return['error'] = $error;
			header('Location: '.base_url().'thankyou');  //redirect to the home page
		}
		else //kalo gak ada error alias form submit sukses
        { 
			$return['success'] = 1;
			header('Location: '.base_url().'thankyou');  //redirect to the home page
		}
		
		//echo json_encode($return);
	}

	function submit_video(){
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
        $error = array();

        $config = array(
		               array(
		                     'field'   => 'url',
		                     'label'   => 'URL',
		                     'rules'   => 'trim|required'
		                  ),
		               array(
		                     'field'   => 'category',
		                     'label'   => 'Category',
		                     'rules'   => 'trim|required'
		                  )
		            );
		
		$this->form_validation->set_rules($config); 
		$this->form_validation->set_error_delimiters('','');

		if ($this->form_validation->run() == FALSE) //kalo form validation gagal alias form gak lengkap
		{
			$error[] = $this->form_validation->error_string();
		}
		else
		{
			$params = array(
                			"fb_id" 	=> $this->session->userdata("ses_user"),
                			"url" 		=> $this->input->post('url'),
                			"category" 	=> $this->input->post('category'),
                		);

			$submit = $this->wm_model->submitForm($params);
                           
			if ( ! $submit) //kalo gagal input ke database
            {
                $error[] = 'Gagal simpan data ke database';  
            }
		}

		if(!empty($error)) //kondisi kalo ada error alias form submit gagal
        { 
			$return['success'] = 0;
			$return['error'] = $error;
			header('Location: '.base_url().'thankyou');  //redirect to the home page
		}
		else //kalo gak ada error alias form submit sukses
        { 
			$return['success'] = 1;
			header('Location: '.base_url().'thankyou');  //redirect to the home page
		}
		
		//echo json_encode($return);
	}
	
}

/* End of file fbci.php */
/* Location: ./application/controllers/fbci.php */