<!-- this page contains login page for administrator -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/favicon-32x32.png" type="image/x-icon">

    <!-- Bootstrap CSS / Extra CSS -->
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 60%;
        }

        #customers td,
        #customers th {
            border: 2px solid #ddd;
            padding: 10px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 20px;
            padding-bottom: 20px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<center>

    <body>


        <div style="background-color:#142f43; padding-top: 20px; padding-bottom: 20px;;" ; id="admin">
            <h1 style="text-align:center; color:white">Admin</h1>
        </div>

        <form style="margin-top: 6rem;" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="justify-item-center text-center">
            <div class="card shadow-lg p-3" style="max-width: 400px;">
                <div class="card-body">
                    <h4 class="mb-3">Login</h4>
                    <hr class="hr-bold-purple">
                    <div class="mb-3">
                        <input type="textarea" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Username">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter Password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg">Sign In!</button>
                    </div>
                </div>
            </div>
        </form>
        <footer class="my-4">
            <hr class="dropdown-divider">
            <p class="text-center text-muted">© 2021 PyProjects, Inc</p>
        </footer>



    </body>
</center>

</html>
<?php
include 'dbcon.php';
if (isset($_POST['submit'])) //will check whether submit button is clicked or not
{

    $email = $_POST['email']; //admin entered email will be store in $email
    $password = $_POST['password']; // admin entered password will be store in $password
    if ($email == "admin" && $password == "admin") //this condition will authenticate the admin
    {
?>
        <script>
            alert('login successful');
            location.replace("admin.php"); // if credentials are correct then admin will redirect to admin page
        </script>

    <?php
    } else {

    ?>
        <script>
            alert('Username / Password not matching'); // if credentials are incorrect then alert will be reflected
        </script>

<?php
    }
}
