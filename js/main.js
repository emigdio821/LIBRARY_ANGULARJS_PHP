var app = angular.module('myApp', ['ngRoute']); 

app.config(function($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl : 'view/home.html',
            controller  : 'home'
        })
        .when('/books', {
            templateUrl : 'view/books.html',
            controller  : 'books'
        })
});