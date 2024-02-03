<html>

<head>
<style>
 

</style>
</head>
<?php
session_start();


$uname1=$_POST['uname'];
$pas=$_POST['psw'];
$ecnr_psw=md5($pas);

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

$check_sql_1 = "SELECT * FROM log_in WHERE name = '$uname1'";
$check_result_1 = $conn->query($check_sql_1);
$check_sql_2 = "SELECT * FROM log_in WHERE password = '$ecnr_psw'";
$check_result_2 = $conn->query($check_sql_2);

if ($check_result_1->num_rows ==0){

  echo "<script>alert('Username doesn`t exist');window.location.href = 'log.php';</script>";
 
}
elseif ($check_result_1->num_rows ==0 || $check_result_2->num_rows ==0) {

 
     echo "<script>alert('Username or Password is wrong');window.location.href = 'log.php';</script>";
    
}
else{

// $result = $conn->query($sql);
$sql = "SELECT * FROM log_in WHERE name = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $uname1, $ecnr_psw);
$stmt->execute();
$result = $stmt->get_result();

if  ($result->num_rows > 0){
  $_SESSION['name']=$uname1;

   header('Location: mainpage.php');
} else{
  header('Location: loginView.html') ;      
}
}

?>
<br>

</html>