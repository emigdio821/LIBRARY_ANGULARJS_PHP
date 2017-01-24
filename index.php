<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Library</title>

    <!-- AngularJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.6.1/angular-route.min.js"></script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <!-- Main JS file -->
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <!-- Material Design icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>

<body ng-app="myApp">
    <div>
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper teal darken-2">
                    <a href="#" class="brand-logo tooltipped right" data-delay="50" data-position="left" data-tooltip="The Library"><i class="large material-icons">book</i></a>
                    <ul id="mobile-demo" class="left">
                        <li id="nav_home"><a href="#">Home</a></li>
                        <li id="nav_books"><a href="#!books">Books</a></li>
                        <li id="nav_categories"><a href="#">Categories</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Main Container -->
        <div id="main">
            <div ng-view></div>
        </div>
    </div>
</body>

</html>