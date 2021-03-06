var app = angular.module('myApp')

app.filter('propsFilter', function() {
  return function(items, props) {
    var out = [];

    if (angular.isArray(items)) {
      var keys = Object.keys(props);

      items.forEach(function(item) {
        var itemMatches = false;

        for (var i = 0; i < keys.length; i++) {
          var prop = keys[i];
          var text = props[prop].toLowerCase();
          if (item[prop].toString().toLowerCase().indexOf(text) !== -1) {
            itemMatches = true;
            break;
          }
        }

        if (itemMatches) {
          out.push(item);
        }
      });
    } else {
      // Let the output be the input untouched
      out = items;
    }

    return out;
  };
});

app.controller('Hot_ArticleCtrl',  function($scope, $http, $rootScope){
	$rootScope.header_name = 'BÀI VIẾT';
	$rootScope.header_subname = 'Cài đặt bài viết HOT';
	$rootScope.activeMenu = 'Article';

	var vm = this;
	$http.get('http://localhost/news24h/home/news/getArticle')
	.then(function(res){
		vm.allAricle = res.data;
		vm.multipleDemo = {};
		vm.multipleDemo.hot = [];

		$http.get('http://localhost/news24h/home/news/getHotArticle')
		.then(function(res){
			vm.multipleDemo.hot = [];
			for (var i = 0; i < res.data.length; i++) {
				vm.multipleDemo.hot.push(res.data[i].id_article);
			}
			
		},function(err){})


	},function(err){})

	

	$scope.guidulieu = function(dulieu) {
		dl = JSON.stringify(dulieu);
		var data = $.param({
			array_id: dl
		});
		var config = {
			headers: {
				'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		var setHotUrl = 'http://localhost/news24h/home/news/setHotArticle';
		$http.post(setHotUrl,data,config)
		.then(function(res){res.data}, function(err){})
		
	}	
})


