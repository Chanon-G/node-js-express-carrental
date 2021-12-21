<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car rental</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" 
        crossorigin="anonymous">
    <link ral="stalysheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    
</head>
<body >
    
<nav class="navbar navbar-expand-md navbar-dark " style="background-color:blueviolet">  <!--navbar-->
    <div class="container-fluid">
      <a class="navbar-brand " href="index.htm">
                <img src="../Webcarrent/img/car-rental.svg" alt="logo" width="70" height="60" 
                class="d-inline-block align-text-between  me-3 ">CarRental      
                <!-- logo navbar -->
                <!-- <span class="navbar-brand mb-5 h1">CarRental</span> -->
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>  
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-md-1">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.htm">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Carconditions.php">Car rental conditions</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="howtorentcar.php">How to rent a car</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Payment.php">Payment</a>   
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Address.php">Contact</a>   
                  </li>
                </ul>
                
      </div>
    </div>
  </nav>
      
  
    <div class="container">
      <h1 class="mt-5">Infoma<font color="#8A2BE2">tion</font></h1>
        <p align ="right">
        <a href="insertcar.php" class="btn btn-success ">Go to Insert</a>
        </p>
        <hr>
        <table id="mytable" class="table table-bordered table-hover">
          <thead>
            <th>ID</th>
            <th>Name</th>
            <th>License</th>
            <th>Color</th>
            <th>Status</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Note</th>
            
            <th>Detail</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>

          <tbody>
            <?php 

                include_once('functions.php');
                $fetchdatacar = new DB_con();
                $sql = $fetchdatacar->fetchdatacar();
                while($row = mysqli_fetch_array($sql )) {

            ?>

                <tr>
                    <td><?php echo $row['car_id']; ?></td>
                    <td><?php echo $row['car_name']; ?></td>
                    <td><?php echo $row['car_license']; ?></td>
                    <td><?php echo $row['color_name']; ?></td>
                    <td><?php echo $row['carstatus_name']; ?></td>
                    <td><?php echo $row['br_name']; ?></td>
                    <td><?php echo $row['price_name']; ?></td>
                    <td><?php echo $row['car_note']; ?></td>

                    <td><a href="detail.php?id=<?php echo $row['car_id']; ?>" class="btn btn-primary">Detail</a></td>
                    <td><a href="updatecar.php?id=<?php echo $row['car_id']; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="delete.php?del=<?php echo $row['car_id']; ?>" class="btn btn-danger"
                     onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
                </tr>
                
            <?php 

                }
               
            ?>
                
          </tbody>
        </table>
    </div>
          
        <!-- Footer -->
<footer class="text-center text-lg-start bg-dark text-muted">
  <!-- Section: Social media -->
  <section
    class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
  >
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <!-- <span>Get connected with us on social networks:</span> -->
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>CarRental
          </h6>
          <p>
            บริการรถเช่าราคาพิเศษ รถสภาพดี ราคาถูก ราคาสบายกระเป๋า เก็บมัดจำต่ำ บริการดี 
            ให้บริการได้ทั้ง หาดใหญ่ สงขลา 5 จังหวัดชายแดนใต้  พร้อมบริการส่งรถ
          </p>
        </div>
        <!-- Grid column -->

       

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="allcar.php" class="text-reset">information</a>
          </p>
          <p>
            <a href="Payment.php" class="text-reset">payment</a>
          </p>
          <p>
            <a href="Address.php" class="text-reset">Contact</a>
          </p>
          <p>
            <a href="Carconditions.php" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fas fa-home me-3"></i> 478/65 ม.2 ต.พะวง </p>
          <p><i class="fas fa-home me-3"></i> อ.เมืองสงขลา จ.สงขลา 90100</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            chanon.gee19631@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> 095-1066044</p>
          <p><i class="fas fa-print me-3"></i> 095-0281601</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 CarRental.
    
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer --> 
      
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
            crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" 
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" 
            crossorigin="anonymous">
        </script>
  
</body>
</html>