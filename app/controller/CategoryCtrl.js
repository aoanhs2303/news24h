angular.module('myApp')
.controller('CategoryCtrl',  function($scope,$http, $mdToast, $rootScope){
	$rootScope.header_name = 'DANH MỤC BÀI VIẾT';
	$rootScope.header_subname = 'Quản lý danh mục';
	$rootScope.activeMenu = 'Cate';

	$scope.showAddCate = false;
	var get_apiURL = 'http://localhost/news24h/API/news/getAllCate';
	$http.get(get_apiURL)
	.then(function(res){
		$scope.cateData = res.data;
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
			id_category: item.id_category,
			name: item.name,
			code_name: item.code_name
		});

		var config = {
			headers: {
				'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		var editUrl = 'http://localhost/news24h/API/news/editCate';
		$http.post(editUrl,data,config)
		.then(function(res) {
			if(res) {
				var get_apiURL = 'http://localhost/news24h/API/news/getAllCate';
				$http.get(get_apiURL)
				.then(function(res){
					$scope.cateData = res.data;
					$scope.showSimpleToast('✔ Sửa thành công');	
				}, function(res){})
			}
		}, function(err){})
		var log_content = 'Sửa danh mục: ' + item.name;
		var log_iduser = $rootScope.log_iduser;
		$scope.systemlog(log_content, log_iduser);
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
					$scope.showSimpleToast('✔ Thêm thành công');	
				}, function(res){})
				var log_content = 'Thêm danh mục mới: ' + $scope.addcate__name;
				var log_iduser = $rootScope.log_iduser;
				$scope.systemlog(log_content, log_iduser);
				$scope.addcate__name = "";
				$scope.addcate__code = "";
			}
		}, function(err){})
	}

	$scope.deleteCate = function(item) {
		var id_cate = $.param({
			id_category: item.id_category
		});
		var config = {
			headers: {
				'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		var delUrl = 'http://localhost/news24h/API/news/deleteCate';
		$http.post(delUrl,id_cate,config)
		.then(function(res) {
			if(res) {
				var get_apiURL = 'http://localhost/news24h/API/news/getAllCate';
				$http.get(get_apiURL)
				.then(function(res){
					$scope.cateData = res.data;
					$scope.showSimpleToast('✔ Xóa thành công');	
				}, function(res){})
			}
		}, function(err){})
		var log_content = 'Thêm xóa danh mục: ' + item.name;
		var log_iduser = $rootScope.log_iduser;
		$scope.systemlog(log_content, log_iduser);
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