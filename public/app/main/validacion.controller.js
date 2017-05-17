'use strict';

angular.module('resourcesApp')
    .controller('ValidacionCtrl', function ($scope, $state, $http, Auth, $ajax) {
        $scope.hacerValidacion = function () {
            $ajax.post({
                url: '/api/v1/validacion',
                data: {
                    archivo: $scope.val,
                    porcentaje: $scope.porcentaje,
                    atributo:$scope.atributo
                },
                request_type: 'file',
                succes: function (data) {
                    $scope.validacion = data.data
                    angular.element('#validacion').modal('show');
                    console.log(data.data);
                }
            });
        }
    });
