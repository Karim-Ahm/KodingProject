<?php

class Parser extends CI_Controller {

	public function clear_code_lines($code_line) {
		for ($i = 0; $i < strlen($code_line); $i++) {
			if ($code_line[$i] == "(") {
				return substr($code_line, 0, $i);
			}
		}
		return "";
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
	     $input = "moveup();\nmove down();\nmove_left( )";
	     $statements = explode("\n",$input);
	     foreach($statements as $statement){
	          verify_syntax($statement);
	     }
     }
     public function verify_syntax($input){
          if(is_loop($input))
               return verify_syntax_loop($input);
          else if(is_conditional($input))
               return verify_syntax_conditional($input);
          else
               return verify_syntax_function($input);
     }
     public function verify_syntax_loop(){
     
     }
     public function verify_syntax_conditional(){
     
     }
     public function verify_syntax_function(){
     
     }
	public function parse_text() {
		$code_text = $this -> input -> post("text");
		$code_array = explode("\n", $code_text);
		$code_type_array = array();

		foreach ($code_array as $code_line) {
			if ($this->clear_code_lines($code_line) == "loop") {
				$code_type_array[] = "loop";
			} else {
				$code_type_array[] = "function";
			}
		}

		$i = 0;
		foreach ($code_array as $code_line) {
			echo $code_line;
			echo $code_type_array[$i] . "<br>";
			$i++;
		}

	}

	public function index() {
		//$this -> load -> view("test");
		$this->syntax_check("");
	}

	public function validate() {
		print_r($_POST);
	}

}
?>
