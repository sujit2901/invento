<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/style.css">
<title> Register </title>
</head>

<body class="login-color">
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>Register</h3>
            <p>Please enter your Details.</p>
          </div>
        </div>
        <form class="user_register" action="class/processor.php" method="POST" enctype="multipart/form-data">
          <input type="email" id="email" name="email" placeholder="email"/>
          <input type="password" id="password" name="password" placeholder="password"/>
          <input type="password" id="confirm_password" name="confirm_password" placeholder="confirm password"/>
          <button  type="submit" name="user_register">Register</button>
          <p class="message">Already registered? <a href="login.php">Login</a></p>
        </form>
      </div>
    </div>
 
</body>

</html>