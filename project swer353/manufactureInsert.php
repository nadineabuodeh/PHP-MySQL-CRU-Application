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
$type=$_POST['type'];
$city=$_POST['city'];
$country=$_POST['country'];





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
$check_sql = "SELECT * FROM manufacture WHERE name = '$first'";
$check_result = $conn->query($check_sql);


if ($check_result->num_rows > 0) {

  
    // 'first' already exists, handle accordingly (e.g., show an error message)
    // header("Location: addressTRY.html");
    echo '<script>alert("Name already exist")</script>';

  
}
else{

   

echo '<script>alert("Inserted sucessfuly")</script>';
$sql = "INSERT INTO manufacture values('$first',' $type ','$city','$country' )";

$result = $conn->query($sql);



    }

exit();

?>

</html>