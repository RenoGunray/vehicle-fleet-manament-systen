<?php 
session_start();

class Registration{
    private $fname;
    private $lname;
    private $ocupation;
    private $email;
    private $phone;
    private $dob;
    private $password;

    public function regDriver() {
        include 'conn.php';
        //set all variables text fields
        
        $this->fname = $_POST['fname'];
        $this->lname = $_POST['lname'];
        $this->ocupation = $_POST['ocupation'];
        $this->email = $_POST['email'];
        $this->phone = $_POST['phone'];
        $this->dob = $_POST['dob'];
        $this->password = $_POST['password'];

        //insert in apporpriate table depending on value 'ocupation'
        if(isset($this->fname) and isset($this->password) and $this->ocupation=='Driver'){
            $insert = mysqli_query($conn, "insert into drivers (fname, lname, email, phone, dob, password) values ('".$this->fname."', '".$this->lname."', '".$this->email."', '".$this->phone."', '".$this->dob."', '".$this->password."')");
            if($insert) {
                echo "<p class='text-success'>Driver Registratered Successfully!</p>";
            }
        }
        if(isset($this->fname) and isset($this->password) and $this->ocupation=='Transport Officer'){
            $insert = mysqli_query($conn, "insert into tpo (fname, lname, email, phone, dob, password) values ('".$this->fname."', '".$this->lname."', '".$this->email."', '".$this->phone."', '".$this->dob."', '".$this->password."')");
            if($insert) {
                echo "<p class='text-success'>Transport Officer Registratered Successfully!</p>";
            }
        }
        if(isset($this->fname) and isset($this->password) and $this->ocupation=='Admin'){
            $insert = mysqli_query($conn, "insert into admin (fname, lname, email, phone, dob, password) values ('".$this->fname."', '".$this->lname."', '".$this->email."', '".$this->phone."', '".$this->dob."', '".$this->password."')");
            if($insert) {
                echo "<p class='text-success'>Administrator Registratered Successfully!</p>";
            }
        }
    }

    private $name;
    private $model;
    private $serial;
    private $type;
    private $capacity;

    public function registerVehicle(){
        include 'conn.php';
        $this->name = $_POST['name'];
        $this->model = $_POST['model'];
        $this->serial = $_POST['serial'];
        $this->type = $_POST['type'];
        $this->capacity = $_POST['capacity'];

        if(isset($this->name) and isset($this->model) and isset($this->serial) and isset($this->type) and isset($this->capacity)){
            $sel = mysqli_query($conn, "select * from vehicles where serialno='".$this->serial."'");
            $num_rows = mysqli_num_rows($sel);
            if($num_rows==1){
                echo "<p class='text-danger'><strong>This vehicle already exists in the system. Please check the serial number</strong></p>";
            }else{
                $ins = mysqli_query($conn, "insert into vehicles (name, model, serialno, type, capacity, date) values ('".$this->name."', '".$this->model."', '".$this->serial."', '".$this->type."', '".$this->capacity."', now())");
                if($ins){
                    echo "<p class='text-success'><strong>Vehicle Inserted Successful</strong></p>";
                }
            }
        }
    }

    

    public function assignDriver() {
        include 'conn.php';
        $this->name = $_POST['name'];
        $this->model = $_POST['model'];
        $this->serial = $_POST['serial'];
        $this->fname = $_POST['driver'];

        if(isset($this->fname)) {
            $sel = mysqli_query($conn, "select * from assigned_vehicles where serial_num='".$this->serial."' and driver_id='".$this->fname."'");
            if(mysqli_num_rows($sel)==1){
                echo "<p class='text-danger'><strong>this car has a driver</strong></p>";
            }else{
                //$update = mysqli_query($conn, "update vehicles set driver_id='".$this->fname."'  where v_id='".$this->name."'");
                $ins = mysqli_query($conn, "insert into assigned_vehicles (vehicle_id, model, serial_num, driver_id) values ('".$this->name."', '".$this->model."', '".$this->serial."', '".$this->fname."')");
                if($ins){
                    echo "<p class='text-success'><strong>Vehicle Assignment successfull</strong></p>";
                }
            }
        }
    }

    private $destination;
    private $area;

    public function registerRout() {
        $this->fname = $_POST['road_name'];
        $this->destination = $_POST['destination'];
        $this->area = $_POST['area'];
        include 'conn.php';

        if (isset($this->fname) and isset($this->destination) and isset($this->area)){
            $ins = mysqli_query($conn, "insert into routs (r_name, r_area, destination) values ('".$this->fname."', '".$this->area."', '".$this->destination."')");
            if ($ins) {
                echo "<p class='text-success'><strong>rout registered successful</strong></p>";
            }
        }

    }

    private $district;

    public function registerLocation() {
        $this->fname = $_POST['name'];
        $this->district = $_POST['district'];
        $this->area = $_POST['area'];
        include 'conn.php';

        if (isset($this->fname) and isset($this->area) and isset($this->district)){
            $ins = mysqli_query($conn, "insert into locations (l_name, l_area, district) values ('".$this->fname."', '".$this->area."', '".$this->district."')");
            if ($ins) {
                echo "<p class='text-success'><strong>rout registered successful</strong></p>";
            }
        }

    }
}

class Login extends Registration{ //inherit class registration
    public function logDriver() {
        include 'conn.php';
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];

        if(isset($this->email) and isset($this->password)) {
            $sel = mysqli_query($conn, "select * from drivers where email='".$this->email."' and password='".$this->password."'");

            if(mysqli_num_rows($sel) == 0){
                echo "<p class='text-bold text-danger'>Driver does not exist in the system!</p>";
            }else{
                while($row=mysqli_fetch_array($sel)) {
                    //get session name if user
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['lname'] = $row['lname'];
                    $name = $_SESSION['fname'] . ' ' . $_SESSION['lname'];
    
                    //get session id of user
                    $_SESSION['d_id'] = $row['d_id'];
                    $driver_id = $_SESSION['d_id'];
                    //set session
                    $_SESSION['email'] = $row['email'];
                    $email = $_SESSION['email']; 
                }
    
                header("location: driver-dash.php");
            }

        }
    }
    public function logTpo() {
        include 'conn.php';
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];

        if(isset($this->email) and isset($this->password)) {
            $sel = mysqli_query($conn, "select * from tpo where email='".$this->email."' and password='".$this->password."'");

            if(mysqli_num_rows($sel) == 0){
                echo "<p class='text-bold text-danger'>Transport Officer does not exist in the system!</p>";
            }else{
                while($row=mysqli_fetch_array($sel)) {
                    //get session name if user
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['lname'] = $row['lname'];
                    $name = $_SESSION['fname'] . ' ' . $_SESSION['lname'];
    
                    //get session id of user
                    $_SESSION['tp_id'] = $row['tp_id'];
                    $tp_id = $_SESSION['tp_id'];
                    //set session
                    $_SESSION['email'] = $row['email'];
                    $email = $_SESSION['email']; 
                }
    
                header("location: tpo-dash.php");
            }

        }
    }
    public function logAdmin() {
        include 'conn.php';
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];

        if(isset($this->email) and isset($this->password)) {
            $sel = mysqli_query($conn, "select * from admin where email='".$this->email."' and password='".$this->password."'");

            if(mysqli_num_rows($sel) == 0){
                echo "<p class='text-bold text-danger'>Admin does not exist in the system!</p>";
            }else{
                while($row=mysqli_fetch_array($sel)) {
                    //set session name if user
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['lname'] = $row['lname'];
                    $name = $_SESSION['fname'] . ' ' . $_SESSION['lname'];
    
                    //set session id of user
                    $_SESSION['admin_id'] = $row['admin_id'];
                    $admin_id = $_SESSION['admin_id'];

                    //set session
                    $_SESSION['email'] = $row['email'];
                    $email = $_SESSION['email']; 
                }
    
                header("location: admin-dash.php");
            }

        }
    }
}
?>