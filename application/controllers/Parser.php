<?php

class Parser extends CI_Controller{
	
	public function parse_text($code_text){
		
		$code_array = explode("\n", $code_text);
		
	}
	public function index(){
	     $this->load->view("test");
	}
     
     public function is_function($input){
          $input = str_replace(";","",$input);
          if(is_loop($input)) return false;
          if(is_conditional($input)) return false;
          return (in_array($input, $this->get_function()));
     }
     public function get_function(){
          // GET ALL FUNCTIONS
     }
	public function is_loop($input){
	     if(strpos("loop",$input) !== FALSE){
	          return true;
	     }
	     else return false;
	}
	public function is_conditional($input){
	     if(strpos("if",$input) !== FALSE){
	          return true;
	     }
	     else return false;
	}
	public function syntax_check($input){
	     
	}
}



?>
