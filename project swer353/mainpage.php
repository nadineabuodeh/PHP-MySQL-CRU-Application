
<?php

session_start();
if(isset($_SESSION['name'])){

}
else{
  header ('Location: log.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.
    gstatic.com">
    <Link href="https://fonts.googLeapis.com/
    css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

    <Link rel="stylesheet" href="style.css">


    
    <title>Lab 10</title>
    <style>
       
*, *::before, *::after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body {
    font-family: Arial, Helvetica, sans-serif;
    width: 100%;
    min-height: 100vh;
    background: url("car_backTabel.png") no-repeat;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}
nav{
    height: 0vh;
    width: 70vw;
    min-width: 600px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    margin: auto;
}
a{
    position: relative;
    text-decoration: none;
    font-family:'Poppins',sans-serif ;
    color: #a0a0a0;
    font-size: 18px;
    letter-spacing: 0.5px;
    padding: 0 10px;

}
a:after{
    content: "";
    position: absolute;
    background-color:#D00D11;
    height: 3px;
    width: 0%;
    left: 0;
    bottom: -10px;
    transition: 0.3s;
}
a:hover{
    color: #ffffff;
}
a:hover:after{
    width: 100%;

}
h1{
    padding-top: 20px;
}
h1,h2{
    color: white;    
    margin-top: 10px;
}



@media screen and (max-width: 800px) {
    nav {
    height: 50vh;
    width: 70vw;
    min-width: 600px;
    display: flex;
    flex-direction: column; /* Change to column direction */
    align-items: center;
    justify-content: space-around;
    margin: auto;
}


   nav a{
    display: block;
   }  
            
}@media screen and (max-width: 530px) {
    nav {
  
    width: 70vw;
    min-width: 600px;
    display: flex;
    flex-direction: column; /* Change to column direction */
    align-items: center;
    justify-content: space-around;
    margin: auto;
   
}


   nav a{
    display: block;
   }  
           
}


    </style>

    </head>


<body>
 
       
    <h1>Welcome to the Cars Company</h1>
        <h2>Choose the data you want to see</h2>
   
    
        <nav class="links-container">
            <a href="carView.php" class="link" >Car</a>
        
            <a href="addressTRY.php" class="link" >Address</a>
           
            <a href="car_partView.php" class="link" >Car_Part</a>
          
            <a href="customerView.php" class="link" >Customer</a>

            <a href="deviceView.php">Device</a>

            <a href="manufactureView.php">Manufacture</a>

            <a href="ordersView.php">Orders</a>
        </nav>
        <a href="logout.php">Log out</a>
    
</body>

</html>


