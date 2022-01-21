<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/favicon-32x32.png" type="image/x-icon">

    <!-- Bootstrap CSS / Extra CSS -->
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>PyProjects | About Us</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php
    $pgname = "about";
    include("header.php");
    ?>


    <!-- CONTENT -->
    <img src="./extraImages/cola.png" class="img-fluid" alt="..." style="margin-top: 6.5rem;">
    <div class="row" style="font-family: 'Poppins', sans-serif;">
        <div class="col-md-6 col-sm-12 cards-margin">
            <div class="card">
                <div class="row">
                    <div class="col-md-4 col-sm-6 text-center">
                        <img src="./images/android-chrome-512x512.png" class="img-fluid rounded-start" alt="..." style="width: 180px;">
                    </div>
                    <div class="col-md-8 col-sm-6">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: 600; font-size: 2.1rem;">->>Introduction</h5>
                            <p class="card-text">It’s the website that provides different python projects with materials. Users can go through different python projects with stepwise instructions and video references. They will get multiple projects which are segregated in different categories like based on module or concept used, based on difficulty level, etc, with relevant documentation and will also be able to access source code and references.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 cards-margin">
            <div class="card">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <img src="./images/dev2.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8 col-sm-6">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: 600; font-size: 2.1rem;">->>Developers</h5>
                            <p class="card-text">-> 20CE123 SHUBHAM SERALIYA</p>
                            <p class="card-text">-> 20CE126 HARDI SHAH</p>
                            <p class="card-text">-> 20CE129 KALPIT SHAH</p>
                            <p class="card-text">-> 20CE132 NISARG SHAH</p>
                            <p class="card-text">-> 20CE133 PRACHI SHAH</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <center> <!-- it will redirect to feedback page onclick -->
    <a href=./Feedback.php class="btn btn-primary">Feedback Section</a> 
    </center>
    <hr>

    <!-- FOOTER -->
    <footer class="my-4">
        <hr class="dropdown-divider">
        <p class="text-center text-muted">© 2021 PyProjects, Inc</p>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>

</html>