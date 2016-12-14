<?php
// session_start();
require_once  'medoo.php';
$database = new medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'db_quiz',
	'server' => 'localhost',
	'username' => 'admin',
	'password' => 'admin',
	'charset' => 'utf8',

	// [optional]
	//'port' => 3306,

	// [optional] Table prefix
	//'prefix' => 'PREFIX_',

	// [optional] driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
	'option' => [
	PDO::ATTR_CASE => PDO::CASE_NATURAL
	]
	]);
?>