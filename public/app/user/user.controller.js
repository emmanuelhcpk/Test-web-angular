'use strict';

angular.module('resourcesApp')
  .controller('UserCtrl', function ($scope,$ajax,$http) {

      $http.get('/api/users/all').success(function (data) {
        $scope.users = data;
      })
      $scope.piojos = false;

      $scope.cambio = function () {
        if ($scope.piojos){
          $scope.piojos=true;

        }
        else{
          $scope.piojos=false;
        }
      }
      $scope.saveUser = function () {
        var user = {
          name: $scope.name,
          email: $scope.email,
          role: $scope.role,
          password: $scope.password
        }
        $ajax.post({
          url: '/api/users/store',
          data:user,
          request_type: 'normal',
          succes: function ($data) {
            console.log($data);
            angular.element('#newUser').modal('hide');
            $scope.users.push(user);
          }
        });
      }

  });
