<?php

require_once '../db_connect.php';

$datas = $database->select("quizes", "*");

if($datas !== false){
	echo json_encode($datas);

} else {
	echo "fail";
}; 

?>