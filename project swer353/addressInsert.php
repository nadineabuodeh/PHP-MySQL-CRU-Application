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
$building=$_POST['building'];
$street=$_POST['street'];
$city=$_POST['city'];
$country=$_POST['country'];

if (!filter_var($building, FILTER_VALIDATE_INT) ||  !filter_var($first, FILTER_VALIDATE_INT)) {
    echo '<script>alert("Building and ID must be an integer")</script>';
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ass2";


// Check if 'first' value already exists in the table


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);




// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  
}


//  swal("Hello world!");
$check_sql = "SELECT * FROM address WHERE id = '$first'";
$check_result = $conn->query($check_sql);


if ($check_result->num_rows > 0) {

    echo '<script>alert("ID already exist")</script>';

  
}
else{

echo '<script>alert("Inserted sucessfuly")</script>';
$sql = "INSERT INTO address values('$first' ,  ' $building ','$street','$city','$country' )";

$result = $conn->query($sql);

}
exit();

?>

</html>