<?php
    if (!function_exists('assets_url')) { 
    	function assets_url(){
    		return base_url() . 'assets/';
    	}
    }
    
    if (!function_exists('get_url')){
        function get_url(){
            $current = explode("/",$_SERVER['REQUEST_URI']);
            $url_base = isset($current[3]) ? $current[3] : '';
            $url_child = isset($current[4]) ? $current[4] : '';
            
            return $url_base;
            //var_dump($url_child);
        }
    }

    if (!function_exists('alpha_dash')){
        
        function alpha_dash($str){
            return ( ! preg_match("/^([-a-z0-9_-\s])+$/i", $str)) ? FALSE : TRUE;
        }
    }
?>