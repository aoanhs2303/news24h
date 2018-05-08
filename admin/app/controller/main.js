angular.module('Authentication', []);
var app = angular.module('myApp',['ngMaterial', 'ngRoute', 'datatables','ngSanitize', 'ui.select', 'ngCookies', 'Authentication']);

app.controller('myController', function ($scope, $rootScope, $http, $cookies) {
	$rootScope.BASEURL = 'http://localhost/news24h/home/uploads/';
	$rootScope.URL = 'http://localhost/news24h/home/home/';
	var log_username = $cookies.get('login_name');
	var log_iduser = $cookies.get('login_iduser');
	var usertype = $cookies.get('usertype');
	$rootScope.login_name = log_username;
	$rootScope.log_iduser = log_iduser;
	$rootScope.usertype = usertype;
	$scope.colors = [
	    "label-danger",
	    "label-primary",
	    "label-success",
	    "label-info",
	    "label-warning"
	];

})

app.config(function ($routeProvider, $locationProvider) {
	$locationProvider.html5Mode(true);
	$routeProvider
	.when('/', {
		templateUrl: 'angular_route/home.html',
		controller: 'HomeCtrl'
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
    .when('/account', {
    	templateUrl: 'angular_route/add_account.html',
    	controller: 'AccountCtrl'
    })
    .when('/edit', {
    	templateUrl: 'angular_route/edit_account.html',
    	controller: 'EditAccountCtrl'
    })
	.otherwise({ redirectTo: '/' })
})

.run(['$rootScope', '$location', '$cookieStore', '$http',
function ($rootScope, $location, $cookieStore, $http) {
    $rootScope.globals = $cookieStore.get('globals') || {};
    if ($rootScope.globals.currentUser) {
        $http.defaults.headers.common['Authorization'] = 'Basic ' + $rootScope.globals.currentUser.authdata; // jshint ignore:line
    }

    $rootScope.$on('$locationChangeStart', function (event, next, current) {
        if ($location.path() !== '/login' && !$rootScope.globals.currentUser) {
            $location.path('/login');
        }
    });
}]);

app.directive("ngRandomClass", function () {
return {
    restrict: 'EA',
    replace: false,
    scope: {
        ngClasses: "=ngRandomClass"
    },
    link: function (scope, elem, attr) {            
        elem.addClass(scope.ngClasses[Math.floor(Math.random() * (scope.ngClasses.length))]);
    }
}});