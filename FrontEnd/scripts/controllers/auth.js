angular.module('client').
    controller('AuthController', function($scope, $location, $http, $window){

        $scope.signin = function(loginForm) {
            var formData = {
                email: $scope.email,
                password: $scope.password
            };

            console.log(formData);

            /*$http({
                header: {
                    'Content-Type': 'application/json'
                },
                url: 'http://localhost:8000/api/authenticate', 
                method: "POST",
                data: formData
            })*/
            $http.post('http://localhost/Web/Project/BackEnd/public/api/authenticate', formData)
            .success(function (data) {
                // Stores the token until the user closes the browser window.
                $window.sessionStorage.setItem('token', data.token);
                $location.path('/');
            }).error(function () {
                $window.sessionStorage.removeItem('token');
                // TODO: Show something like "Username or password invalid."
            });
        };
    });


angular.module('client').
    controller('SignoutController', function($location, $window){
        $window.sessionStorage.removeItem('token');
        $location.path('/');
    });