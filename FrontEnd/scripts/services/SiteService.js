angular.module('client')
    .factory('SiteResource', function($resource) {
        return $resource("http://localhost/Web/Project/BackEnd/public/api/sites/:id", {
            id: "@id"
        }, {
            update: {
                method: "PUT"
            }
        });
    });