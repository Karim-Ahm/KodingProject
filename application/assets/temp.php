<?php

class temp extends CI_Controller{
	public function index(){
		$this->load->library('../controllers/parser.php');
		$code = $_POST["code_text"];
		echo $code;
		$this->compile($code);
	}
}
	

?>