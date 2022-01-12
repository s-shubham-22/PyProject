<!-- this file contains the source code for Feedback functionality -->

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
    $pgname = "Feedback";
    include("header.php");
    ?>

    <!-- USER QUESTION FORM -->
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="justify-item-center text-center" style="margin-top: 5.5rem;">
        <div class="card shadow-lg p-3" style="max-width: 700px;">
            <div class="card-body">
                <h4 class="mb-3">Please provide your Feedback Here</h4>
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
                    <textarea class="form-control" name="Feedback" id="exampleFormControlTextarea1" rows="2" placeholder="Enter Your Feedback here"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </div>
        </div>
    </form>

    <!-- CONTENT -->
    <!-- DATABASE -->
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pyproject";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Sorry::" . mysqli_connect_error());
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
    $fname = $_POST['fname'];  //user entered first name will be stored in $fname
    $lname = $_POST['lname'];  //user entered last name will be stored in $lname
    $email = $_POST['email'];   //user entered email will be stored in $email
    $Feedback = $_POST['Feedback'];  //user entered Feedback will be stored in $Feedback
?>

    <?php
    $sql = "INSERT INTO Feedback (Firstname, Lastname, Email, Feedback) VALUES ('$fname','$lname','$email','$Feedback')";
    $query = mysqli_query($conn, $sql); // this query will be used to insert the data in Feedback table 

    if ($query) // this will check whether $query runs fine or not
    {
    ?>
        <script>
            alert('Your FeedBack has been Recorded'); // alert will be displayed if Feedback recorded successfully in DB
            location.replace("Feedback.php"); //this will redirect user to Feedback page again.
        </script>
<?php
    }
}
?>