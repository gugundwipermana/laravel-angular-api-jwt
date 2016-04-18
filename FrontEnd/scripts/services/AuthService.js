angular.module('client')
    .factory('AuthInterceptor', function($window, $q) {
        return {
            request: function(config) {
                config.headers = config.headers || {};
                if ($window.sessionStorage.getItem('token')) {
                    config.headers.Authorization = 'Bearer ' + $window.sessionStorage.getItem('token');
                }
                return config || $q.when(config);
            },
            response: function(response) {
                if (response.status === 401) {
                    // TODO: Redirect user to login page.
                    $location.path('/signin');
                }
                return response || $q.when(response);
            }
        };
    });

// Register the previously created AuthInterceptor.
angular.module('client')
    .config(function ($httpProvider) {
        $httpProvider.interceptors.push('AuthInterceptor');
    });