var root = document.location.host;
function currentUrl(root) {
    if (root === 'localhost' || root === '127.0.0.1' || root === 'local.dev') {
        return 'http://local.dev/dashboardnews/';
    }
    else {
        return "http://" + root + "/";
    }
}
function apiUrl(root) {
    if (root === 'localhost' || root === '127.0.0.1' || root === 'local.dev') {
        return 'http://local.dev/rest.api.news/';
    }
    else {
        return 'http://api.largestinfo.pro/';
    }
}
var app = angular.module("myApp", ['ngRoute']);
app.controller("LoginController", LoginController);
function LoginController($rootScope, $scope, $http) {
    $scope.login = function () {
        var url = apiUrl(root) + 'login';
        //var url = 'http://localhost/rest.api.news/login';
        var user = [];
        if ($scope.username && $scope.password) {
            user = {"User": {"username": $scope.username, "password": $scope.password}};
            console.log(user);
        }
        $http.post(url, JSON.stringify(user))
                .success(function (data) {
                    console.log(data);
                    //data : user;
                    if (data.type === 'error') {
                        $('#alert').html(data.text).show();
                        $('#alert').delay(5000).fadeOut();
                    }
                    if (data.response === 'success') {
                        document.location.href = currentUrl(root) + 'dashboard.php';
                    }
                })
                .error(function (data) {
                    console.log("error " + data);
                });
    };

}
app.controller("SessionController", SessionController);
function SessionController($http, $scope) {
    $http.get(apiUrl(root) + 'session')
            .success(function (response) {
                console.log(response.user);
                $scope.name = response.user;

            });
}
app.controller("VerifSessionController", VerifSessionController);
function VerifSessionController($scope, $http) {
    $http.get(apiUrl(root) + 'login')
            .success(function (response) {
                if (response.length > 0) {
                    if (response.message.type === 'error') {
                        document.location.href = currentUrl(root) + 'dashboard.php';

                    }
                }
            });

}
app.controller("LogoutController", LogoutController);
function LogoutController($scope, $http) {
    $scope.logout = function () {
        $http.get(apiUrl(root) + 'logout')
                .success(function (response) {
                    document.location.href = currentUrl(root) + 'index.php';
                });
    };
}
app.controller("ClientsController", ClientsController);
function ClientsController($scope, $http, $location) {
    $http.get(apiUrl(root) + "clients.json").success(function (response) {
        $scope.users = response;
    });
    $scope.edit = true;

    $scope.create = function () {
        $('#confirmModal').modal('show');
    };
//      $scope.createR = function () {
//        $('#confModal').modal('show');
//    };
//     


    $scope.submit = function () {
        var clients = {};
        if ($scope.id) {
            clients = {
                "id": $scope.id,
                "username": $scope.username,
                "domain": $scope.domain,
                "password": $scope.password,
                "rc": $scope.rc,
                "mf": $scope.mf,
                "email": $scope.email,
                "adress": $scope.adress,
                "phone": $scope.phone,
                "fax": $scope.fax,
            };
        } else {
            clients = {
                "username": $scope.username,
                "domain": $scope.domain,
                "password": $scope.password,
                "rc": $scope.rc,
                "mf": $scope.mf,
                "email": $scope.email,
                "adress": $scope.adress,
                "phone": $scope.phone,
                "fax": $scope.fax,
            };
        }
        $http.post("http://local.dev/rest.api.news/clients/edit_client/", clients).success(function (data) {
            console.log(clients);
            $scope.id = "";
            $scope.username = "";
            $scope.domain = "";
            $scope.password = "";
            $scope.rc = "";
            $scope.email = "";
            $scope.mf = "";
            $scope.phone = "";
            $scope.adress = "";
            $scope.fax = "";

            $("#alert").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Succes!</strong>Opération réussie</div>');
            $http.get("http://local.dev/rest.api.news/clients.json").success(function (response) {
                console.log(response);
                $scope.users = response;
            });
            $('#confirmModal').modal('hide');

        });
    };

    $scope.editClient = function (id) {
        $('#confirmModal').modal('show');

        $http.get("http://local.dev/rest.api.news/clients/edit_client/" + id).success(function (data) {
            console.log(data);
            $scope.id = data.Client.id;
            $scope.username = data.Client.username;
            $scope.domain = data.Domain.name;
            $scope.rc = data.Client.rc;
            $scope.password = data.Client.password;
            $scope.mf = data.Client.mf;
            $scope.fax = data.Client.fax;
            $scope.phone = data.Client.phone;
            $scope.adress = data.Client.adress;
            $scope.email = data.Client.email;
        });
    };
    $scope.delete_Client = function (id) {
        $('#deleteModal').modal('show');
        $scope.deleteF = function () {
            //if (r === true) {
            $http.delete("http://local.dev/rest.api.news/clients/delete_client/" + id).success(function (data) {
                $http.get("http://local.dev/rest.api.news/clients.json").success(function (response) {
                    $scope.users = response;
                });
            });
            $('#deleteModal').modal('hide');

            //}
        }

    };

}
app.controller("AdminsController", AdminsController);
function AdminsController($scope, $http, $location) {
    $http.get("http://local.dev/rest.api.news/admins.json").success(function (response) {
        $scope.admins = response;
    });

    $scope.createR = function () {
        $('#confModal').modal('show');
    };



    $scope.submit = function () {
        var admins = {};
        if ($scope.id) {
            admins = {
                "id": $scope.id,
                "username": $scope.username,
                "password": $scope.password,
                "email": $scope.email,
                "role": $scope.role

            };
        } else {
            admins = {
                "username": $scope.username,
                "password": $scope.password,
                "email": $scope.email,
                "role": $scope.role

            };
        }
        $http.post("http://local.dev/rest.api.news/Admins/edit/", admins).success(function (data) {
            console.log(admins);
            $scope.username = "";
            $scope.password = "";
            $scope.email = "";
            $scope.role = "";



            $("#alert").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Succes!</strong>Opération réussie</div>');
            $http.get("http://local.dev/rest.api.news/admins.json").success(function (response) {
                console.log(response);
                $scope.admins = response;
            });
            $('#confirmModal').modal('hide');

        });
    };

    $scope.edit = function (id) {
        $('#confModal').modal('show');

        $http.get("http://local.dev/rest.api.news/Admins/edit/" + id).success(function (data) {
            console.log(data);
            $scope.id = data.Admin.id;
            $scope.username = data.Admin.username;
            $scope.password = data.Admin.password;
            $scope.email = data.Admin.email;
            $scope.role = data.Admin.role;
        });
    };
    $scope.delete = function (id) {
        $('#deleteModal').modal('show');
        $scope.deleteR = function () {
            //if (r === true) {
            $http.delete("http://local.dev/rest.api.news/Admins/delete/" + id).success(function (data) {
                $http.get("http://local.dev/rest.api.news/admins.json").success(function (response) {
                    $scope.admins = response;
                });
            });
            $('#deleteModal').modal('hide');

            //}
        }

    };
}
app.config(function ($routeProvider) {
    $routeProvider
            .when('/', {templateUrl: currentUrl(root) + 'pages/home.php'})
            .when('/client', {
                templateUrl: currentUrl(root) + 'pages/client.php',
                controller: 'ClientsController'
            })
            .when('/faq', {templateUrl: currentUrl(root) + 'pages/faq.php'})
            .when('/Client', {templateUrl: currentUrl(root) + 'pages/client.php#/Client'})
            .when('/Responsable', {templateUrl: currentUrl(root) + 'pages/client.php#/Responsable'})
            .when('/admin', {templateUrl: currentUrl(root) + 'pages/admin.php'})
            .otherwise({redirectTo: '/'});

});

app.controller("FaqsController", FaqsController);
function FaqsController($scope, $http, $location) {
    $http.get("http://local.dev/rest.api.news/faqs.json").success(function (response) {
        $scope.faqs = response;
        console.log(response);
    });

    $scope.create = function () {
        $('#confirmModal').modal('show');
    };

    $scope.submit = function () {
        var faqs = {};
        if ($scope.id) {
            faqs = {
                "id": $scope.id,
                "question": $scope.question,
                "reponse": $scope.reponse
            };
        } else {
            faqs = {
                "question": $scope.question,
                "reponse": $scope.reponse

            };
        }
        $http.post("http://local.dev/rest.api.news/faqs/edit/", faqs).success(function (data) {
            console.log(faqs);
            $scope.id = "";
            $scope.question = "";
            $scope.reponse = "";


            //$("#alert").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Succes!</strong>Opération réussie</div>');
            $http.get("http://local.dev/rest.api.news/faqs.json").success(function (response) {
                console.log(response);
                $scope.faqs = response;
            });
            $('#confirmModal').modal('hide');

        });
    };
    $scope.edit = function (id) {
        $('#confirmModal').modal('show');

        $http.get("http://local.dev/rest.api.news/faqs/edit/" + id).success(function (data) {
            $scope.id = data.Faq.id;
            $scope.question = data.Faq.question;
            $scope.reponse = data.Faq.reponse;

        });
    };
    $scope.delete = function (id) {
        $('#deleteModal').modal('show');
        $scope.deleteFaq = function () {
            //if (r === true) {
            $http.delete("http://local.dev/rest.api.news/faqs/delete/" + id).success(function (data) {
                $http.get("http://local.dev/rest.api.news/faqs.json").success(function (response) {
                    $scope.faqs = response;
                });
            });
            $('#deleteModal').modal('hide');

            //}
        }

    };
}