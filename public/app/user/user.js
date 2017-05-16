'use strict';

angular.module('resourcesApp')
  .config(function ($stateProvider) {
    $stateProvider
      .state('users', {
        url: '/users',
        templateUrl: '../app/user/user.html',
        controller: 'UserCtrl'
      });
  });