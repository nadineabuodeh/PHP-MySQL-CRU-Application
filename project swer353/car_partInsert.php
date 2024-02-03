<html>

<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style>
 

</style>
</head>
<?php

session_start();
if(isset($_SESSION['name'])){

}
else{
  header ('Location: log.php');
}




$first=$_POST['first'];
$part=$_POST['part'];




if (!filter_var($part, FILTER_VALIDATE_INT)  ) {
    echo '<script>alert("ID and Address must be an integers")</script>';
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ass2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);




// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  
}




    $check_sql_1 = "SELECT * FROM car WHERE name = '$first'";
    $check_result_1 = $conn->query($check_sql_1);

    $check_sql_2 = "SELECT * FROM device WHERE no = '$part'";
    $check_result_2 = $conn->query($check_sql_2);
    if($check_result_1->num_rows == 0 && $check_result_2->num_rows == 0){
    
        echo '<script>alert("The Car and the Part are not exist")</script>';
    }
    
    else if ($check_result_1->num_rows == 0 ) {
    
      
    echo '<script>alert("The Car is not exist")</script>';
    
    
    }else if($check_result_2->num_rows == 0){
        echo '<script>alert("The Part is not exist")</script>';
    }
    else{

echo '<script>alert("Inserted sucessfuly")</script>';
$sql = "INSERT INTO car_part values('$first',' $part ' )";

$result = $conn->query($sql);



    }

exit();

?>

</html>