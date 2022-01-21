<!-- this file contains the source code for forgot password page-->

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
     <form action = "<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post" class="justify-item-center text-center">
        <div class="card shadow-lg p-3" style="max-width: 400px ;margin-top: 6rem;">
            <div class="card-body">
                <h4 class="mb-3">Enter Your Email ID</h4>
                <hr class="hr-bold-purple">
                <p class="text-center text-muted">Password Reset Link will be sent to your Email</p>
                <div class="mb-3">
                    <input type="email" name="email"class="form-control" id="exampleFormControlInput1" placeholder="Enter Email">
                </div>
                <div class="mb-3">
                    <button name="submit" type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
                <!-- <div class="mb-3"><a href="#" class="link-primary link-deco-btn">Forgot Password</a></div>
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
if(isset($_POST['submit']))  //will check whether submit button is clicked or not
{
    $email = $_POST['email'];   //user entered email will be stored in $email
    $emailquery = "SELECT * FROM joinus WHERE email = '$email'"; // this query collect the data of rows which contains user entered email address
    $query_for_mail = mysqli_query($con,$emailquery);
$email_count = mysqli_num_rows($query_for_mail); //this will count no of rows of the table which contains user entered email

if($email_count) //if email exist in the database then password recovery link will be sended to the user via mail
{   $user = mysqli_fetch_assoc($query_for_mail);
    $token = $user['token']; //$token contains the unique token of the user
    $link ="http://localhost/Website/passwordReset.php?token=$token"; //this link will be shared to user via mail
    ?>
    <script>    
        alert('email sent successfully'); // massage will be displayed if email sent successfully
        location.replace("signIn.php"); //this will redirect user to sign In page
    </script>

    <?php
    require 'PHPMailerAutoload.php';
require 'idpass.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'PyProjects');
$mail->addAddress($email);     // Add a recipient
       // Name is optional
$mail->addReplyTo(EMAIL);
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('C:\xampp\htdocs\kalpit\Web Development Group 32\Web2\images\carousel\3.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Password Reset'; //this is the subject of the email
$mail->Body    = 'hi '.$user['fname'].' '.$user['lname'].' <br><a href="'.strval($link).'">click here to reset your password';
$mail->AltBody = 'Click to reset the Password';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
   
    
}
}
else{
    ?>
    <script>    
        alert('user not exist with this mail'); //this message will be displayed if there is no such user with the entered email
    </script>

    <?php

}
}

?>