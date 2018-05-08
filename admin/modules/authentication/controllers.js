'use strict';
 
angular.module('Authentication')
 
.controller('LoginController',
    ['$scope', '$rootScope', '$location', 'AuthenticationService', '$cookies',
    function ($scope, $rootScope, $location, AuthenticationService, $cookies) {
        // reset login status
        AuthenticationService.ClearCredentials();
 
        $scope.login = function () {
            $scope.dataLoading = true;
            AuthenticationService.Login($scope.username, $scope.password, function(response) {
                if(response.success) {
                    AuthenticationService.SetCredentials($scope.username, $scope.password);
                    $cookies.put('login_name', $scope.username);
                    $cookies.put('login_iduser', response.id_user);
                    $cookies.put('usertype', response.usertype);

                    var log_username = $cookies.get('login_name');
                    var log_iduser = $cookies.get('login_iduser');
                    var usertype = $cookies.get('usertype');
                    $rootScope.login_name = log_username;
                    $rootScope.log_iduser = log_iduser;
                    $rootScope.usertype = usertype;

                    
                    $location.path('/');
                } else {
                    $scope.error = response.message;
                    $scope.dataLoading = false;
                }
            });
        };
    }]);