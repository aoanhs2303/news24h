var app = angular.module('myApp')
app.controller('AccountCtrl',  function($scope, $http, $routeParams, $rootScope, $mdToast){
	$rootScope.header_name = 'TÀI KHOẢN AUTHOR & ADMIN';
	$rootScope.header_subname = 'Quản lý tài khoản';
	$rootScope.activeMenu = 'addAccount';

	$scope.addAuthor = function() {
		var data = $.param({
			username: $scope.username,
			email: $scope.email,
			password: $scope.password,
			id_usertype: 2
		});
		var config = {
			headers: {
				'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		$http.post('http://localhost/news24h/API/news/addAccount',data,config)
		.then(function(res){
			$scope.showSimpleToast('✔ Thêm tài khoản thành công');	
		}, function(err){})
		var log_content = 'Thêm tài khoản cho tác giả: ' + $scope.username;
		var log_iduser = $rootScope.log_iduser;
		$scope.systemlog(log_content, log_iduser);
		$scope.username = "";
		$scope.email = "";
		$scope.password = "";
	}

	$scope.addAdmin = function() {
		var data = $.param({
			username: $scope.username_2,
			email: $scope.email_2,
			password: $scope.password_2,
			id_usertype: 1
		});
		var config = {
			headers: {
				'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		$http.post('http://localhost/news24h/API/news/addAccount',data,config)
		.then(function(res){
			$scope.showSimpleToast('✔ Thêm tài khoản thành công');	
		}, function(err){})
		var log_content = 'Thêm tài khoản admin cho: ' + $scope.username_2;
		var log_iduser = $rootScope.log_iduser;
		$scope.systemlog(log_content, log_iduser);
		$scope.username_2 = "";
		$scope.email_2 = "";
		$scope.password_2 = "";
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