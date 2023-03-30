
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/style.css">
<title> update-product </title>
<?php
  session_start();
 if(isset($_SESSION['email']) && isset($_SESSION['password']))
  {
 
  }
  else{
    echo "<script>window.location.href ='http://localhost:8080/invento/login.php';</script>";
  }
  ?>
</head>

<body class="login-color">
    <div class="form-popup" id="myForm">
      <form action="class/processor.php" class="form-container p-3" method="POST" enctype="multipart/form-data">
        <h2>update Product</h2>
        <hr class="my-3">
       <input value="<?php echo $_GET['id'];?>" style="display:none;" name="prodid"> 
        <label class="my-3" for="category_name"><b>Product Name</b></label>
        <input class="my-3" type="text" placeholder="Enter category name" value=" <?php 
        include("./config/conn.php");
          $db = new database();
          $db->connect();
          
        if(isset($_GET['id'])){
          $id=$_GET['id'];
          $query='select * from product where prodid='.$id; 
          // echo $query;
          $db->sql($query);
          $result=$db->result();
          foreach ($result as $key=>$row){
            echo $row['prodname'];
          }

        } ?>" name="product_name" required>

        <label class="my-3" for="psw"><b>product Image</b></label>
        <input class="my-3" type="file" placeholder="select category image" name="product_image" required>

        <button type="submit" name="update_category" class="btn">Update Product</button>
        <button type="button" class="btn cancel" onclick="closeForm()">CANCEL</button>
      </form>
    </div>
    <script>
      document.getElementById("myForm").style.display = "block";
    </script>

</html>