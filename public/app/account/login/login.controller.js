'use strict';

angular.module('resourcesApp')
  .controller('LoginController', function ($scope, Auth, $location,$state) {
    $scope.user = {};
    $scope.errors = {};
      //bootbox.alert("Hello world!");
      
    $scope.login = function(form) {
      $scope.submitted = true;

      if(form.$valid) {
        Auth.login({
          email: $scope.user.email,
          password: $scope.user.password
        })
        .then( function() {
          // ir al home
          $state.go('home');
        })
        .catch( function(err) {
          $scope.errors.other = err.message;
        });
      }
    };

  });
