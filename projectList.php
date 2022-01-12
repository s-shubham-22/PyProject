<!-- this page contains the source code for project List page -->

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
            $Filter = $_GET['Category']; //get method is used to fetch catagory from the web address
            $sql = "SELECT * FROM `projects` where Hashtag1=$Filter OR Hashtag2=$Filter OR Hashtag3=$Filter OR Category=$Filter";
            //this query will run if filter is applied by the user
    ?>
            <center>
                <h1 class="card-title" style="font-size: 3rem;">
                    Category : <?php echo $Filter; ?>
                </h1>
                <hr>
            </center>
    <?php
        } else {
            $sql = "SELECT * FROM `projects`";  //this query will run if filter is not applied by the user
        }

        $result = mysqli_query($conn, $sql);


        $num = mysqli_num_rows($result); //the $num variable contains num of  rows of projects table

        if ($num > 0) {
            while ($num--) //loop is used to display all the projects on the website
            {
                $row = mysqli_fetch_assoc($result);
            ?>
                <div class="cards-margin">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <!-- image will be displayed for the perticular project -->
                                <img src="<?php echo $row['IMAGE']; ?>" class="img-fluid rounded-start" style="max-height: 18rem; margin: auto;" alt="...">
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <!-- Title will be displayed for the perticular project -->
                                    <h4 class="card-title" style="font-size: 2rem;"><?php echo $row['Title']; ?></h4>
                                    <!-- hashtags will be displayed for the perticular project -->
                                    <a href="#" class="link-secondary link-deco">#<?php echo $row['Hashtag1']; ?></a>
                                    <a href="#" class="link-secondary link-deco">#<?php echo $row['Hashtag2']; ?></a>
                                    <a href="#" class="link-secondary link-deco">#<?php echo $row['Hashtag3']; ?></a>
                                    <?php echo "<br>" ?>
                                    <?php echo "<br>" ?>
                                    <?php
                                    $GOTO = $row['Pyid'];
                                    $title = $row['Title'];
                                    $link = './project.php?Pyid=' . $GOTO; //this link will redirect to specific project page
                                    ?>
                                    <div>
                                        <a href=<?php echo $link; ?> class="btn btn-primary">Go to Project</a>
                                        <form method="post" class="form-btn">
                                            <button type="submit" id="change" name="button<?php echo $GOTO; ?>" class="btn btn-success">Add Bookmark</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                include 'dbcon.php';
                if (isset($_POST['button' . $GOTO])) // will check whether submit button is clicked or not
                {
                    if (isset($_SESSION['email'])) // will check whether user is logged in or not
                    {


                        $bookmarkquery = "SELECT * FROM bookmark WHERE email = '" . $_SESSION['email'] . "' AND project_id='" . $GOTO . "'";
                        $query_for_bookmark = mysqli_query($con, $bookmarkquery);
                        //query will check whether bookmark is alreday added or not
                        $bookmark_count = mysqli_num_rows($query_for_bookmark);
                        if ($bookmark_count > 0) {
                ?>
                            <script>
                                alert("Bookmark already Exist!"); //massage will be displayed if project is already bookmarked
                            </script>

                        <?php
                        } else {
                            $updatequery = "INSERT INTO bookmark(email,project_id) VALUES ('" . $_SESSION['email'] . "','$GOTO')";
                            //this query will store the project id for which the bookmark button is clicked
                            $query = mysqli_query($con, $updatequery);
                        }
                    } else {
                        ?>
                        <script>
                            alert("Kindly Login to Use this functionality"); //massage will be displayed if user is not logged in
                        </script>

        <?php
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