<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apis_model extends CI_Model
{

	function getURL($url) {
		$curlHandle = curl_init(); // init curl
		curl_setopt($curlHandle, CURLOPT_URL, $url); // set the url to fetch
		// curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array(
		//   'Content-Type: application/json',
		//   'Accept: application/json'
		// ));
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
		curl_setopt($curlHandle, CURLOPT_POST, 0);
		$content = curl_exec($curlHandle);
		curl_close($curlHandle);
		return $content;
	}

	function getsetting(){
	    $url = $this->config->item('api_setting');
	    $json = $this->getURL($url);	    
	    $obj = json_decode($json);	    
		return $obj;
	}

	function getmenu(){
	    $url = $this->config->item('api_menu');
	    $json = $this->getURL($url);	    
	    $obj = json_decode($json);	    
		return $obj;
	}

	function getpost($id_page){
	    $url = $this->config->item('api_page');
	    $json = $this->getURL($url.$id_page);
	    $obj = json_decode($json);	    
		return $obj;
	}


}
?>
