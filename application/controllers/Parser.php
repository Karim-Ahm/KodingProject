<?php

class Parser extends CI_Controller{
	
	public function parse_text($code_text){
		
		$code_array = explode("\n", $code_text);
		
	}
	public function index(){
	     $this->load->view("test");
	}
	public function validate(){
	     print_r($_POST);
	}
}



?>
