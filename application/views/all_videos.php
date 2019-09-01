<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Content-type: application/json');

// Encode data
if(isset($result)) {
	echo $result;
}
else
	echo json_encode(array('error' => true));

?>
