var app = angular.module('myApp', ['ngRoute']);
app.config(function($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'view/home.html',
            controller: 'homeCtrl'
        })
        .when('/books', {
            templateUrl: 'view/books.html',
            controller: 'booksCtrl'
        })
        .when('/categories', {
            templateUrl: 'view/categories.html',
            controller: 'categoriesCtrl'
        })
});
app.controller('homeCtrl', function($scope, $http) {
    //initialize control
});

app.controller('categoriesCtrl', function($scope, $http) {
    $scope.getCategories = function() {
        $http.get("php_actions/get_categories.php").then(function successCallback(response) {
            $scope.categories = response.data;
        }, function errorCallback(response) {
            Materialize.toast(response.message, 1500);
        });
    }
});

app.controller('booksCtrl', function($scope, $http) {
    $(document).ready(function() {
        // initialize modal
        $(".button-collapse").sideNav();
        $('.modal').modal();
    });

    $scope.checkUrlImg = function() {
        var checkImg = $scope.image;
        if (!checkImg) {
            checkImg = 'https://s-media-cache-ak0.pinimg.com/736x/9d/25/8c/9d258cb09c821961e092b9b459399d9e.jpg';
        }
        return checkImg;
    }

    $scope.showCreateForm = function() {
        $scope.clearForm();
        Materialize.updateTextFields();
        $('#modal-book-title').text("Create Book");
        $('#btn-update-book').hide();
        $('#btn-create-book').show();
        $('#modal-book-form').modal('open');
    }

    // clear variable / form values
    $scope.clearForm = function() {
        $scope.id = "";
        $scope.name = "";
        $scope.description = "";
        $scope.author = "";
        $scope.category = "";
        $scope.description = "";
        $scope.image = "";
    }

    $scope.createBook = function() {
        if ($scope.booksForm.$valid) {
            var checkImg = $scope.checkUrlImg();
            $http.post('php_actions/create_book.php', {
                'name': $scope.name,
                'description': $scope.description,
                'author': $scope.author,
                'category': $scope.category,
                'img': checkImg,
                'borrowed': 'Available' //always a new book should be available
            }).then(function successCallback(response) {
                Materialize.toast(response.data, 1500);
                $('#modal-book-form').modal('close');
                $scope.clearForm();
                Materialize.updateTextFields();
                $scope.getAll();
            }, function errorCallback(response) {
                Materialize.toast(response.message, 1500);
            });
        }
    }

    $scope.getAll = function() {
        $http.get("php_actions/read_books.php").then(function successCallback(response) {
            $scope.books = response.data;
            console.log('Records retrieved succesfully, number of records: ' + response.data.length);
        }, function errorCallback(response) {
            Materialize.toast(response.message, 1500);
        });
    }

    // retrieve record to fill out the form
    $scope.readOne = function(id) {
        $('#modal-book-title').text("Edit Book");
        $('#btn-update-book').show();
        $('#btn-create-book').hide();

        $http.post('php_actions/read_details.php', {
            'id': id
        }).then(function successCallback(response) {
            $('#modal-book-form').modal('open');
            Materialize.updateTextFields();
            $scope.id = response.data[0]["id"];
            $scope.name = response.data[0]["name"];
            $scope.description = response.data[0]["description"];
            $scope.author = response.data[0]["author"];
            $scope.category = response.data[0]["category"];
            $scope.image = response.data[0]["img"];
        }, function errorCallback(response) {
            Materialize.toast('Unable to retrieve book details.', 1500);
        });
    }

    // update book / save changes
    $scope.updateBook = function() {
        if ($scope.booksForm.$valid) {
            var checkImg = $scope.checkUrlImg();
            $http.post('php_actions/update_book.php', {
                'id': $scope.id,
                'name': $scope.name,
                'description': $scope.description,
                'author': $scope.author,
                'category': $scope.category,
                'img': checkImg
            }).then(function successCallback(response) {
                Materialize.toast(response.data, 1500);
                $('#modal-book-form').modal('close');
                $scope.clearForm();
                $scope.getAll();
            });
        }
    }

    // delete book
    $scope.deleteBook = function(id) {
        $http.post('php_actions/delete_book.php', {
            'id': id
        }).then(function successCallback(response) {
            Materialize.toast(response.data, 1500);
            $scope.getAll();
        });
    }

    // borrow modal

    $scope.openBorrowModal = function(id, name) {
        Materialize.updateTextFields();
        $http.post('php_actions/read_details.php', {
            'id': id
        }).then(function successCallback(response) {
            $('#modal-borrow-form').modal('open');
            $scope.id = response.data[0]["id"];
            $scope.borrowed = response.data[0]["borrowed"];
            $scope.borrow_user = response.data[0]["user"];
        }, function errorCallback(response) {
            Materialize.toast('Unable to retrieve book details.', 1500);
        });
    }

    $scope.borrowBook = function(checked, isInvalid) {
        var borrowedStatus;
        var user;
        if (!checked) {
            borrowedStatus = 'Available';
            user = '';
            makeCall(borrowedStatus, user);
            Materialize.toast('Book is avaialable now', 1500);
        } else if (checked && !isInvalid) {
            borrowedStatus = 'Unavailable';
            user = $scope.borrow_user;
            makeCall(borrowedStatus, user);
            Materialize.toast('Book has been borrowed to ' + user, 1500);
        } else {
            Materialize.toast('Please check the form before submit.', 1500);
        }

        function makeCall(borrowedStatus, user) {
            $http.post('php_actions/borrow_book.php', {
                'id': $scope.id,
                'borrowed': borrowedStatus,
                'user': user
            }).then(function successCallback(response) {
                Materialize.toast(response.data, 1500);
                $('#modal-borrow-form').modal('close');
                $scope.clearForm();
                Materialize.updateTextFields();
                $scope.getAll();
            }, function errorCallback(response) {
                Materialize.toast('Unable to retrieve book details.', 1500);
            });
        }
    }
});