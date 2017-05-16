'use strict';

angular.module('resourcesApp')
  .config(function ($stateProvider) {
    $stateProvider
      .state('login', {
        url: '/login',
        templateUrl: '/app/account/login/login.html',
        controller: 'LoginController'
      })
      .state('signup', {
        url: '/signup',
        templateUrl: '/app/account/signup/signup.html',
        controller: 'SignUpController'
      })
      .state('settings', {
        url: '/settings',
        templateUrl: '/app/account/settings/settings.html',
        controller: 'SettingsCtrl',
        authenticate: true
      });
  });