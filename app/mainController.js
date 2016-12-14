var quizes = angular.module('quizes', ['ngRoute']).
config(function($routeProvider) {
	$routeProvider.
	when("/", {
		templateUrl : "../partials/view-quiz-list.html",
		controller : "selectQuizCtrl"
	}).
	when("/questions/:id", {
		templateUrl : "../partials/view-questions.html",
		controller : "questionsCtrl"
	}).
	when("/two/:id", {
		templateUrl : "../partials/two.html",
		controller : "questionsCtrl2"
	}).
	otherwise({redirectTo:'/'})
}).
//doesn't really do anything
controller('mainController', function($scope, $http){
	$scope.headerMessage = "App Menu:";
}).
//collects list of quizes
controller('selectQuizCtrl', function($scope, $http) {
	$http.get('quiz_list.php', {cache: true}).then(function(response) {
		$scope.quizes = response.data;
	});
}).
//collects questions in a quiz per id
controller('questionsCtrl', function($scope, $http, $routeParams, qService) {
	$scope.questions = qService.theQuestions($routeParams.id).
	then( function(response){
		$scope.questions = response;
	});
}).
controller('questionsCtrl2', function($scope, $http, $routeParams, qService) {
	$scope.questions = qService.theQuestions($routeParams.id).
	then( function(response){
		$scope.questions = response;
	});
}).
//retreive questions from database
service('qService', function($http, $q){
	//sets up object that will be returned
	var qService = this;
	qService.theQuestions = function(id){
		var deferred = $q.defer();
		$http.get('quiz_questions.php?id=' + id, {cache: true}).
		success( function(response) {
			deferred.resolve(response)
		}).
		error( function(response){
			deferred.reject(response)
		})
		return deferred.promise;
	}
	return qService;
}).
//displays question objects in an array
directive('showQuestions', function(){
	return {
		templateUrl: "../templates/questions.html",
	}; 
});


//transform quiz object to contain answer values