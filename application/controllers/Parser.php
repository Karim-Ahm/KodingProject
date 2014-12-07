<?php

class Parser extends CI_Controller {

	public function index() {
		$this -> load -> view("GameView");
	}

	public function clear_code_lines($code_line) {
		for ($i = 0; $i < strlen($code_line); $i++) {
			if ($code_line[$i] == "(") {
				return substr($code_line, 0, $i);
			}
		}
		return "";
	}

	public function get_Parameter($line) {
		//$line = $this->input->get("line");
		//echo $line;
		$length = strlen($line);
		for ($i = 0; $i < $length; $i++) {
			if ($line[$i] == '(') {
				for ($j = $i; $j < $length; $j++) {
					if ($line[$j] == ')') {
						//echo "<br>".substr($line, $i+1, $j-$i-1);
						return substr($line, $i + 1, $j - $i - 1);
					}
				}
			}
		}
	}

	public function parse_text() {
		$code_array = array();
		$code_text = $this -> input -> post("text");

		$code_array_temp = explode("\n", $code_text);
		$code_array_length = count($code_array_temp);

		$i = 0;
		for (; $i < $code_array_length; $i++) {
			$code_array_temp[$i] = substr($code_array_temp[$i], 0, strlen($code_array_temp[$i]) - 1);
		}

		$i = 0;
		for (; $i < $code_array_length; $i++) {
			$code_line_length = strlen($code_array_temp[$i]);
			if($this->is_conditional($code_array_temp[$i])){		
				$code_array[$i] = array("type" => "if", "condition" => $this -> get_Parameter($code_array_temp[$i]));

				$j = $i + 1;
				$k = 0;
				for (; $j < $code_array_length; $j++) {
					if ($code_array_temp[$j] == "endif;") {
						$i = $j;
						break;
					} else {
						$code_array[$i][$k++] = $code_array_temp[$j];
					}
				}
			} 
			else if($this->is_loop($code_array_temp[$i])){
				$code_array[$i] = array("type" => "loop", "condition" => $this -> get_Parameter($code_array_temp[$i]));

				$j = $i + 1;
				$k = 0;
				for (; $j < $code_array_length; $j++) {
					if ($code_array_temp[$j] == "endloop;") {
						$i = $j;
						break;
					} else {
						$code_array[$i][$k++] = $code_array_temp[$j];
					}
				}
			} else {
				$code_array[$i] = $code_array_temp[$i];
			}
		}

		echo "<pre>";
		var_dump($code_array);
		echo "</pre>";
	}

	public function is_function($input) {
		$input = str_replace(";", "", $input);
		if (is_loop($input))
			return false;
		if (is_conditional($input))
			return false;
		return (in_array($input, $this -> get_function()));
	}

	public function get_function() {
		// GET ALL FUNCTIONS
	}

	public function is_loop($input) {
		return strpos($input, "loop") === 0?true:false;
	}

	public function is_conditional($input) {
		return strpos($input, "if") === 0?true:false;
	}

	public function syntax_check($input) {
		$input = "moveup();\nmove down();\nmove_left( )";
		$statements = explode("\n", $input);
		foreach ($statements as $statement) {
			verify_syntax($statement);
		}
	}

	public function verify_syntax($input) {
		if (is_loop($input))
			return verify_syntax_loop($input);
		else if (is_conditional($input))
			return verify_syntax_conditional($input);
		else
			return verify_syntax_function($input);
	}

	public function verify_syntax_loop() {

	}

	public function verify_syntax_conditional() {

	}

	public function verify_syntax_function() {

	}

	public function validate() {
		print_r($_POST);
	}

}
?>
