'use strict';

angular.module('resourcesApp')
  .config(function ($stateProvider) {
    $stateProvider
      .state('home', {
        url: '/home',
        templateUrl: '/app/main/main.html',
        controller: 'MainCtrl'
      }).state('diccionario', {
        url: '/diccionario',
        templateUrl: '/app/main/diccionario.html',
        controller: 'DiccionarioCtrl'
      }).state('validacion', {
        url: '/validacion',
        templateUrl: '/app/main/validacion.html',
        controller: 'ValidacionCtrl'
      });
  });