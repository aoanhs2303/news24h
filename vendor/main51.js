var app = angular.module('myApp',['ngMaterial', 'ngRoute']);
app.controller('MyController',  function($scope){
	$scope.showAddCate = false;
	$scope.showEdit = false;
	$scope.toggleCate = function() {
		$scope.showAddCate = !$scope.showAddCate; 
	}
	$scope.toggleEdit = function() {
		$scope.showEdit = !$scope.showEdit; 
	}
})

app.config(function ($routeProvider, $locationProvider) {
	$locationProvider.html5Mode(true);
	$routeProvider
	.when('/', {
		templateUrl: 'angular_route/category.html',
		controller: 'CategoryCtrl'
	})
	.when('/category', {
		templateUrl: 'angular_route/category.html',
		controller: 'CategoryCtrl'
	})
	.otherwise({ redirectTo: '/' })
})

app.controller('CategoryCtrl',  function($scope,$http){
	$scope.showAddCate = false;

	var get_apiURL = 'http://localhost/news24h/API/news/getAllCate';
	$http.get(get_apiURL)
	.then(function(res){
		$scope.cateData = res.data;
		console.log($scope.cateData);	
	}, function(res){})
	$scope.toggleCate = function() {
		$scope.showAddCate = !$scope.showAddCate; 
	}
	$scope.toggleEdit = function(item) {
		item.showEdit = !item.showEdit; 
	}
	$scope.saveEditCate = function(item) {
		item.showEdit = !item.showEdit; 

		var data = $.param({
			username: item.name,
			password: item.code_name
		});
		console.log(data);
	}

	$scope.addCate = function() {
		var data = $.param({
			name: $scope.addcate__name,
			code_name: $scope.addcate__code
		});
		var config = {
			headers: {
				'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		var addUrl = 'http://localhost/news24h/API/news/addCate';
		$http.post(addUrl,data,config)
		.then(function(res) {
			if(res) {
				console.log("Thành công");
				var get_apiURL = 'http://localhost/news24h/API/news/getAllCate';
				$http.get(get_apiURL)
				.then(function(res){
					$scope.cateData = res.data;
					console.log($scope.cateData);	
				}, function(res){})
				$scope.addcate__name = "";
				$scope.addcate__code = "";
			}
		}, function(err){})
	}
})