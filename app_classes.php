<?php

class Question {
	public $quiz_id;
	public $question_id;
	public $question;
	public $answers;

	function __construct($quiz_id, $question_id, $question, $answers){
		$this->quiz_id = $quiz_id;
		$this->question_id = $question_id;
		$this->question = $question;
		$this->answers = $answers;
	}
}

// class Question {
// 	public $quiz_id;
// 	public $question_id;
// 	public $question;
// 	public $answers;

// 	function __construct($quiz_id, $question_id, $question){
// 		$this->quiz_id = $quiz_id;
// 		$this->question_id = $question_id;
// 		$this->question = $question;
// 	}

// 	function set_answer($answer_id, $answer){
// 		$answer = ['answer_id' => $answer_id, 'answer' => $answer, 'user_response' => ""];
// 		$answers[] = $answer;
// 	}
// }
?>
