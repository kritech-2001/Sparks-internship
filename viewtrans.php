<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Basic bank</title>

  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">


  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/styles.css">

  <!-- Font awesome -->
  <script src="https://kit.fontawesome.com/74a063bb38.js" crossorigin="anonymous"></script>

  <!-- Bootstrap strips -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>

.page-footer {
  margin-top: 200px;
}

</style>


</head>

<body>
  <section id="title">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php" style="color: white;">Spark Basic Bank</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php" style="color: #F7F7F7;">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="users.php" style="color: #F7F7F7;">Users</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </section>
      <!-- TRANSACTION HISTORY TABLE -->
      <table class="table table-hover">
          <h2 class="text-center pt-4" style="font-weight:bold;">TRANSACTION HISTORY</h2>
      <thead>
        <tr>
            <th class="text-center">FROM</th>
            <th class="text-center">TO</th>
            <th class="text-center">AMOUNT</th>
            <th class="text-center">DATE & TIME</th>
        </tr>
      </thead>
      <tbody>
        <?php

           include 'DBCONFIG/config.php';

           $sql ="select * from transfermoney";

           $query =mysqli_query($conn, $sql);

           while($rows = mysqli_fetch_assoc($query))
           {
        ?>

           <tr>
             <td class="text-center py-2"><?php echo $rows['sender']; ?></td>
             <td class="text-center py-2"><?php echo $rows['receiver']; ?></td>
             <td class="text-center py-2">₹<?php echo $rows['balance']; ?> </td>
             <td class="text-center py-2"><?php echo $rows['datetime']; ?> </td>
       <?php
           }

       ?>
      </tbody>
    </table>

    <!-- Footer -->
    <footer class="page-footer font-small special-color-dark pt-4">

      <!-- Footer Elements -->
      <div class="container">

        <!-- Social buttons -->
        <ul class="list-unstyled list-inline text-center">
          <li class="list-inline-item">
            <a class="btn-floating btn-fb mx-1">
              <i class="fab fa-facebook-f footer-icon"> </i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn-floating btn-tw mx-1">
              <i class="fab fa-twitter footer-icon"> </i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn-floating btn-gplus mx-1">
              <i class="fab fa-google-plus-g footer-icon"> </i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn-floating btn-li mx-1">
              <i class="fab fa-linkedin-in footer-icon"> </i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn-floating btn-dribbble mx-1">
              <i class="fab fa-dribbble footer-icon"> </i>
            </a>
          </li>
        </ul>
        <!-- Social buttons -->

      </div>
      <!-- Footer Elements -->

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2021 Copyright <br> Done By Krishna g Bhat
      </div>
      <!-- Copyright -->

    </footer>
    <!-- Footer -->

</body>
</html>
