<?php

class ProcessRequest {
	public function processInputData($data) : string {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
}

?>