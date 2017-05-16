'use strict';

angular.module('resourcesApp')
  .controller('NavbarCtrl', function ($scope, $location,$state,Auth) {
    $scope.menu = [{
      'title': 'Inicio',
      'link': '/home'
    }];

    $scope.isCollapsed = true;
    $scope.isLoggedIn = Auth.isLoggedIn;
    $scope.isAdmin = Auth.isAdmin;
    $scope.getCurrentUser = Auth.getCurrentUser;
    console.log($scope.isLoggedIn(),$scope.getCurrentUser());

    $scope.logout = function() {
      Auth.logout();
      $state.go('login');
    };

    $scope.isActive = function(route) {
      return route === $location.path();
    };
  });