var app = angular.module('myApp',['ngMaterial', 'ngRoute']);
app.controller('MyController',  function($scope){

})

app.config(function ($routeProvider, $locationProvider) {
	$locationProvider.html5Mode(true);
	$routeProvider
	.when('/', {
		templateUrl: 'angular_route/list_article.html',
		controller: 'CategoryCtrl'
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
	.otherwise({ redirectTo: '/' })
})

app.controller('CategoryCtrl',  function($scope,$http, $mdToast, $rootScope){
	$rootScope.header_name = 'DANH MỤC BÀI VIẾT';
	$rootScope.header_subname = 'Quản lý danh mục';
	
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
		console.log(data);

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

app.directive('ckEditor', function() {
	return {
		require: '?ngModel',
		link: function(scope, elm, attr, ngModel) {
			var ck = CKEDITOR.replace(elm[0]);
			if (!ngModel) return;
			ck.on('pasteState', function() {
				scope.$apply(function() {
					ngModel.$setViewValue(ck.getData());
				});
			});
			ngModel.$render = function(value) {
				ck.setData(ngModel.$viewValue);
			};
		}
	};
});

app.directive('fileModel', ['$parse', function ($parse) {
    return {
    restrict: 'A',
    link: function(scope, element, attrs) {
        var model = $parse(attrs.fileModel);
        var modelSetter = model.assign;

        element.bind('change', function(){
            scope.$apply(function(){
                modelSetter(scope, element[0].files[0]);
            });
        });
    }
   };
}]);
// We can write our own fileUpload service to reuse it in the controller
app.service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function(file, uploadUrl, name){
         var fd = new FormData();
         fd.append('file', file);
         fd.append('name', name);
         $http.post(uploadUrl, fd, {
             transformRequest: angular.identity,
             headers: {'Content-Type': undefined,'Process-Data': false}
         })
         .success(function(){
            console.log("Success");
         })
         .error(function(){
            console.log("Success");
         });
     }
 }]);


app.controller('ArticleCtrl',  function($scope,$rootScope,$http,$mdToast,fileUpload){
	$rootScope.header_name = 'BÀI BÁO';
	$rootScope.header_subname = 'Thêm mới bài báo';

	var get_apiURL = 'http://localhost/news24h/API/news/getAllCate';
	$http.get(get_apiURL)
	.then(function(res){
		$scope.cateData = res.data;
	}, function(res){})

	$scope.uploadFile = function(){
        var file = $scope.myFile;
        var uploadUrl = "http://localhost/news24h/API/news/addArticle";
        var text = $scope.name;
        fileUpload.uploadFileToUrl(file, uploadUrl, text);
    };


	$scope.addArticle = function() {
		//Upload hình trước
		var file = $scope.myFile;
        var uploadUrl = "http://localhost/news24h/API/news/uploadFile";
        var text = $scope.name;
        fileUpload.uploadFileToUrl(file, uploadUrl, text);

		var data = $.param({
			title: $scope.add__title,
			image: file.name,
			id_category: $scope.add__cateid,
			brief_content: $scope.add__brief_content,
			content: $scope.add__content
		})

		var config = {
			headers: {
				'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		console.log(data);
		var addUrl = 'http://localhost/news24h/API/news/addArticle';
		$http.post(addUrl,data,config)
		.then(function(res) {
			if(res) {
				$scope.showSimpleToast('✔ Thêm thành công');	
				$scope.add__title = "";
				$scope.add__brief_content = "";
				$scope.add__content = "";
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

app.controller('List_ArticleCtrl',  function($scope, $http){
	var get_apiURL = 'http://localhost/news24h/API/news/getArticle';
	$http.get(get_apiURL)
	.then(function(res){
		$scope.articleData = res.data;
	}, function(res){})
})