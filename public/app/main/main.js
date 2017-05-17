'use strict';

angular.module('resourcesApp')
  .config(function ($stateProvider) {
    $stateProvider
      .state('home', {
        url: '/home',
        templateUrl: '/app/main/main.html',
        controller: 'MainCtrl'/*,
        onEnter:function($scope,Auth){

        }*/
      });
  });