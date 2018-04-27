var app = angular.module('myApp')
app.controller('HistoryCtrl',  function($scope, $http, $routeParams, $rootScope, $mdToast){
	$rootScope.header_name = 'LỊCH SỬ HỆ THỐNG';
	$rootScope.header_subname = 'Quản lý lịch sử hệ thống';
	$rootScope.activeMenu = 'SystemLog';

	var get_apiURL = 'http://localhost/news24h/API/news/getAllLog';
	$http.get(get_apiURL)
	.then(function(res){
		$scope.logData = res.data;
		console.log(res.data)
	}, function(res){})
})