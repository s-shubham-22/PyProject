<!-- this file contains the source code for FAQs page / functionality -->

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

    <title>PyProjects | Home</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php
    $pgname = "faq";
    include("header.php");
    ?>

    <!-- USER QUESTION FORM -->
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="justify-item-center text-center" style="margin-top: 5.5rem;">
        <div class="card shadow-lg p-3" style="max-width: 700px;">
            <div class="card-body">
                <h4 class="mb-3">Ask Your Questions Here!</h4>
                <hr class="hr-bold-purple">
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Email">
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6 col-sm-12">
                        <input type="fname" name="fname" class="form-control" id="exampleFormControlInput1" placeholder="First Name">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <input type="lname" name="lname" class="form-control" id="exampleFormControlInput1" placeholder="Last Name">
                    </div>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="question" id="exampleFormControlTextarea1" rows="2" placeholder="Enter Your Question"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </div>
        </div>
    </form>

    <!-- CONTENT -->
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pyproject";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Sorry::" . mysqli_connect_error());
    } else {
        $sql = "SELECT * FROM `faqs`";   //this query will collect all the information from faqs table     

        $result = mysqli_query($conn, $sql);
        // echo mysqli_num_rows($result);

        $num = mysqli_num_rows($result); // num of rows in the faqs table will be stored in $num variable

        if ($num > 0) {
    ?>
            <!-- <?php $que = mysqli_fetch_assoc($result); ?> fatched data will be stored in $que variable -->

            <div class="row">
                <div class="accordion accordion-flush shadow p-3 col-md-6 col-sm-12" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <?php echo $que['Question']; ?>
                                <!--this will display the quesion on the website -->
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <b>
                                    Answer::<?php echo $que['Answer']; ?>
                                    <!--this display show the answer of the question on the website -->
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $que = mysqli_fetch_assoc($result); ?>
                <div class="accordion accordion-flush shadow p-3 col-md-6 col-sm-12" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <?php echo $que['Question']; ?>
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"><b>
                                    Answer::<?php echo $que['Answer']; ?>
                                </b> </div>
                        </div>
                    </div>
                </div>
                <?php $que = mysqli_fetch_assoc($result); ?>
                <div class="accordion accordion-flush shadow p-3 col-md-6 col-sm-12" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <?php echo $que['Question']; ?>
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"><b>
                                    Answer::<?php echo $que['Answer']; ?>
                                </b> </div>
                        </div>
                    </div>
                </div>
                <?php $que = mysqli_fetch_assoc($result); ?>
                <div class="accordion accordion-flush shadow p-3 col-md-6 col-sm-12" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                <?php echo $que['Question']; ?>
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"><b>
                                    Answer::<?php echo $que['Answer']; ?>
                                </b> </div>
                        </div>
                    </div>
                </div>
                <?php $que = mysqli_fetch_assoc($result); ?>
                <div class="accordion accordion-flush shadow p-3 col-md-6 col-sm-12" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                <?php echo $que['Question']; ?>
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"><b>
                                    Answer::<?php echo $que['Answer']; ?>
                                </b> </div>
                        </div>
                    </div>
                </div>
                <?php $que = mysqli_fetch_assoc($result); ?>
                <div class="accordion accordion-flush shadow p-3 col-md-6 col-sm-12" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                <?php echo $que['Question']; ?>
                            </button>
                        </h2>
                        <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headFiveSix" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"><b>
                                    Answer::<?php echo $que['Answer']; ?>
                                </b> </div>
                        </div>
                    </div>
                </div>
                <?php $que = mysqli_fetch_assoc($result); ?>
                <div class="accordion accordion-flush shadow p-3 col-md-6 col-sm-12" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                                <?php echo $que['Question']; ?>
                            </button>
                        </h2>
                        <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"><b>
                                    Answer::<?php echo $que['Answer']; ?>
                                </b> </div>
                        </div>
                    </div>
                </div>
                <?php $que = mysqli_fetch_assoc($result); ?>
                <div class="accordion accordion-flush shadow p-3 col-md-6 col-sm-12" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                                <?php echo $que['Question']; ?>
                            </button>
                        </h2>
                        <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"><b>
                                    Answer::<?php echo $que['Answer']; ?>
                                </b> </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
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
<?php
if (isset($_POST['submit'])) //will check whether submit button is clicked or not
{
    $fname = $_POST['fname'];   //user entered first name will be stored in $fname
    $lname = $_POST['lname'];  //user entered last name will be stored in $lname
    $email = $_POST['email']; //user entered email will be stored in $email
    $question = $_POST['question']; //user entered question will be stored in $question
?>
    <script>
        alert('Email sent successfully'); //alert will be displayed if email sent successfully
        location.replace("FAQs.php"); // this will redirect to FAQs page again
    </script>

<?php
    $id = $num + 1;
    $insertquery = "INSERT INTO faqs(Q_id,email,Question) VALUES ('$id','$email','$question')";
    $query = mysqli_query($conn, $insertquery);

    require 'PHPMailerAutoload.php';
    require 'idpass.php';                //which contains sender email address and password

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

    $mail->Subject = 'Ask Your Doubt Here'; //this is the subject of the mail
    $mail->Body    = 'Thank you ' . $fname . ' ' . $lname . ' for asking your doubt!<br>here is your doubt<br>' . $question . '<br>Our team will respond within 2 working days!';
    $mail->AltBody = 'We will solve your doubt as soon as possible'; //optional

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}

?>