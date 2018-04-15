var app = angular.module('myApp',['ngMaterial', 'ngRoute', 'datatables']);

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
	.otherwise({ redirectTo: '/' })
})