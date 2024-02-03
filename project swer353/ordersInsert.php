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
$date=$_POST['date'];
$customer=$_POST['customer'];
$car=$_POST['car'];



if (!filter_var($first, FILTER_VALIDATE_INT) || !filter_var($date, FILTER_VALIDATE_INT)|| !filter_var($customer, FILTER_VALIDATE_INT) ) {
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
$check_sql = "SELECT * FROM orders WHERE id = '$first'";
$check_result = $conn->query($check_sql);


if ($check_result->num_rows > 0) {

  
    // 'first' already exists, handle accordingly (e.g., show an error message)
    // header("Location: addressTRY.html");
    echo '<script>alert("ID already exist")</script>';

  
}
else{

    $check_sql_1 = "SELECT * FROM customer WHERE id = '$customer'";
    $check_result_1 = $conn->query($check_sql_1);

    $check_sql_2 = "SELECT * FROM car WHERE name = '$car'";
    $check_result_2 = $conn->query($check_sql_2);
    if($check_result_1->num_rows == 0 && $check_result_2->num_rows == 0){
    
        echo '<script>alert("The Customer and the Car are not exist")</script>';
    }
    
    else if ($check_result_1->num_rows == 0 ) {
    
      
    echo '<script>alert("The Customer is not exist")</script>';
    
    
    }else if($check_result_2->num_rows == 0){
        echo '<script>alert("The Car is not exist")</script>';
    }
    else{

echo '<script>alert("Inserted sucessfuly")</script>';
$sql = "INSERT INTO orders values('$first',' $date ','$customer','$car' )";

$result = $conn->query($sql);



    }
}
exit();

?>

</html>