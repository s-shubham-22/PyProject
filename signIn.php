<!-- this file contains the source code for sign in page -->

<?php

session_start(); //this function is used to start the session
?>
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
    <form style="margin-top: 6rem;" action = "<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post" class="justify-item-center text-center">
        <div class="card shadow-lg p-3" style="max-width: 400px;">
            <div class="card-body">
                <h4 class="mb-3">Sign In to Continue!</h4>
                <hr class="hr-bold-purple">
                <div class="mb-3">
                    <input type="email" name = "email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Email">
                </div>
                <div class="mb-3">
                    <input type="password" name = "password" class="form-control" id="exampleFormControlInput1" placeholder="Enter Password">
                </div>
                <div class="mb-3">
                    <button type="submit" name = "submit" class="btn btn-primary btn-lg">Sign In!</button>
                </div>
                <div class="mb-3"><a href="forgotPassword.php" class="link-primary link-deco-btn">Forgot Password</a></div>
                <p>Don't Have an Account? <a href="./joinUs.php" class="card-link">Sign Up</a></p>
            </div>
        </div>
    </form>
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

<?php
include 'dbcon.php';
if(isset($_POST['submit'])) //will check whether submit button is clicked or not
{
  
    $email=$_POST['email']; //user entered email will be stored in $email
    $password=$_POST['password']; //user entered password will be stored in $password
    $emailquery = "SELECT * FROM joinus WHERE email = '$email'";
    //query is used to select data from joinus table where email is equal to user entered email
    $query_for_mail = mysqli_query($con,$emailquery);
$email_count = mysqli_num_rows($query_for_mail); //this will count no of rows which have user entered email id
if($email_count) //if user already exist
{
    $email_pass = mysqli_fetch_assoc($query_for_mail);
    $pass_in_db=$email_pass['pass'];
    $_SESSION['fname']=$email_pass['fname'];
    $_SESSION['email']=$email_pass['email'];
    $pass_decode = password_verify($password,$pass_in_db); //it will verify the entered password and the record password
    if($pass_decode)
    {
        ?>
    <script>    
        alert('login successful'); //if username and password is correct then user will logged in successfully
        location.replace("index.php");
    </script>

    <?php
    }
    else{
        ?>
        <script>    
            alert('password not matching'); //massage will be displayed if password is not matching with the records
        </script>
    
        <?php
    }
}
else{
    ?>
    <script>    
        alert('user not exist with this mail');
    </script>

    <?php

}
}
?>