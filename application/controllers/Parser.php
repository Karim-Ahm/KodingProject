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
		$this -> load -> view("test");
	}

	public function validate() {
		print_r($_POST);
	}

}
?>
