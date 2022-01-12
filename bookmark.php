<!-- this file contains the source code for bookmark functionality -->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/favicon-32x32.png" type="image/x-icon">

    <!-- Bootstrap CSS / Extra CSS -->
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


    <title>PyProjects | Projects</title>

</head>

<body>
    <!-- NAVBAR -->
    <?php
    $pgname = "project";
    include("header.php");
    ?>

    <!-- CONTENT -->

    <div class="row" style="margin-top: 6.5rem">

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "pyproject";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Sorry::" . mysqli_connect_error());
        }


        if (isset($_GET['Category'])) {
            $Filter = $_GET['Category'];
            $sql = "SELECT * FROM `projects` where Hashtag1=$Filter OR Hashtag2=$Filter OR Hashtag3=$Filter OR Category=$Filter";
        } else {
        }
        $sql = "SELECT * FROM `projects`";
        $bsql = "SELECT * FROM `bookmark` ";

        $bresult =  mysqli_query($conn, $bsql);
        $result = mysqli_query($conn, $sql);
        // echo mysqli_num_rows($result);

        $bnum = mysqli_num_rows($bresult);
        $num = mysqli_num_rows($result);


        if ($bnum > 0) {
            for ($x = 1; $x <= $bnum; $x++) {


                mysqli_data_seek($result, 0);
                $brow = mysqli_fetch_assoc($bresult);
                for ($y = 1; $y <= $num; $y++) {

                    $row = mysqli_fetch_assoc($result);

                    if (isset($brow['project_id']) && isset($row['Pyid'])) {
                        @session_start();

                        if (($brow['project_id'] == $row['Pyid']) && ($brow['email'] == $_SESSION['email'])) {


        ?>
                            <div class="cards-margin">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-2 text-center">
                                            <img src="<?php echo $row['IMAGE']; ?>" class="img-fluid rounded-start" style="max-height: 18rem; margin: auto;" alt="...">
                                        </div>
                                        <div class="col">
                                            <div class="card-body">
                                                <h4 class="card-title"><?php echo $row['Title']; ?></h4>
                                                <a href="#" class="link-secondary link-deco">#<?php echo $row['Hashtag1']; ?></a>
                                                <a href="#" class="link-secondary link-deco">#<?php echo $row['Hashtag2']; ?></a>
                                                <a href="#" class="link-secondary link-deco">#<?php echo $row['Hashtag3']; ?></a>
                                                <?php echo "<br>" ?>
                                                <?php echo "<br>" ?>
                                                <?php
                                                $GOTO = $row['Pyid'];
                                                $title = $row['Title'];
                                                echo '<a href="./project.php?Pyid=' . $GOTO . '" class="btn btn-primary">Go to Project</a>';
                                                ?>
                                                <form method="post" class="form-btn">

                                                    <button type="submit" id="change" name="button<?php echo $GOTO; ?>" class="btn btn-success">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            include 'dbcon.php';
                            if (isset($_POST['button' . $GOTO])) {
                                @session_start();

                                $updatequery = "DELETE FROM bookmark WHERE email='" . $_SESSION['email'] . "' AND project_id='" . $GOTO . "'";

                                $query = mysqli_query($con, $updatequery);
                                if ($query) {   ?>
                                    <script>
                                        location.replace("bookmark.php");
                                    </script>
        <?php
                                }
                            }
                        }
                    }
                }
            }
        }


        ?>



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