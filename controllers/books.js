angular.module('myApp').controller('books', ['$scope', '$http', function($scope, $http){
    $(document).ready(function() {
        // initialize modal
		$(".button-collapse").sideNav();
        $('.modal').modal();
    });

    $scope.showCreateForm = function() {
        $scope.clearForm();
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
    }

    $scope.createBook = function() {
    	debugger;
    	var checkImg = $scope.image;
    	if (!checkImg) {
    		checkImg = 'http://www.color-hex.com/palettes/3712.png';
    	}
        $http.post('create_book.php', {
            'name': $scope.name,
            'description': $scope.description,
            'author': $scope.author,
            'category': $scope.category,
            'img': checkImg,
        }).then(function successCallback(response) {
            Materialize.toast(response.data, 3000);
            $('#modal-book-form').modal('close');
            $scope.clearForm();
            $scope.getAll();
        }, function errorCallback(response) {
            Materialize.toast(response.message, 3000);
        });
    }

    $scope.getAll = function() {
        $http.get("read_books.php").then(function successCallback(response) {
            $scope.books = response.data;
            console.log('Records retrieved succesfully, number of records: ' + response.data.length);
        }, function errorCallback(response) {
            Materialize.toast(response.message, 3000);
        });
    }

    // retrieve record to fill out the form
    $scope.readOne = function(id) {
        $('#modal-book-title').text("Edit Book");
        $('#btn-update-book').show();
        $('#btn-create-book').hide();

        $http.post('read_details.php', {
            'id': id
        }).then(function successCallback(response) {
            $('#modal-book-form').modal('open');
            $scope.id = response.data[0]["id"];
            $scope.name = response.data[0]["name"];
            $scope.description = response.data[0]["description"];
            $scope.author = response.data[0]["author"];
            $scope.category = response.data[0]["category"];
        }, function errorCallback(response) {
            Materialize.toast('Unable to retrieve book details.', 3000);
        });
    }

    // update book / save changes
    $scope.updateBook = function() {
        $http.post('update_book.php', {
            'id': $scope.id,
            'name': $scope.name,
            'description': $scope.description,
            'author': $scope.author,
            'category': $scope.category
        }).then(function successCallback(response) {
            Materialize.toast(response.data, 3000);
            $('#modal-book-form').modal('close');
            $scope.clearForm();
            $scope.getAll();
        });
    }

    // delete book
    $scope.deleteBook = function(id) {
        $http.post('delete_book.php', {
            'id': id
        }).then(function successCallback(response) {
            Materialize.toast(response.data, 3000);
            $scope.getAll();
        });
    }
}]);