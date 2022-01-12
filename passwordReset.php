<!-- this file contains the source code for reset password functionality -->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/favicon-32x32.png" type="image/x-icon">

    <!-- Bootstrap CSS / Extra CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>PyProjects | About Us</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php
    $pgname = "join";
    include("header.php");
    ?>

    <!-- CONTENT -->
    <form action="" method="POST" class="justify-item-center text-center">
        <div class="card shadow-lg p-3" style="max-width: 400px ;margin-top: 6rem;">
            <div class="card-body">
                <h4 class="mb-3">Reset Password</h4>
                <hr class="hr-bold-purple">
                <div class="mb-3">
                    <input type="password" name="pass" class="form-control" id="exampleFormControlInput1" placeholder="Enter New Password">
                </div>
                <div class="mb-3">
                    <input type="password" name="cpass" class="form-control" id="exampleFormControlInput1" placeholder="Confirm New Password">
                </div>
                <div class="mb-3">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
                <!-- <div class="mb-3"><a href="./forgotPassword.php" class="link-primary link-deco-btn">Forgot Password</a></div>
                <p>Don't Have an Account? <a href="./joinUs.php" class="card-link">Sign Up</a></p> -->
            </div>
        </div>
    </form>
    <!-- FOOTER -->
    <footer class="my-4 footer-bottom">
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

<?php

include 'dbcon.php';
if (isset($_POST['submit'])) //will check whether submit button is clicked or not
{
    $token = $_GET['token']; //GET method is used to get token from the web address

    $pass = $_POST['pass']; // user entered new password will be stored into $pass variable
    $cpass = $_POST['cpass'];
    $hash = password_hash($pass, PASSWORD_BCRYPT); //this will encrypt the user entered password
    $chash = password_hash($cpass, PASSWORD_BCRYPT); //this will encrypt the user entered confirm password

    if ($pass === $cpass) //this will check whether pass and cpass are equal or not
    {
        $updatequery = "UPDATE joinus SET pass='$hash' WHERE token='$token'";
        //this query is used to update the password for the user which have specific $token

        $query = mysqli_query($con, $updatequery);

        if ($query) //this will check whether query run successfully or not

        {
?>
            <script>
                alert('password changed successfully'); //massage will be displayed if password updated suucessfully
                location.replace("signIn.php");
            </script>

        <?php


        }
    } else {

        ?>
        <script>
            alert('password and confirm password not match'); //this massage will be displayed if pass and cpass not match
        </script>

<?php
    }
}
?>


</html>