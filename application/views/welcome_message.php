<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// Encode data
if(isset($result)) {
	echo json_encode($result);
}
else{
	echo json_encode(array('error' => true));
}

?>
