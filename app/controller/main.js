var app = angular.module('myApp',['ngMaterial', 'ngRoute', 'datatables','ngSanitize', 'ui.select', 'ngCookies']);

app.controller('myController', function ($scope, $rootScope, $http, $cookies) {
	$rootScope.BASEURL = 'http://localhost/news24h/api/uploads/';
	var get_session = 'http://localhost/news24h/API/news/getSession';
	$http.get(get_session)
	.then(function(res){
		  $scope.myCookie = $cookies.get('username')
		  var favoriteCookie = $cookies.get('username');
		  var user = res.data;
		  $cookies.put('username', user);
	}, function(res){})
	if($cookies.get('username')) {
		
	} else {
		window.location.href = "http://localhost/news24h/API/login";
	}
})

app.config(function ($routeProvider, $locationProvider) {
	$locationProvider.html5Mode(true);
	$routeProvider
	.when('/', {
		templateUrl: 'angular_route/list_article.html',
		controller: 'List_ArticleCtrl'
	})
	.when('/category', {
		templateUrl: 'angular_route/category.html',
		controller: 'CategoryCtrl'
	})
	.when('/article', {
		templateUrl: 'angular_route/article.html',
		controller: 'ArticleCtrl'
	})
	.when('/list_article', {
		templateUrl: 'angular_route/list_article.html',
		controller: 'List_ArticleCtrl'
	})
	.when('/edit_article/:id', {
		templateUrl: 'angular_route/edit_article.html',
		controller: 'Edit_ArticleCtrl'
	})
	.when('/hot_article', {
		templateUrl: 'angular_route/hot_article.html',
		controller: 'Hot_ArticleCtrl'
	})
	.otherwise({ redirectTo: '/' })
})