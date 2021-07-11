<?php
include 'DBCONFIG/config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



   if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("SORRY!!!NEGATIVE VALUES CANNOT BE TRANSFERRED")';
        echo '</script>';
    }




    else if($amount > $sql1['balance'])
    {

        echo '<script type="text/javascript">';
        echo ' alert("SORRY!!!INSUFFICIENT BALANCE")';
        echo '</script>';
    }




    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('SORRY!!!PLEASE ENTER VALID VALUE')";
         echo "</script>";
     }


    else {


                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);



                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);

                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transfermoney(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('YOUR TRANSACTION IS SUCCESSFUL');
                                     window.location='users.php';
                           </script>";

                }

                $newbalance= 0;
                $amount =0;
        }

}
?>
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

.navbar{
  background-color: #DA0037;
}

table{
  margin-top: 20px;
  background-color: #EDEDED;
}

.content-table{
  margin-left: 100px;
}

.front-img {
  padding-top: 30px;
}

.page-footer {
  background-color: grey;
  margin-top: 200px;
}

.footer-copyright {
  font-size: 20px;
}
.footer-icon:hover{
 color: #ff4c68;
}

.btn-floating{
  color: black;
}

.custom-select {
  margin-top: 100px;
}
</style>


</head>

<body>
  <?php
   include 'navbar.php';
 ?>
 <div class="container">
       <?php
        include 'DBCONFIG/config.php';
        $sid=$_GET['id'];
        $sql = "SELECT * FROM users where id=$sid";
        $result=mysqli_query($conn,$sql);
        if(!$result)
        {
           echo "Error : ".$sql."<br>".mysqli_error($conn);
        }
        $rows=mysqli_fetch_assoc($result);
           ?>
           <form method="post" name="tcredit" class="tabletext" ><br>
          </div>

          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6 col-md-12">
                <h2 class="text-center pt-4" style="font-weight:bold;">USER DETAILS</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                      <th scope="col">Slno.</th>
                      <th scope="col">USER</th>
                      <th scope="col">EMAIL</th>
                      <th scope="col">PHONE</th>
                      <th scope="col">BALANCE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row"><?php echo $rows['id'] ?></td>
                        <td scope="row"><?php echo $rows['name'] ?></td>
                        <td scope="row"><?php echo $rows['email'] ?></td>
                        <td scope="row"><?php echo $rows['phone'] ?></td>
                        <td scope="row">₹<?php echo $rows['balance'] ?></td>
                    </tr>
                </tbody>
            </table>
              </div>
              <div class="col-lg-6 col-md-12">
                <div align="center">
                  <h2 class="text-center pt-4" style="font-weight:bold;">TRANSACTION</h2>
                  </div>

                  <label class="ft">Transfer To:</label>
                  <select name="to" class="form-control" required>
                      <option value="" disabled selected>Choose</option>
                      <?php
                          include 'DBCONFIG/config.php';
                          $sid=$_GET['id'];
                          $sql = "SELECT * FROM users where id!=$sid";
                          $result=mysqli_query($conn,$sql);
                          if(!$result)
                          {
                              echo "Error ".$sql."<br>".mysqli_error($conn);
                          }
                          while($rows = mysqli_fetch_assoc($result)) {
                      ?>

                      <option class="table" value="<?php echo $rows['id'];?>" >

                                <?php echo $rows['id'] ;?> -
                                <?php echo $rows['name'] ;?> (Balance:₹
                                <?php echo $rows['balance'] ;?> )

                            </option>
                        <?php
                            }
                        ?>
                    </select>
                    <div>
                    <br>
                    <br>
                        <label class="ft">Amount:</label>
                        <input type="number" class="form-control" name="amount" required>
                        <br><br>
                        <div class="text-center" >
                          <button name="submit" type="submit" class="btn btn-outline-secondary"><span class="btn message">TRANSFER</button>
                        </div>
                    </form>
                </div>

              </div>
            </div>
          </div>

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
