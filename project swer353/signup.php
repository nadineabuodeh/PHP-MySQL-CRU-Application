<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }
  html{
    scroll-behavior: smooth;
  }
  body {
    font-family: Arial, Helvetica, sans-serif;
    width: 100%;
    min-height: 100vh;
    display: flex;
    background: url("car_singup.png") no-repeat;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
  }
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  box-sizing: border-box;
}

button {
  background-color: #D00D11;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.container {
  padding: 16px;
}

form{
  margin-left: 31%;
  margin-top: 16%;
}
label{
  color: white;
}
a {
  color: #D00D11;
}
</style>
</head>
<body>

<form action="registration.php" method="post">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <p style="color: white;">do you have an account? <a href="log.php">Log in</a></p>

    <button type="submit">Register</button>
  </div>
</form>

</body>
</html>