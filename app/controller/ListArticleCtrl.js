var app = angular.module('myApp');
app.controller('List_ArticleCtrl',  function($scope, $http){
	var get_apiURL = 'http://localhost/news24h/API/news/getArticle';
	$http.get(get_apiURL)
	.then(function(res){
		$scope.articleData = res.data;
	}, function(res){})
})