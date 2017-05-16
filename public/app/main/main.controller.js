'use strict';

angular.module('resourcesApp')
    .controller('MainCtrl', function ($scope,$state, $http, Auth) {
        $scope.awesomeThings = [];
        //$scope.getCurrentUser = Auth.getCurrentUser;
        /*$http.get('/api/users/user').success(function (data) {
            $scope.user = data.user;

        });
        $http.get('/api/authenticate').success(function (awesomeThings) {
            $scope.awesomeThings = awesomeThings;
        });
*/

        $scope.deleteThing = function (thing) {
            $http.delete('/api/things/' + thing._id);
        };
    });
