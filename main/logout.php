<?php

require_once('config.php');
logout($db);
function logout($db){
		header('location: index.php');
	}

?>