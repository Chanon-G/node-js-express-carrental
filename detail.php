<?php 

    include_once('functions.php');

    

    if (isset($_POST['add'])) {

        $car_id = $_GET['id'];
        $car_name = $_POST['car_name'];
        $car_license = $_POST['car_license'];
        $car_color = $_POST['car_color'];
        $car_status = $_POST['car_status'];
        $car_brand = $_POST['car_brand'];
        $car_price = $_POST['car_price'];
        $car_note = $_POST['car_note'];
        
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarRental</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
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
        <h1 class="mt-5">Detail</h1>
        <hr>
        <?php 

            $updatecar_id = new DB_con();
            $car_id = $_GET['id'];
            $sql = $updatecar_id->fetchonerecordcar($car_id);
            while($row = mysqli_fetch_array($sql)) {
        ?>

        <form action="" method="post">
            <div class="mb-3">
                <label for="car_name" class="form-label">Name</label>
                <input type="text" class="form-control " name="car_name" 
                    value="<?php echo $row['car_name']; ?>"  disabled>
            </div>
            <div class="mb-3">
                <label for="car_license" class="form-label">license</label>
                <input type="text" class="form-control" name="car_license"
                    value="<?php echo $row['car_license']; ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="car_color" class="form-label">color</label>
                <select class="form-control" name="car_color" disabled>
                    <option value="">เลือก</option>
                    <?php 
                        $dropdowncolor = new DB_con;
                        $sql = $dropdowncolor->Showcolor();
                        
                            foreach($sql as $car_color){
                                $selected = ($car_color['color_id']==$row['car_color'])?"selected":"";
                                echo "
                                    <option value = '{$car_color['color_id']}'{$selected}>{$car_color['color_name']}</option>
                                ";
                        }
                     
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="car_status" class="form-label">status</label>
                <select class="form-control" name="car_status" disabled>
                    <option value="">เลือก</option>
                    <?php 
                        $dropdownst = new DB_con;
                        $sql = $dropdownst->Showst();
                        
                            foreach($sql as $car_status){
                                $selected = ($car_status['carstatus_id']==$row['car_status'])?"selected":"";
                                echo "
                                    <option value = '{$car_status['carstatus_id']}'{$selected}>{$car_status['carstatus_name']}</option>
                                ";
                        }
                     
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="car_brand" class="form-label">brand</label>
                <select class="form-control" name="car_brand" disabled>
                    <option value="">เลือก</option>
                    <?php 
                        $dropdownbr = new DB_con;
                        $sql = $dropdownbr->Showbr();
                        
                            foreach($sql as $car_brand){
                                $selected = ($car_brand['br_id']==$row['car_brand'])?"selected":"";
                                echo "
                                    <option value = '{$car_brand['br_id']}'{$selected}>{$car_brand['br_name']}</option>
                                ";
                        }
                     
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="car_price" class="form-label">price</label>
                <select class="form-control" name="car_price" disabled>
                    <option value="">เลือก</option>
                    <?php 
                        $dropdownpr = new DB_con;
                        $sql = $dropdownpr->Showprice();
                        
                            foreach($sql as $car_price){
                                $selected = ($car_price['price_id']==$row['car_price'])?"selected":"";
                                echo "
                                    <option value = '{$car_price['price_id']}'{$selected}>{$car_price['price_name']}</option>
                                ";
                        }
                     
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="car_note" class="form-label">Note</label>
                <input type="text" class="form-control" name="car_note" 
                    value="<?php echo $row['car_note']; ?>" disabled>
            </div>
            
            <?php } ?>
            <a href="Address.php" name="add" class="btn btn-success">ติดต่อ</a>
            <a href="allcar.php" class="btn btn-primary ">Go Back</a>
        </form>
        <br><br><br><br><br>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    
</body>
</html>