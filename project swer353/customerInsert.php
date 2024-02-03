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
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$address=$_POST['address'];
$job=$_POST['job'];


if (!filter_var($first, FILTER_VALIDATE_INT) || !filter_var($address, FILTER_VALIDATE_INT) ) {
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


//  swal("Hello world!");
$check_sql = "SELECT * FROM customer WHERE id = '$first'";
$check_result = $conn->query($check_sql);


if ($check_result->num_rows > 0) {

  
    // 'first' already exists, handle accordingly (e.g., show an error message)
    // header("Location: addressTRY.html");
    echo '<script>alert("ID already exist")</script>';

  
}
else{

    $check_sql_1 = "SELECT * FROM address WHERE id = '$address'";
    $check_result_1 = $conn->query($check_sql_1);
    
    if ($check_result_1->num_rows == 0) {
    
      
    echo '<script>alert("The Address is not exist")</script>';
    
    
    }
    else{

echo '<script>alert("Inserted sucessfuly")</script>';
$sql = "INSERT INTO customer values('$first',' $f_name ','$l_name','$address','$job' )";

$result = $conn->query($sql);



    }
}
exit();

?>

</html>