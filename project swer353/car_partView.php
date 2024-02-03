

<?php

session_start();
if(isset($_SESSION['name'])){

}
else{
  header ('Location: log.php');
}

?>



<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="steel.css">
    <title>Customer</title>
</head>

<body>
    <div id="head">
<a  href="mainpage.php" id="back">Back</a>
<br>
    <h1>Welcome to Car_Part table</h1></div>

    <div class="container">
        <div class="search">
            <h4>Search</h4>
            <label>Car</label>
            <input type="text" id="carName">
            <br>
            <button id="searchButton">Search</button>
            <br><br>
        </div>
        <div class="insert">
            <form id="insertForm">
                <h4>Insert</h4>
                <label>Car</label>
                <input type="text" name="first" >
                <br>
                <label>Part</label>
                <input type="number" name="part" >
                <br>
                         
                <button type="submit" id="insertButton">Insert</button>
            </form>
        </div>
        <div class="update">
            <form id="updateForm">
            <h4>Update</h4>
            <label>Car</label>
                <input type="text" name="updatefirst" >
                <br>
                <label>Update Part to</label>
                <input type="number" name="updatepart" >
                <br>
            
            <button type="submit" id="updateButton">Update</button>
        </form>
        </div>
        <div id="searchDiv"></div>
    
    </div>

    <script>
        $(document).ready(function () {
            $.post("car_part.php", function (data, status) {
                $("#searchDiv").html(data);
            });



            $("#searchButton").click(function () {
                $.post("car_partSearch.php", {
                        carName: $("#carName").val()
                    },
                    function (data, status) {
                        $("#searchDiv").html(data);
                    });
            });

            $("#insertButton").click(function (event) {
       
        var formData = $("#insertForm").serialize();

        // Check if any of the form fields are empty
        if ($("#insertForm input").filter(function () {
            return $(this).val().trim() === "";
        }).length > 0) {
            alert("Please fill in all the information");
            return;
        }
                $.post("car_partInsert.php", formData, function (data, status) {
                    $("#searchDiv").html(data);
                });
            });

          

            $("#updateButton").click(function (event) {
      var formData = $("#updateForm").serialize();
        if ($("#updateForm input").filter(function () {
            return $(this).val().trim() === "";
        }).length > 0) {
            alert("Please fill in all the information");
            return;
        }
                $.post("car_partUpdate.php", formData, function (data, status) {
                    $("#searchDiv").html(data);
                });
            });

    

        });
    </script>
</body>

</html>
