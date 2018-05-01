var app = angular.module('myApp'); 

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
	$rootScope.activeMenu = 'Article';

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
				var log_content = 'Thêm bài viết: ' + $scope.add__title;
				var log_iduser = $rootScope.log_iduser;
				$scope.systemlog(log_content, log_iduser);

				$scope.showSimpleToast('✔ Thêm thành công');	
				$scope.add__title = "";
				$scope.add__brief_content = "";
				$scope.add__content = "";
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