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

	public function parse_text() {
		$code_array = array();	
		$code_text = $this -> input -> post("text");
		
		$code_array_temp = explode("\n", $code_text);
		$code_array_length = count($code_array_temp);
		//echo $code_array_length;
		
		echo "<pre>";
		//var_dump($code_array_temp);
		echo "</pre>";
		
		$i = 0;
		for ( ; $i<$code_array_length ; $i++) {
			
			if (strlen($code_array_temp[$i]) > 4) {
				echo substr($code_array_temp[$i], 0,4)."<br>";
				if (substr($code_array_temp[$i], 0,4) == "loop"){
					$code_array[$i] = "loop";
					$code_array[$i] = array("condition" => $this->get_Parameter($code_array_temp[$i]));
					//echo $code_array[$i]["condition"];
					$j = $i;
					$k = 0;	
					for( ; $j<$code_array_length ; $j++){
						if($code_array_temp[$j] == "endloop;"){
							$i = $j;
							break;
						}else{
							$code_array[$i][$k++] = $code_array_temp[$j];
							//echo $code_array[$j][$k]."<br>";
						}
					}
				}else{
					$code_array[$i] = $code_array_temp[$i];
				}
			} else if (strlen($code_array_temp[$i]) > 2) {
				if (substr($code_array_temp[$i], 0,2) == "if") {

				}else{
					$code_array[$i] = $code_array_temp[$i];
				}
			}
		}
		
		echo "<pre>";
		var_dump($code_array);
		echo "</pre>";
		
		/*$i = 0;
		foreach ($code_array as $code_line) {
			echo $code_line . "<br>";
			$i++;
		}*/

	}

}
?>
