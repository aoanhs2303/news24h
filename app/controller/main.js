angular.module('Authentication', []);
var app = angular.module('myApp',['ngMaterial', 'ngRoute', 'datatables','ngSanitize', 'ui.select', 'ngCookies', 'Authentication']);

app.controller('myController', function ($scope, $rootScope, $http, $cookies) {
	$rootScope.BASEURL = 'http://localhost/news24h/API/uploads/';
	var favoriteCookie = $cookies.get('myFavorite');
	$rootScope.login_name = favoriteCookie;
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
	.when('/comment', {
		templateUrl: 'angular_route/comment.html',
		controller: 'CommentCtrl'
	})
	.when('/history', {
		templateUrl: 'angular_route/history.html',
		controller: 'HistoryCtrl'
	})
	.when('/login', {
        controller: 'LoginController',
        templateUrl: 'modules/authentication/views/login.html'
    })
	.otherwise({ redirectTo: '/' })
})

.run(['$rootScope', '$location', '$cookieStore', '$http',
function ($rootScope, $location, $cookieStore, $http) {
    // keep user logged in after page refresh
    $rootScope.globals = $cookieStore.get('globals') || {};
    if ($rootScope.globals.currentUser) {
        $http.defaults.headers.common['Authorization'] = 'Basic ' + $rootScope.globals.currentUser.authdata; // jshint ignore:line
    }

    $rootScope.$on('$locationChangeStart', function (event, next, current) {
        // redirect to login page if not logged in
        if ($location.path() !== '/login' && !$rootScope.globals.currentUser) {
            $location.path('/login');
        }
    });
}]);