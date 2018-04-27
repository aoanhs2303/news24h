var app = angular.module('myApp')
app.controller('CommentCtrl',  function($scope, $http, $routeParams, $rootScope, $mdToast){
	$rootScope.header_name = 'BÌNH LUẬN';
	$rootScope.header_subname = 'Quản lý bình luận';
	$rootScope.activeMenu = 'Comment';

	var vm = this;
	var get_apiURL = 'http://localhost/news24h/API/News/getAllComment';
	$http.get(get_apiURL)
	.then(function(res){
		vm.commentData = res.data;
	}, function(res){})

	$scope.blockComment = function(item) {
		if(item.block == 0) {
			item.block = 1;
		} else {
			item.block = 0;
		}
		var data = $.param({
			id_comment: item.id_comment,
			block: item.block,
		});
		console.log(data);

		var config = {
			headers: {
				'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		var editUrl = 'http://localhost/news24h/API/News/toggleComment';
		$http.post(editUrl,data,config)
		.then(function(res) {
			if(res) {
				$scope.showSimpleToast('✔ Thành công');	
			}
		}, function(err){})

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