<?php
require_once '../db_connect.php';
include '../app_classes.php';
$id = $_GET["id"];

//query for questions
$questions = $database->select("questions", "*", ["fk_quiz_id" => "$id"]);

//will hold array to query for answers
$question_ids = [];

//build query array for answers
foreach ($questions as $q){
	$question_ids[] = $q["question_id"];
}
//query for answers 
$answers = $database->select("answers", ["answer","fk_question_id","answer_id"], ["fk_question_id" => $question_ids]);

$question_objects = [];

// construct array of Question objects
foreach ($questions as $question) {
	$question["question_id"] = new Question ($question["fk_quiz_id"], $question["question_id"], 
		$question["question"], array());
	array_push($question_objects, $question["question_id"]);
};

//push answer_id and answer into Question objects
foreach ($answers as $answer) {
	foreach($question_objects as $q){
		if ($answer["fk_question_id"] == $q->question_id){
			$q->answers[$answer["answer_id"]] = $answer["answer"];
		}
	}
};

//return array to front end
if(!empty($questions)){
	echo json_encode($question_objects);
} else {
	echo "no questions...";
}; 
?>