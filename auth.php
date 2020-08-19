<?php

if(!isset($_SESSION["sess_id"])){

	header ('location: index');

} else {

	$id = $_SESSION["sess_id"];
}

?>