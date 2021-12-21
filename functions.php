<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'carrent');
    
    class DB_con {

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }

        
        /*                       carprice                       */

        public function insertprice($price_id,$price_name) {
            $result = mysqli_query($this->dbcon, "INSERT INTO price(price_id,price_name)
            VALUES('$price_id','$price_name')");
            return $result;
        }

        public function fetchdataprice() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM price ORDER BY price_id");
            return $result;
        }

        public function fetchonerecordprice($price_id) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM price WHERE id = '$price_id'");
            return $result;
        }

        public function updateprice($price_id,$price_name) {
            $result = mysqli_query($this->dbcon, "UPDATE price SET 
                
                price_name = '$price_name',
                WHERE id = '$price_id'
            ");
            return $result;
        }

        public function deleteprice($price_id) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM price WHERE id = '$price_id'");
            return $deleterecord;
        }

        public function Showprice()
        {
            $res = mysqli_query($this->dbcon, "SELECT * FROM price");
            return $res;
        }

        /*                       carstatus                       */

        public function insertstatus($carstatus_id,$carstatus_name) {
            $result = mysqli_query($this->dbcon, "INSERT INTO carstatus(carstatus_id,carstatus_name)
            VALUES('$carstatus_id','$carstatus_name')");
            return $result;
        }

        public function fetchdatastatus() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM carstatus ORDER BY carstatus_id");
            return $result;
        }

        public function fetchonerecordstatus($carstatus_id) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM carstatus WHERE id = '$carstatus_id'");
            return $result;
        }

        public function updatestatus($carstatus_id,$carstatus_name) {
            $result = mysqli_query($this->dbcon, "UPDATE carstatus SET 
                
                carstatus_name = '$carstatus_name',
                WHERE id = '$carstatus_id'
            ");
            return $result;
        }

        public function deletestatus($carstatus_id) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM carstatus WHERE id = '$carstatus_id'");
            return $deleterecord;
        }

        public function Showst()
        {
            $res = mysqli_query($this->dbcon, "SELECT * FROM carstatus");
            return $res;
        }

        
        /*                       carbrand                      */


        public function insertbrand($br_id,$br_name) {
            $result = mysqli_query($this->dbcon, "INSERT INTO carbrand(br_id,br_name)
            VALUES('$br_id','$br_name')");
            return $result;
        }

        public function fetchdatabrand() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM carbrand ORDER BY br_id");
            return $result;
        }

        public function fetchonerecordbrand($br_id) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM carbrand WHERE id = '$br_id'");
            return $result;
        }

        public function updatebrand($br_id,$br_name) {
            $result = mysqli_query($this->dbcon, "UPDATE carbrand SET 
                
                br_name = '$br_name',
                WHERE id = '$br_id'
            ");
            return $result;
        }

        public function deletebrand($br_id) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM carbrand WHERE id = '$br_id'");
            return $deleterecord;
        }

        public function Showbr()
        {
            $res = mysqli_query($this->dbcon, "SELECT * FROM carbrand");
            return $res;
        }


        
        /*                       carcolor                       */


        public function insertcolor($color_id,$color_name) {
            $result = mysqli_query($this->dbcon, "INSERT INTO carcolor(color_id,color_name)
            VALUES('$color_id','$color_name')");
            return $result;
        }

        public function fetchdatacolor() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM carcolor ORDER BY color_id");
            return $result;
        }

        public function fetchonerecordcolor($color_id) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM carcolor WHERE id = '$color_id'");
            return $result;
        }

        public function updatecolor($color_id,$color_name) {
            $result = mysqli_query($this->dbcon, "UPDATE carcolor SET 
                
                color_name = '$color_name',
                WHERE id = '$color_id'
            ");
            return $result;
        }

        public function deletecolor($color_id) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM carcolor WHERE id = '$color_id'");
            return $deleterecord;
        }

        public function Showcolor()
    {
        $res = mysqli_query($this->dbcon, "SELECT * FROM carcolor");
        return $res;
    }

        
        /*                       car                      */



        public function fetchdatacar() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM car LEFT JOIN carcolor on car.car_color=carcolor.color_id
            LEFT JOIN carstatus on car.car_status = carstatus.carstatus_id
            LEFT JOIN carbrand on car.car_brand = carbrand.br_id
            LEFT JOIN price on car.car_price = price_id
            WHERE car.car_id = car_id;");
            return $result;
        }

        public function fetchonerecordcar($car_id) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM car WHERE car_id = '$car_id'");
            return $result;
        }

        public function insertcar($car_name ,$car_license ,$car_color ,$car_status ,$car_brand ,$car_price ,$car_note) {
            $result = mysqli_query($this->dbcon, "INSERT INTO car(car_name ,car_license ,car_color ,car_status ,car_brand ,car_price ,car_note)
            VALUES('$car_name' ,'$car_license' ,'$car_color' ,'$car_status' ,'$car_brand' ,'$car_price' ,'$car_note')");
            return $result;
        }

        public function updatecar($car_name ,$car_license ,$car_color ,$car_status ,$car_brand ,$car_price ,$car_note ,$car_id) {
            $result = mysqli_query($this->dbcon, "UPDATE car SET 
                
                car_name = '$car_name',
                car_license = '$car_license',
                car_color = '$car_color',
                car_status = '$car_status',
                car_brand = '$car_brand',
                car_price = '$car_price',
                car_note = '$car_note'
                WHERE car_id = '$car_id'
            ");
            return $result;
        }

        public function deletecar($car_id) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM car WHERE car_id = '$car_id'");
            return $deleterecord;
        }


        
        

        
    }
    

?>