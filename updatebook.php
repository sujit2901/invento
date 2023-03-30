
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/style.css">
<title> update-book </title>
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
        <h2>update Book</h2>
        <hr class="my-3">
       
        <label class="my-3" for="category_name"><b>Khatabook</b></label>
        <textarea rows=10 class="my-3" name="book" style="width:100%;" required>
            <?php
$myfile = fopen("./class/khatabook.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("./class/khatabook.txt"));
fclose($myfile);
?></textarea>

        <button type="submit" name="update_book" class="btn">Update Product</button>
        <button type="button" class="btn cancel" onclick="closeForm()">CANCEL</button>
      </form>
    </div>
    <script>
      document.getElementById("myForm").style.display = "block";
    </script>

</html>