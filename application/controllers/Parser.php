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
<<<<<<< HEAD
<<<<<<< HEAD
	
	public function get_Parameter($line){
		//$line = $this->input->get("line");
		//echo $line;
		$length = strlen($line);	
		for($i = 0 ; $i<$length ; $i++){
			if($line[$i] == '('){
				for($j = $i ; $j<$length ; $j++){
					if($line[$j] == ')'){
						//echo "<br>".substr($line, $i+1, $j-$i-1);
						return substr($line, $i+1, $j-$i-1);
					}
				}
			}
		}
	}
=======
>>>>>>> parent of 7c568f4... contains:

=======
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
>>>>>>> 80c38bd8c68051348effdcce42c706dc5a00f064
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
<<<<<<< HEAD
<<<<<<< HEAD
		}*/
=======
=======
>>>>>>> parent of 7c568f4... contains:
		}

	}

	public function index() {
<<<<<<< HEAD
		//$this -> load -> view("test");
		$this->syntax_check("");
	}
>>>>>>> 80c38bd8c68051348effdcce42c706dc5a00f064
=======
		$this -> load -> view("test");
	}
>>>>>>> parent of 7c568f4... contains:

	public function validate() {
		print_r($_POST);
	}

}
?>
