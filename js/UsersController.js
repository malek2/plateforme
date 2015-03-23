$rootScope.$on('event:loginRequest', function (event, username, password) {
    httpHeaders.common['Authorization'] = 'Basic ' + base64.encode(username + ':' + password);
    $http.get($rootScope.appUrl + '/users/login')
            .success(function (data) {
                console.log('login data @' + data);
                $rootScope.user = data.user;
                $rootScope.$broadcast('event:loginConfirmed');
            });

});
as.controller('LoginCtrl', function ($scope, $rootScope, $http, $location) {
    $scope.login = function () {
        $scope.$emit('event:loginRequest', $scope.username, $scope.password);
        //$location.path('/login');
    };
});
as.controller('RegisterCtrl', function ($scope, $rootScope, $http, $location) {

    $scope.user = {};

    $scope.register = function () {
        console.log('call register');
        var _data = {};
        _data.User = $scope.user;
        $http
                .post($rootScope.appUrl + '/users/add.json', _data)
                .success(function (data, status, headers, config) {
                    $location.path('/login');
                })
                .error(function (data, status, headers, config) {
                });
    }
});