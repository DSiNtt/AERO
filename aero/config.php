<?php
	$db_user = "root";
	$db_pas = "";
	$db_name = "aero";

	$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset = utf8', $db_user, $db_pass);
	$db->setAttribite(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE); 
	