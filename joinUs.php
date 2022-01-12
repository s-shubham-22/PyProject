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
  <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
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
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="justify-item-center text-center" style="margin-top: 5.5rem;">
    <div class="card shadow-lg p-3" style="max-width: 400px;">
      <div class="card-body">
        <h4 class="mb-3">Sign Up to Continue!</h4>
        <hr class="hr-bold-purple">
        <div class="row">
          <div class="mb-3 col-md-6 col-sm-12">
            <input type="fname" name="fname" class="form-control" id="exampleFormControlInput1" placeholder="First Name">
          </div>
          <div class="mb-3 col-md-6 col-sm-12">
            <input type="lname" name="lname" class="form-control" id="exampleFormControlInput1" placeholder="Last Name">
          </div>
        </div>
        <div class="mb-3">
          <select name="profession" class="form-select" aria-label="Default select example">
            <option selected disabled>Profession</option>
            <option value="Student">Student</option>
            <option value="Developer">Developer</option>
          </select>
        </div>
        <div class="mb-3">
          <input type="orgname" name="oname" class="form-control" id="exampleFormControlInput1" placeholder="Organization Name">
        </div>
        <div class="mb-3">
          <select name="intrest" class="form-select" aria-label="Default select example">
            <option selected disabled>Interests</option>
            <option value="Machine Learning">Machine Learning</option>
            <option value="Deep Learning">Deep Learning</option>
            <option value="Artificial Inteligence">Artificial Inteligence</option>
          </select>
        </div>
        <div class="mb-3">
          <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Email">
        </div>
        <div class="mb-3">
          <input type="password" name="pass" class="form-control" id="exampleFormControlInput1" placeholder="Enter Password">
        </div>
        <div class="mb-3">
          <input type="password" name="cpass" class="form-control" id="exampleFormControlInput1" placeholder="Confirm Password">
        </div>
        <div class="mb-3">
          <button type="submit" name="submit" class="btn btn-primary btn-lg">Sign Up!</button>
        </div>
        <p>Already Have an Account? <a href="./signIn.php" class="card-link">Sign In</a></p>
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
if (isset($_POST['submit']))  //will check whether submit button is clicked or not
{
  //this if condition ensures that no such field should remain empty
  if (!(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['oname']) || empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['cpass']) || empty($_POST['intrest']) || empty($_POST['profession']))) {
    $fname = $_POST['fname']; //user entered first name will be stored in $fname
    $lname = $_POST['lname']; //user entered last name will be stored in $lname
    $profession = $_POST['profession']; //user selected profession will be stored in $profession
    $oname = $_POST['oname']; //user entered organization name will be stored in $oname
    $intrest = $_POST['intrest']; //user selected intrest will be stored in $intrest
    $email = $_POST['email']; //user entered email  will be stored in $email
    $pass = $_POST['pass']; //user entered first name will be stored in $pass
    $cpass = $_POST['cpass']; //user entered first name will be stored in $cpass
    $emailquery = "SELECT * FROM joinus WHERE email = '$email'";  // this query collect the data of rows which contains user entered email address
    $query_for_mail = mysqli_query($con, $emailquery);
    $email_count = mysqli_num_rows($query_for_mail); //this will count no of rows of table which contains user entered email
    if ($email_count > 0) //if email already exist in the table then it will give an error
    {
?>
      <script>
        alert('email already exist');
      </script>

      <?php
    } else {
      if (strlen($pass) >= 6) //condition will true if and only if password length is greater than 5 character
      {
        if ($pass != $cpass) {
      ?>
          <script>
            alert('password and confirm password not match'); //alert will be displayed if password and confirm password won't match with each other
          </script>

          <?php
        } else {
          $hash = password_hash($pass, PASSWORD_BCRYPT);  //this will encrypt the password 
          $chash = password_hash($cpass, PASSWORD_BCRYPT); // this will encrypt the confirm password
          $token = bin2hex(random_bytes(15)); // this will allocate the random string with 15 characters
          $insertquery = "INSERT INTO joinus(fname,lname,oname,email,pass,profession,intrest,token) VALUES ('$fname','$lname','$oname','$email','$hash','$profession','$intrest','$token')";
          //this query is use to insert the user entered data into join us table
          $query = mysqli_query($con, $insertquery);

          if ($query) //this will check whether query run successfully or not
          {
          ?>
            <script>
              alert('You are registered!'); //massage will be displayed if user registered successfully
              location.replace("signIn.php"); //by this user will redirect to signin page
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
            // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'Welcome to Pyproject';
            $mail->Body    = ' <style type="text/css">
   /* Take care of image borders and formatting */

   img { max-width: 600px; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;}
   a img { border: none; }
   table { border-collapse: collapse !important; }
   #outlook a { padding:0; }
   .ReadMsgBody { width: 100%; }
   .ExternalClass {width:100%;}
   .backgroundTable {margin:0 auto; padding:0; width:100%;!important;}
   table td {border-collapse: collapse;}
   .ExternalClass * {line-height: 115%;}


   /* General styling */

   td {
     font-family: Arial, sans-serif;
     color: #5e5e5e;
     font-size: 16px;
     text-align: left;
   }

   body {
     -webkit-font-smoothing:antialiased;
     -webkit-text-size-adjust:none;
     width: 100%;
     height: 100%;
     color: #5e5e5e;
     font-weight: 400;
     font-size: 16px;
   }


   h1 {
     margin: 10px 0;
   }

   a {
     color: #2b934f;
     text-decoration: none;
   }


   .body-padding {
     padding: 0 75px;
   }


   .force-full-width {
     width: 100% !important;
   }

   .icons {
     text-align: right;
     padding-right: 30px;
   }

   .logo {
     text-align: left;
     padding-left: 30px;
   }

   .computer-image {
     padding-left: 30px;
   }

   .header-text {
     text-align: left;
     padding-right: 30px;
     padding-left: 20px;
   }

   .header {
     color: #232925;
     font-size: 24px;
   }

   .grey-header {
     background-color: #dedede;
     padding: 5px;
     font-weight: bold;
   }

   .white-header {
     background-color: #f3f3f3;
     padding: 5px;
   }


   </style>

   <style type="text/css" media="screen">
       @media screen {
         @import url(http://fonts.googleapis.com/css?family=PT+Sans:400,700);
         /* Thanks Outlook 2013! */
         * {
           
         }
       }
   </style>

   <style type="text/css" media="only screen and (max-width: 599px)">
     /* Mobile styles */
     @media only screen and (max-width: 599px) {

       table[class*="w320"] {
         width: 320px !important;
       }

       td[class*="icons"] {
         display: block !important;
         text-align: center !important;
         padding: 0 !important;
       }

       td[class*="logo"] {
         display: block !important;
         text-align: center !important;
         padding: 0 !important;
       }

       td[class*="computer-image"] {
         display: block !important;
         width: 230px !important;
         padding: 0 45px !important;
         border-bottom: 1px solid #e3e3e3 !important;
       }


       td[class*="header-text"] {
         display: block !important;
         text-align: center !important;
         padding: 0 25px!important;
         padding-bottom: 25px !important;
       }

       *[class*="mobile-hide"] {
         display: none !important;
         width: 0 !important;
         height: 0 !important;
         line-height: 0 !important;
         font-size: 0 !important;
       }

       td[class="mobile-block"] {
         display: block !important;
         width: 260px !important;
       }


     }
   </style>
 </head>
 <body  offset="0" class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none" bgcolor="#ffffff">
 <table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%">
   <tr>
     <td align="center" valign="top" style="background-color:#ffffff" width="100%">

     <center>
       <table cellspacing="0" cellpadding="0" width="600" class="w320">
         <tr>
           <td align="center" valign="top">

             <table class="force-full-width" cellspacing="0" cellpadding="0" bgcolor="#232925">
               <tr>
                 <td style="background-color:#232925" class="logo">
                   <br>
                   <a href="#"><img src="https://i.postimg.cc/Gp9G0SY6/pyprojects.png" alt="Logo"></a>
                 </td>
                 <td class="icons">
                   <br>
                   <a href="#"><img src="https://www.filepicker.io/api/file/Rw9fFADxSxK1JyEuQanm" alt="facebook"></a>
                   <a href="#"><img src="https://www.filepicker.io/api/file/WzHKffHYQKe7xpO35hSw" alt="twitter"></a>
                   <a href="#"><img src="https://www.filepicker.io/api/file/doa3fyePR0Kdnu55nlNo" alt="google+"></a>
                   <a href="#"><img src="https://www.filepicker.io/api/file/dresyXUMRjalUp3zvwXC" alt="instagram"></a>
                 </td>
               </tr>
             </table>

             <table cellspacing="0" cellpadding="0" class="force-full-width" bgcolor="#232925">
               <tr>
                 <td class="computer-image">
                   <br>
                   <br class="mobile-hide" />
                   <img style="display:block;" width="224" height="213" src="https://i.postimg.cc/7YLLQywM/dev2.png" alt="hello">
                 </td>
                 <td style="color: #ffffff;" class="header-text">
                   <br>
                   <br>
                   <span style="font-size: 24px;">Thanks For Joining!</span><br><br>
                   Start Exploring Python By Clicking The Button Below.
                   <br>
                   <br>
                     <div><!--[if mso]>
                       <v:rect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:40px;v-text-anchor:middle;width:150px;" stroke="f" fillcolor="#2b934f">
                         <w:anchorlock/>
                         <center>
                       <![endif]-->
                           <a href="http://localhost/Website/index.php"
                       style="background-color:#54ebc7;color:#000000;display:inline-block;  border-radius: 25px;
font-family:Helvetcia, sans-serif;font-size:16px;font-weight:bold;line-height:40px;text-align:center;text-decoration:none;width:150px;-webkit-text-size-adjust:none;">Explore</a>
                         <!--[if mso]>
                           </center>
                         </v:rect>
                       <![endif]-->
                     </div>
                     <br>
                 </td>
               </tr>
             </table>


                 
                     
                            
                          
                     


         
             

             <table class="force-full-width" cellspacing="0" cellpadding="20" bgcolor="#2b934f">
               <tr>
                 <td style="background-color:#58cde1; color:#004aad; font-size: 14px; text-align: center;">
                   © 2021 All Rights Reserved
                 </td>
               </tr>
             </table>


           </td>
         </tr>
       </table>

     </center>
     </td>
   </tr>
 </table>
 </body>';
            $mail->AltBody = 'You are Registered';


            if (!$mail->send()) {
              echo 'Message could not be sent.';
              //echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
              echo 'Message has been sent';
            }
          } else {

            ?>
            <script>
              alert('data not inserted'); //alert displayed if data not inserted properly into database
            </script>

        <?php
          }
        }
      } else {
        ?>
        <script>
          alert('Password should contain atleast 6 characters'); //alert occurs if password length <6
        </script>

    <?php
      }
    }
  } else {

    ?>
    <script>
      alert('fill all fields properly'); //this alert will be displayed if atleast one field is empty
    </script>

<?php
  }
}


?>