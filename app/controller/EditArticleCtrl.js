var app = angular.module('myApp')
app.controller('Edit_ArticleCtrl',  function($scope, $http, $routeParams, $rootScope, fileUpload, $mdToast){
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
			}
		}, function(err){})		
	}

	$scope.editArticle = function(item) {
		var file = $scope.newImage;
		console.log(file);

		var data = $.param({
			id_article: item.id_article,
			title: item.title,
			brief_content: item.brief_content,
			content: item.content,
			id_category: item.id_category
		})
		console.log(data);

		var config = {
			headers: {
				'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		var editUrl = 'http://localhost/news24h/API/news/editArticleByID';
		$http.post(editUrl,data,config)
		.then(function(res) {
			if(res) {
				var log_content = 'Sửa bài viết: ' + item.title;
				var log_iduser = $rootScope.log_iduser;
				$scope.systemlog(log_content, log_iduser);
				$scope.showSimpleToast('✔ Cập nhật bài viết thành công');
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
		$http.post('http://localhost/news24h/API/news/addLog',data,config)
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