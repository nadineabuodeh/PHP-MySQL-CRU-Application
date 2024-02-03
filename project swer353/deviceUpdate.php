<?php

session_start();
if(isset($_SESSION['name'])){

}
else{
  header ('Location: log.php');
}



$first=$_POST['updatefirst'];
$name=$_POST['updatename'];
$price=$_POST['updateprice'];
$weight=$_POST['updateweight'];
$made=$_POST['updatemade'];



$isInt1 = (is_numeric($first) && (int) $first == $first);



if ($isInt1==false  ) {
    echo '<script>alert("No must be an integer")</script>';
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

$check_sql = "SELECT * FROM device WHERE no = '$first'";
$check_result = $conn->query($check_sql);

if ($check_result->num_rows >0) {



    while ($row = $check_result->fetch_assoc()) {
        // Access the data for each row
        $first1 = $row['no'];
        $name1 = $row['name'];
        $price1= $row['price'];
        $weight1= $row['weight'];
        $made1= $row['made'];
        
    }


    if($name==null){
        $name=$name1;

    } if($price==null){
        $price=$price1;

    } if($weight==null){
        $weight=$weight1;

    } if($made==null){
        $made=$made1;
    }



    $isInt2 = (is_numeric($price) && (int) $price == $price);
    $isInt3 = (is_numeric($weight) && (int) $weight == $weight);
    
    
    if ($isInt2==false ||$isInt3==false ) {
        echo '<script>alert(" Price and Made must be an integers")</script>';
        exit();
    }




    $check_sql_1 = "SELECT * FROM manufacture WHERE name = '$made'";
    $check_result_1 = $conn->query($check_sql_1);
    
    if ($check_result_1->num_rows == 0) {
    
      
    echo '<script>alert("The Manufacture made is not exist")</script>';
    
    
    }
    else{
    
        echo '<script>alert("Update successfuly")</script>';
    $sql = "UPDATE device SET no='$first', name='$name', price='$price', weight='$weight', made='$made' WHERE no='$first'";

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
