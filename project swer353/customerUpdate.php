<?php
session_start();
if(isset($_SESSION['name'])){

}
else{
  header ('Location: log.php');
}



$first=$_POST['updatefirst'];
$f_name=$_POST['updatef_name'];
$l_name=$_POST['updatel_name'];
$address=$_POST['updateaddress'];
$job=$_POST['updatejob'];


$isInt1 = (is_numeric($first) && (int) $first == $first);



if ($isInt1==false  ) {
    echo '<script>alert("ID must be an integer")</script>';
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ass2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$check_sql = "SELECT * FROM customer WHERE id = '$first'";
$check_result = $conn->query($check_sql);

if ($check_result->num_rows >0) {


    while ($row = $check_result->fetch_assoc()) {
        // Access the data for each row
        $first1 = $row['id'];
        $f_name1 = $row['f_name'];
        $l_name1= $row['l_name'];
        $address1= $row['address'];
        $job1= $row['job'];
        
    }


    if($f_name==null){
        $f_name=$f_name1;

    } if($l_name==null){
        $l_name=$l_name1;

    } if($address==null){
        $address=$address1;

    } if($job==null){
        $job=$job1;
    }



    $isInt2 = (is_numeric($address) && (int) $address == $address);


    if ($isInt2==false ) {
        echo '<script>alert("Address must be an integer")</script>';
        exit();
    }












    $check_sql_1 = "SELECT * FROM address WHERE id = '$address'";
    $check_result_1 = $conn->query($check_sql_1);
    
    if ($check_result_1->num_rows == 0) {
    
      
    echo '<script>alert("The Address is not exist")</script>';
    
    
    }
    else{
    
        echo '<script>alert("Update successfuly")</script>';
    $sql = "UPDATE customer SET id='$first', f_name='$f_name', l_name='$l_name', address='$address', job='$job' WHERE id='$first'";

    $result = $conn->query($sql);

    if (!$result) {
        die("Error executing query: " . $conn->error);
    } else {
        echo '<script>alert("Update successfuly")</script>';
       
    }
}

} else {echo '<script>alert("The ID does not exist")</script>';
}

$conn->close();

exit();
?>
