var app = angular.module('myApp')
app.controller('Edit_ArticleCtrl',  function($scope, $http, $routeParams, $rootScope){
	$rootScope.header_name = 'BÀI VIẾT';
	$rootScope.header_subname = 'Quản lý bài viết';
	$rootScope.activeMenu = 'Article';

	// $scope.category 
	var get_apiURL = 'http://localhost/news24h/API/news/getAllCate';
	$http.get(get_apiURL)
	.then(function(res){
		$scope.cateData = res.data;
	}, function(res){})

	if($routeParams.id) {
		var data = $.param({
			article_id: $routeParams.id
		});
		console.log(data);
		var config = {
			headers: {
				'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		var getByIDUrl = 'http://localhost/news24h/API/news/getArticleByID';
		$http.post(getByIDUrl,data,config)
		.then(function(res) {
			if(res) {
				$scope.editData = res.data;
				console.log(res.data);
				console.log($scope.editData);
			}
		}, function(err){})		
	}
	console.log($scope.editData);
	
})