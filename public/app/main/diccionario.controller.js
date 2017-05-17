'use strict';

angular.module('resourcesApp')
    .controller('DiccionarioCtrl', function ($scope, $state, $http, Auth, $ajax) {

        $scope.guardarDiccionario = function () {
            $ajax.post({
                url: '/api/v1/diccionario',
                data: {
                    archivo: $scope.archivo,

                },
                request_type: 'file',
                succes: function (data) {
                    console.log(data);
                    bootbox.alert('Diccionario Guardado Satisfactoriamente');
                    $state.go('validacion');
                }
            });
        }

    });
