'use strict';

angular.module('resourcesApp')
    .controller('MainCtrl', function ($scope, $state, $http, Auth, $ajax) {
        $scope.awesomeThings = [];
        $scope.guardar = function () {
            //$ajax.
        }
        $scope.deleteThing = function (thing) {
            $http.delete('/api/things/' + thing._id);
        };
        $scope.guardarDiccionario = function () {
            $ajax.post({
                url: '/api/v1/diccionario',
                data: {
                    archivo: $scope.archivo,

                },
                request_type: 'file',
                succes: function (data) {
                    console.log(data);
                }
            });
        }
        $scope.hacerValidacion = function () {
        }
    });
