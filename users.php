
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


  <!-- Font awesome -->
  <script src="https://kit.fontawesome.com/74a063bb38.js" crossorigin="anonymous"></script>

  <!-- Bootstrap strips -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>
.navbar{
  background-color: #DA0037;
}

table{
  margin-top: 20px;
  background-color: #EDEDED;
}

.front-img {
  padding-top: 30px;
}

.page-footer {
  background-color: grey;
  margin-top: 50%;
}

.footer-icon:hover{
 color: #ff4c68;
}

.btn-floating{
  color: black;
}

</style>


</head>

<body>
  <?php
     include 'DBCONFIG/config.php';
     $sql = "SELECT * FROM users";
     $result = mysqli_query($conn,$sql);
 ?>

 <section id="title">
   <div class="container-fluid">
     <nav class="navbar navbar-expand-lg navbar-light">
       <div class="container-fluid">
         <a class="navbar-brand" href="#" style="color: white;">Spark Basic Bank</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
           <ul class="navbar-nav ml-auto">
             <li class="nav-item">
               <a class="nav-link" aria-current="page" href="index.php" style="color: #F7F7F7;">Home</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="viewtrans.php" style="color: #F7F7F7;">View Tranfer</a>
             </li>
           </ul>
         </div>
       </div>
     </nav>


      <table class="table table-hover" style="background-color: #EDEDED;">
        <thead>
          <tr>
            <th scope="col">Slno.</th>
            <th scope="col">USER NAME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">PHONE</th>
            <th scope="col">BALANCE</th>
          </tr>
        </thead>
        <tbody>
          <?php
                   while($rows=mysqli_fetch_assoc($result)){
               ?>

               <tr>
                <td><?php echo $rows['id'] ?></td>
                <td><?php echo $rows['name']?></td>
                <td><?php echo $rows['email']?></td>
                <td><?php echo $rows['phone']?></td>
                <td>₹<?php echo $rows['balance']?></td>
                <div class="message-wrapper">
                  <div class="container">
                  <td class="text-center"><a href="transfermoney.php?id= <?php echo $rows['id'];?>"><button type="button" class="btn btn-outline-secondary">Transfer</button></a></td>
                  </div>
                </div>

                       </tr>
                    <?php
                  }
                    ?>
        </tbody>
      </table>
</body>
</html>
