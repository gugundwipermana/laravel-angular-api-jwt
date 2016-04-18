angular.module('client', ['ngResource', 'ngRoute'])
    .config(function($routeProvider) {
        $routeProvider
        .when('/', {
            templateUrl: 'views/sites/index.html',
            controller: 'SiteController'
        })
        .when('/signin', {
            templateUrl: 'views/sites/signin.html',
            controller: 'AuthController'
        })
        .when('/signout', {
            template: '',
            controller: 'SignoutController'
        })
        .otherwise({
            redirectTo: '/'
        });
    });