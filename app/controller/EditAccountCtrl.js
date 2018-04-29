var app = angular.module('myApp')
app.controller('EditAccountCtrl',  function($scope, $http, $routeParams, $rootScope, $mdToast, $cookies){
	$rootScope.header_name = 'TÀI KHOẢN';
	$rootScope.header_subname = 'Cập nhật tài khoản';
	$rootScope.activeMenu = 'EditAccount';

	$scope.tgName = true;
	$scope.tgEmail = true;
	$scope.tgSdt = true;

	$scope.toggleName = function() {
		$scope.tgName = !$scope.tgName;
	}
	$scope.toggleEmail = function() {
		$scope.tgEmail = !$scope.tgEmail;
	}
	$scope.toggleSdt = function() {
		$scope.tgSdt = !$scope.tgSdt;
	}

	var log_iduser = $cookies.get('login_iduser');
	var data = $.param({
		id_user: log_iduser
	});

	var config = {
		headers: {
			'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'
		}
	}
	$http.post('http://localhost/news24h/API/news/getUserById',data,config)
	.then(function(res){
		$scope.dataUser = res.data;
	}, function(err){})

	$scope.saveUser = function(user, toggle) {
		switch (toggle) {
			case 'fullname':
				$scope.toggleName();
				break;
			case 'email':
				$scope.toggleEmail();
				break;
			case 'sdt':
				$scope.toggleSdt();
				break;
			default:
				// statements_def
				break;
		}
		var data = $.param({
			id_user: user.id_user,
			fullname: user.fullname,
			email: user.email,
			sdt: user.sdt
		});

		var config = {
			headers: {
				'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		$http.post('http://localhost/news24h/API/news/editUserById',data,config)
		.then(function(res){
			$scope.showSimpleToast('✔ Cập nhật thành công');
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