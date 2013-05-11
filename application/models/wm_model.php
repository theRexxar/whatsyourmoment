<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wm_model extends CI_Model {

	
	function __construct()
	{
		parent::__construct();
	}
	
	function cekUser($param){
		$data = $this->db->select('id')
				->from('wm_user')
				->where('fb_id',$param)
				->limit(1)
				->get();
		if($data){
			return $data->row();
		}

		return FALSE;

	}

	function submitUser($params){
		$insert = $this->db->insert('wm_user', $params);
		if ( ! $insert)
		{
			return FALSE;
		}
		return TRUE;
	}

	function submitForm($params){
		$insert = $this->db->insert('wm_data', $params);
		if ( ! $insert)
		{
			return FALSE;
		}
		return TRUE;
	}
    
}
	