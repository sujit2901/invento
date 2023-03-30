
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="html5-qrcode.min.js"></script>
    <style>
      .result{
        background-color: green;
        color:#fff;
        padding:20px;
      }
      
    </style>
    <title>Home</title>
    <?php
  session_start();
  include("./config/conn.php");
  
  if(isset($_SESSION['email']) && isset($_SESSION['password']))
  {
 
  }
  else{
    echo "<script>window.location.href ='http://localhost:8080/invento/login.php';</script>";
  }
  if (isset($_GET['logout'])){
      unset($_SESSION['email']);
      unset($_SESSION['password']);
      session_destroy();
      echo "<script>window.location.href ='http://localhost:8080/invento/login.php';</script>";
  }
  $db = new database();
$db->connect();

  ?>
  </head>
<body>



  <div class="sidebar">
    <a><img class="logo" src="assets/images/logo/logo.png"></a>
    <a class="active" href="index.php"><i class="fa-solid fa-table-cells-large"></i> Dashboard</a>
    <a href="category.php"><i class="fa-solid fa-list"></i> Category</a>
    <a href="product.php"><i class="fa-solid fa-briefcase"></i> Product</a>
    <a href="dealer.php"><i class="fa-solid fa-user-secret"></i> Dealer</a>
    <a href="transaction.php"><i class="fa-solid fa-wallet"></i> Transaction</a>
    <a href="Khatabook.php"><i class="fa-solid fa-book"></i> Khatabook</a>
    <a href="scan.php"><i class="fa-solid fa-qrcode"></i> Scan </a>
    <a href="index.php?logout=true"><i class="fa-solid fa-right-from-bracket"></i> Logout </a>
  </div>