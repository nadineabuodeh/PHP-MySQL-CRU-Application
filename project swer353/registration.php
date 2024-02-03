<html>

<head>
<style>
 

</style>
</head>
<?php
function validatePassword($password) {
  // Password should be at least 8 characters long
  // Should contain at least one capital letter
  // Should contain at least one number
  $pattern = '/^(?=.*[A-Z])(?=.*\d).{8,}$/';

  return preg_match($pattern, $password);
}



$uname1=$_POST['uname'];
$pas=$_POST['psw'];

// Example usage:
$password = "Abcdefg1"; // Replace this with the user's input

if (validatePassword($pas)) {
  echo "Password is valid.";





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


if ($check_result_1->num_rows > 0) {

  
    // 'first' already exists, handle accordingly (e.g., show an error message)
    // header("Location: addressTRY.html");
 
    //  echo '<script>alert("Username already exist")</script>';    
    //  header("Location: signup.php"); 

    echo "<script>alert('Username already exist');window.location.href = 'signup.php';</script>";
    
}
else{
// echo '<script>alert("Signed up successfuly")</script>';
$sql = "INSERT INTO log_in values('".$uname1 . "' ,  '". $ecnr_psw . "' )";

$result = $conn->query($sql);

echo "<script>alert('Signed up successfuly');window.location.href = 'log.php';</script>";

// header("Location: log.php"); 
}




} else {
 // echo "Password is not valid. It should be at least 8 characters long and contain at least one capital letter and one number.";
 echo "<script>alert('password should contain 8 character at least one number and one captel letter');window.location.href = 'signup.php';</script>";
 
}

exit();

?>

</html>