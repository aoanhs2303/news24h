var app = angular.module('myApp')
app.controller('List_ArticleCtrl',  function($scope, $http, $routeParams, $rootScope, $mdToast){
	$rootScope.header_name = 'BÀI VIẾT';
	$rootScope.header_subname = 'Quản lý bài viết';
	$rootScope.activeMenu = 'Article';

	var vm = this;
	var get_apiURL = 'http://localhost/news24h/home/news/getArticle';
	$http.get(get_apiURL)
	.then(function(res){
		vm.articleData = res.data;
	}, function(res){})


	$scope.deleteArticle = function(item) {
		var id_arti = $.param({
			id_article: item.id_article
		});
		var config = {
			headers: {
				'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		var delUrl = 'http://localhost/news24h/home/news/deleteArticle';
		$http.post(delUrl,id_arti,config)
		.then(function(res) {
			if(res) {
				var log_content = 'Xóa bài viết: ' + item.title;
				var log_iduser = $rootScope.log_iduser;
				$scope.systemlog(log_content, log_iduser);
				$scope.showSimpleToast('✔ Xóa thành công');	
				console.log(res);
				var get_apiURL = 'http://localhost/news24h/home/news/getArticle';
				$http.get(get_apiURL)
				.then(function(res){
					vm.articleData = res.data;
				}, function(res){})

			}
		}, function(err){})
	}

	$scope.systemlog = function(content, id_user) {
		var data = $.param({
			log_content: content,
			log_iduser: id_user
		});

		var config = {
			headers: {
				'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		$http.post('http://localhost/news24h/home/news/addLog',data,config)
		.then(function(res){}, function(err){})
	}

	var last = {
		bottom: false,
		top: true,
		left: false,
		right: true
	};

	$scope.toastPosition = angular.extend({},last);

	$scope.getToastPosition = function() {
		sanitizePosition();

		return Object.keys($scope.toastPosition)
		.filter(function(pos) { return $scope.toastPosition[pos]; })
		.join(' ');
	};
	
	function sanitizePosition() {
		var current = $scope.toastPosition;

		if ( current.bottom && last.top ) current.top = false;
		if ( current.top && last.bottom ) current.bottom = false;
		if ( current.right && last.left ) current.left = false;
		if ( current.left && last.right ) current.right = false;

		last = angular.extend({},current);
	}

	$scope.showSimpleToast = function(message) {
		var pinTo = $scope.getToastPosition();

		$mdToast.show(
			$mdToast.simple()
			.textContent(message)
			.position(pinTo )
			.hideDelay(2000)
			);
	};

})