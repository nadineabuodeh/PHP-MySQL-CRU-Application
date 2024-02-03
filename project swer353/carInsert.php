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
$model=$_POST['model'];
$year=$_POST['year'];
$made=$_POST['made'];


if (!filter_var($year, FILTER_VALIDATE_INT) ) {
    echo '<script>alert("Year must be an integer")</script>';
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


//  swal("Hello world!");
$check_sql = "SELECT * FROM car WHERE name = '$first'";
$check_result = $conn->query($check_sql);


if ($check_result->num_rows > 0) {

  
    // 'first' already exists, handle accordingly (e.g., show an error message)
    // header("Location: addressTRY.html");
    echo '<script>alert("Name already exist")</script>';

  
}
else{

    $check_sql_1 = "SELECT * FROM manufacture WHERE name = '$made'";
    $check_result_1 = $conn->query($check_sql_1);
    
    if ($check_result_1->num_rows == 0) {
    
      
    echo '<script>alert("The manufacture made is not exist")</script>';
    
    
    }
    else{

echo '<script>alert("Inserted sucessfuly")</script>';
$sql = "INSERT INTO car values('$first' ,  ' $model ','$year','$made' )";

$result = $conn->query($sql);



    }
}
exit();

?>

</html>