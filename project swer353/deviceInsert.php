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
$name=$_POST['name'];
$price=$_POST['price'];
$weight=$_POST['weight'];
$made=$_POST['made'];


if (!filter_var($first, FILTER_VALIDATE_INT) || !filter_var($price, FILTER_VALIDATE_INT) || !filter_var($weight, FILTER_VALIDATE_INT) ) {
    echo '<script>alert("No, Price and Made must be an integers")</script>';
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
$check_sql = "SELECT * FROM device WHERE no = '$first'";
$check_result = $conn->query($check_sql);


if ($check_result->num_rows > 0) {

  
    // 'first' already exists, handle accordingly (e.g., show an error message)
    // header("Location: addressTRY.html");
    echo '<script>alert("NO already exist")</script>';

  
}
else{

    $check_sql_1 = "SELECT * FROM manufacture WHERE name = '$made'";
    $check_result_1 = $conn->query($check_sql_1);
    
    if ($check_result_1->num_rows == 0) {
    
      
    echo '<script>alert("The Manufacture made is not exist")</script>';
    
    
    }
    else{

echo '<script>alert("Inserted sucessfuly")</script>';
$sql = "INSERT INTO device values('$first',' $name ','$price','$weight','$made' )";

$result = $conn->query($sql);



    }
}
exit();

?>

</html>