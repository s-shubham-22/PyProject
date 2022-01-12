<!-- this file contains code for admin page which shows list of registered users -->

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
      background-color: #f2f2f2;
    }

    #customers th {
      padding-top: 20px;
      padding-bottom: 20px;
      text-align: left;
      background-color: #008401;
      color: white;
    }
  </style>
</head>
<center>

  <body>


    <div style="background-color:#130052; padding-top: 20px; padding-bottom: 20px;;" ; id="admin">
      <h1 style="text-align:center; color:white">Admin Page</h1>
    </div>



    <table id="customers" class="justify-item-center text-center" style="margin-top: 5rem;">
      <tr>
        <th>
          <h3>
            <center>No.</center>
          </h3>
        </th>
        <th>
          <h3>
            <center>First Name</center>
          </h3>
        </th>
        <th>
          <h3>
            <center>Last Name</center>
          </h3>
        </th>
        <th>
          <h3>
            <center>Email</center>
          </h3>
        </th>

      </tr>
      <?php
      include 'dbcon.php';
      $sql = "SELECT * FROM joinus WHERE 1"; //this query will collect the data from the joinus table
      $result = mysqli_query($con, $sql);
      $count = mysqli_num_rows($result);
      $x = 1; //counter variable for user counting

      while ($x <= $count) {
        $row = mysqli_fetch_assoc($result); //the fatched data will be stored into $run variable
      ?>
        <tr>
          <td>
            <h4><?php echo $x; ?></h4>
          </td>
          <td>
            <h4><?php echo $row['fname']; ?></h4>
          </td> <!-- this shows the first name of the user -->
          <td>
            <h4><?php echo $row['lname']; ?></h4>
          </td> <!-- this shows the Last name of the user -->

          <!-- by clicking on email id admin will redirect to gmail page -->
          <td>
            <h4><a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></h4>
          </td>
        </tr>
      <?php
        $x++;
      }

      ?>


    </table>
    <footer class="my-4">
      <hr class="dropdown-divider">
      <p class="text-center text-muted">© 2021 PyProjects, Inc</p>
    </footer>

  </body>
</center>

</html>