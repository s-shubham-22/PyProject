<!-- this page contains source code for the Home page -->


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/favicon-32x32.png" type="image/x-icon">

    <!-- Bootstrap CSS / Extra CSS -->
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>PyProjects | Home</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php
    $pgname = "home";
    include("header.php");
    ?>

    <!-- CAROUSEL -->
    <div id="carouselExample" class="carousel carousel-light slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner carousel-margin">
            <div class="carousel-item active" data-bs-interval="2000">
                <img src="./images/carousel/Carousel_1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="./images/carousel/Carousel_2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="./images/carousel/Carousel_3.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- JUMBOTRON / ILLUSTRATION -->
    <div class="row align-items-md-stretch">
        <?php
        if (!isset($_SESSION['fname'])) //it will exicute if user not logged in
         {
        ?>
            <div class="col-md-6">
                <div class="h-100 p-5 text-white bg-dark rounded-3">
                    <h2 class="text-center">Join Us Now</h2>
                    <img src="./images/android-chrome-192x192.png" class="img-thumbnail mx-auto d-block" alt="https://source.unsplash.com/192x192/?tech"><br>
                    <div class="d-flex justify-content-center">
                        <a href="./joinUs.php" class="link-light link-deco-btn"><button type="button" class="btn btn-outline-primary btn-lg btn-margin">Join Us</button></a>
                        <a href="./signIn.php" class="link-light link-deco-btn"><button type="button" class="btn btn-primary btn-lg btn-margin">Sign In</button></a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="<?php if (!isset($_SESSION['fname'])) //this will display the name of the logged in user
        {
                        echo 'col-md-6';
                    } else {
                        echo 'col-md-12';
                    } ?>">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h2>Head Start your Python Carrier with PyProjects</h2>
                <p class="intro-content">Here you'll get a platform to get introduce and learn different Python projects with different concepts. It includes all the documents and references. So what are you waiting for...?!</p>
                <div class="d-flex justify-content-center">

                    <a href="./projectList.php" class="link-light link-deco-btn"><button type="button" class="btn btn-success btn-lg" style="margin-top: 1rem;">Let's Learn!</button></a>
                </div>
            </div>
        </div>
    </div>

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