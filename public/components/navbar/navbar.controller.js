'use strict';

angular.module('resourcesApp')
    .controller('NavbarCtrl', function ($scope, $location,$http,$state, Auth,$cookieStore) {
        $scope.menu = [{
            'title': 'Inicio',
            'link': 'home'
        }, {
            'title': 'Diccionario',
            'link': 'diccionario'
        }, {
            'title': 'Validacion',
            'link': 'validacion'
        }];
        $scope.isCollapsed = true;
        $scope.isLoggedIn = false
        if ($cookieStore.get('token')) {
            $scope.isLoggedIn = true
            $http.get('/api/v1/users/me').then(function (data) {
                 $scope.currentUser= data;
            });
        }
        $scope.go = $state.go

        $scope.logout = function () {
            Auth.logout();
            $state.go('login');
        };
        $scope.isActive = function (route) {
            return route === $location.path();
        };
    });