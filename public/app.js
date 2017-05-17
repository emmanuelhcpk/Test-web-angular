'use strict';

angular.module('resourcesApp', [
        'ngCookies',
        'ngResource',
        'ngSanitize',
        'ui.router',
        'ui.bootstrap',
        'servicios'
    ])
    .factory('authInterceptor', function ($rootScope, $q, $cookieStore, $location) {
        return {
            // Add authorization token to headers
            request: function (config) {
                console.log('interceptando');
                config.headers = config.headers || {};
                if ($cookieStore.get('token')) {
                    config.headers.Authorization = 'Bearer ' + $cookieStore.get('token');
                }
                return config;
            },
            // Intercept 401s and redirect you to login
            responseError: function (response) {
                if (response.status === 401) {
                    $location.path('/login');
                    // remove any stale tokens
                    $cookieStore.remove('token');
                    return $q.reject(response);
                }
                else {
                    return $q.reject(response);
                }
            }
        };
    }).config(function ($stateProvider, $urlRouterProvider, $locationProvider, $httpProvider) {
        $urlRouterProvider
            .otherwise('/login');
        $httpProvider.interceptors.push('authInterceptor');
        $stateProvider
            .state('login', {
                url: '/login',
                templateUrl: '/app/account/login/login.html',
                controller: 'LoginController'
            })
            .state('sign', {
                url: '/sign',
                templateUrl: '/app/account/signup/signup.html',
                controller: 'SignUpController'
            }).state('settings', {
            url: '/settings',
            templateUrl: '/app/account/settings/settings.html',
            controller: 'SettingsCtrl',
            authenticate: true
        });
    })

    .run(function ($rootScope, $location, $state, Auth) {
        // Redirect to login if route requires auth and you're not logged in
        $rootScope.$on('$stateChangeStart', function (event, next) {
            Auth.isLoggedInAsync(function (loggedIn) {
                if (next.authenticate && !loggedIn) {
                    event.preventDefault();
                    $state.go('/login');
                }
            });
        });
    });
