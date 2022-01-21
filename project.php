<!-- this file contains the source code for project page -->

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

    <title>PyProjects | Home</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php
    $pgname = "project";
    include("header.php");
    ?>

    <!-- CONTENT -->
    <div style="margin-top: 7.5rem;">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "pyproject";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Sorry::" . mysqli_connect_error());
        }
        $GOTO = $_GET['Pyid']; //get method is used to get Pyid from the web address

        $sql = "SELECT * FROM `projects` where Pyid = $GOTO"; //query is used to select the data from projects table where Pyid is same as given

        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result); //data will be fatched from the projects table
        $ID = $row['Pyid'];
        $replaced = str_replace(" ", "+", $row['Title']);
        //$Search_Tags = $row['Hashtag1']."+".$row['Hashtag2']."+".$row['Hashtag3'];
        $Search_Tags = "How+to+Make+" . $replaced . "+with+Python"; //for scraping the video

        ?>
        <div class="row justify-content-center project">
            <div class="col-md-4 col-sm-12 text-center">
                <div class="justify-content-center">
                    <!-- image will be displayed for the perticular project -->
                    <img src=" <?php echo $row['IMAGE']; ?>" class="img-fluid img-project-thumbnail" alt="..." width="500rem">
                </div>
                <div class="row">
                    <div class="col">
                          <!-- hashtags will be displayed for the perticular project -->
                        <a href="#" class="link-secondary link-deco">#<?php echo $row['Hashtag1']; ?></a>
                        <a href="#" class="link-secondary link-deco">#<?php echo $row['Hashtag2']; ?></a>
                        <a href="#" class="link-secondary link-deco">#<?php echo $row['Hashtag3']; ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                  <!-- Title will be displayed for the perticular project -->
                <h3 style="font-size: 2.5rem;"><?php echo $row['Title']; ?></h3>
                <p class="text-muted">
                      <!-- Description will be displayed for the perticular project -->
                    <b><?php echo nl2br($row['Description']); ?></b>
                </p>
                <a class="btn btn-dark" href="<?php echo $row['DownloadLink']; ?>" target="_blank" role="button">Download Project</a>
                <?php
                $pyout = passthru('python Webscarpping.py ' . $ID . ' ' . $Search_Tags);
                echo $pyout;
                ?>
                <a class="btn btn-dark" href="<?php echo $row['VideoLink'];?>" target="_blank" role="button">Video Reference</a>
                <form method="post" class="form-btn">

                    <button type="submit" id="change" name="button<?php echo $GOTO; ?>" class="btn btn-success ">Add Bookmark</button>

                </form>
            </div>
        </div>
    </div>

    <?php
                include 'dbcon.php';
                if (isset($_POST['button' . $GOTO]))  // will check whether submit button is clicked or not
                {
                    if(isset($_SESSION['email'])) // will check whether user is logged in or not
                    {
                    
                        $bookmarkquery = "SELECT * FROM bookmark WHERE email = '" . $_SESSION['email'] . "' AND project_id='" . $GOTO . "'";
                        //query will check whether bookmark is alreday added or not
                        $query_for_bookmark = mysqli_query($con, $bookmarkquery);
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
                    }
                    else
                    {
                        ?>
                        <script>
                            alert("Kindly Login to Use this functionality"); //massage will be displayed if user is not logged in
                        </script>

        <?php
                    }
                   
                }
            


        ?>
    <!-- FOOTER -->
    <footer class="my-4">
        <hr class="dropdown-divider ">
        <p class="text-center text-muted ">© 2021 PyProjects, Inc</p>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js " integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ " crossorigin="anonymous "></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js " integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js " integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/ " crossorigin="anonymous "></script>
    -->
</body>

</html>