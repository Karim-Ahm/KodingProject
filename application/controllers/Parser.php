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
	     if(strpos($input,"loop") !== FALSE){
	          return true;
	     }
	     else return false;
	}
	public function is_conditional($input){
	     if(strpos($input,"if") !== FALSE){
	          return true;
	     }
	     else return false;
	}
	public function syntax_check($input){
	     $input = "moveup();\nmove down();\nmove_left( ); loop(5) asd; asd; endloops;";
	     $statements = explode("\n",$input);
	     foreach($statements as $statement){
	          if(is_array($statement)){
                    $statement = implode($statement);
	          }
	          echo $this->verify_syntax($statement);
	          
	     }
     }
     public function verify_syntax($input){
          if($this->is_loop($input))
               return $this->verify_syntax_loop($input);
          else if($this->is_conditional($input))
               return $this->verify_syntax_conditional($input);
          else
               return $this->verify_syntax_function($input);
     }
     public function verify_syntax_loop($input){
          $entry = substr($input,0,7);
          $closing = substr($input, strlen($input) - 8,8);
          if(strpos($entry,"loop(") === FALSE)
               return "Incorrect loop entry";
          else if($strpos($closing,"endloop;") === FALSE)
               return "Incorrect loop closing";
          else return true;
     }
     public function verify_syntax_conditional(){
     }
     public function verify_syntax_function($input){
          if(preg_match('/[\s\t]/', $input))
               return "Extra spaces";
          else return true;
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
