var app = angular.module('myApp')
app.controller('HomeCtrl',  function($scope, $http, $routeParams, $rootScope, $mdToast){
	$rootScope.header_name = 'DASHBOARD';
	$rootScope.header_subname = 'News24H';
	$rootScope.activeMenu = 'Home';

	$http.get('http://localhost/news24h/home/news/countArticle')
	.then(function(res){
		$scope.numArt = res.data;
	}, function(res){})

	$http.get('http://localhost/news24h/home/news/countComment')
	.then(function(res){
		$scope.numCmt = res.data;
	}, function(res){})

	$http.get('http://localhost/news24h/home/news/countView')
	.then(function(res){
		$scope.numView = res.data;
	}, function(res){})

	$http.get('http://localhost/news24h/home/news/countUser')
	.then(function(res){
		$scope.numUser = res.data;
	}, function(res){})

	$http.get('http://localhost/news24h/home/news/get5Log')
	.then(function(res){
		$scope.logData = res.data;
	}, function(res){})

	$http.get('http://localhost/news24h/home/news/get5Article')
	.then(function(res){
		$scope.artData = res.data;
	}, function(res){})


})