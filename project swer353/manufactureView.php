

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
    <link rel="stylesheet" href="steel.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



    <title>Customer</title>
</head>

<body>
    <div id="head">
<a  href="mainpage.php" id="back">Back</a>
<br>
    <h1>Welcome to Manufacture table</h1></div>

    <div class="container">
        <div class="search">
            <h4>Search</h4>
            <label>Manufacture Name</label>
            <input type="text" id="carName">
            <br>
            <button id="searchButton">Search</button>
            <br><br>
        </div>
        <div class="insert">
            <form id="insertForm">
                <h4>Insert</h4>
                <label>Name</label>
                <input type="text" name="first" >
                <br>
                <label>Type</label>
                <input type="text" name="type" >
                <br>
                <label>City</label>
                <input type="text" name="city" >
                <br>
                <label>Country</label>
                <input type="text" name="country" >
                <br>
                
                <button type="submit" id="insertButton">Insert</button>
            </form>
        </div>
        <div class="update">
            <form id="updateForm">
            <h4>Update</h4>
                <label>Name</label>
                <input type="text" name="updatefirst" >
                <br>
                <label>Type</label>
                <input type="text" name="updatetype" >
                <br>
                <label>City</label>
                <input type="text" name="updatecity" >
                <br>
                <label>Country</label>
                <input type="text" name="updatecountry" >
                <br>
            
            <button type="submit" id="updateButton">Update</button>
        </form>
        </div>
        <div id="searchDiv"></div>
    
    </div>

    <script>
        $(document).ready(function () {
            $.post("manufacture.php", function (data, status) {
                $("#searchDiv").html(data);
            });



            $("#searchButton").click(function () {
                $.post("manufactureSearch.php", {
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
                $.post("manufactureInsert.php", formData, function (data, status) {
                    $("#searchDiv").html(data);
                });
            });

          

            
            $("#updateButton").click(function (event) {
            var formData = $("#updateForm").serialize();

            // Check if the ID is provided
            if ($("#updateForm input[name='updatefirst']").val().trim() === "") {
                alert("Please fill in the ID");
                return;
            }

            $.post("manufactureUpdate.php", formData, function (data, status) {
                $("#searchDiv").html(data);
            });
        });

    

        });
    </script>
</body>

</html>
