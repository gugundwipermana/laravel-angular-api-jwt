angular.module('client').
    controller('SiteController', function($scope, SiteResource, $http) {
       $scope.Products = SiteResource.query();

        $http.get('http://localhost/Web/Project/BackEnd/public/api/sites/user').
        success(function(data, status, headers, config) {
            $scope.user = data;
        });

        $http.get('http://localhost/Web/Project/BackEnd/public/api/sites/recommend').
        success(function(data, status, headers, config) {
            $scope.recommends = data;
        });
    });