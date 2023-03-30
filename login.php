
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/style.css">
<title> Login </title>
<?php
  session_start();

  if(isset($_SESSION['email']) && isset($_SESSION['password']))
  {
  echo "<script>window.location.href = 'http://localhost:8080/invento';</script>";
  }
  ?>
</head>

<body class="login-color">
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>LOGIN</h3>
            <p>Please enter your credentials to login.</p>
          </div>
        </div>
        <form class="user_login" action="class/processor.php" method="POST" enctype="multipart/form-data">
          <input name="email" type="text" placeholder="username"/>
          <input name="password" type="password" placeholder="password"/>
          <button name="user_login" type="sumbit">login</button>
          <p class="message">Not registered? <a href="register.php">Create an account</a></p>
        </form>
      </div>
    </div>
</body>

</html>