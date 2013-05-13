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

	function detail_member($param){
		if($param == '' || $param == 'all'){
			$data = $this->db->select('wm_user.fb_id, wm_user.name, wm_user.username, wm_data.category, wm_data.quote, wm_data.photo, wm_data.caption, wm_data.url')
				->from('wm_data')
				->join('wm_user', 'wm_data.fb_id=wm_user.fb_id','left')
				->order_by('wm_data.date', 'ASC')
				->get();
		} else {
			$data = $this->db->select('wm_user.fb_id, wm_user.name, wm_user.username, wm_data.category, wm_data.quote, wm_data.photo, wm_data.caption, wm_data.url')
				->from('wm_data')
				->join('wm_user', 'wm_data.fb_id=wm_user.fb_id','left')
				->where('wm_data.category', $param)
				->order_by('wm_data.date', 'ASC')
				->get();
		}

		if($data){
			return $data->result_array();
		}
		
		return FALSE;
	}
    
}
	