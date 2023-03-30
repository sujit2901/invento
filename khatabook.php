<?php include 'header.php'; ?>

  <div class="content">
  <a href="updatebook.php"><button class="data-button"><i class="fa-solid fa-download"></i> &nbsp;Update Book</button></a>
  <button class="open-button" onclick="openForm()"><i class="fa-solid fa-plus"></i> &nbsp;WRITE IN KHATABOOK</button>

<div class="form-popup" id="myForm">
  <form action="./class/processor.php" class="form-container p-3" method="POST" enctype="multipart/form-data">
    <h2>WRITE IN KHATA</h2>
    <hr class="my-3">
    <label class="my-3" for="category_name"><b>Name </b></label>
    <input class="my-3" type="text" placeholder="Enter  customer name" name="name" required>

    <label class="my-3" for="psw"><b>Amount type:</b></label>
    <select name="type">
        <option value="pending">pending</option>
        <option value="paid">paid</option>
    </select>
    <label class="my-3" for="psw"><b>Amount:</b></label>
    <input class="my-3" type="number" placeholder="Enter the Amount" name="amount" required>
    
   

    <button name="write_book" type="submit" class="btn">WRITE
    </button>
    <button type="button" class="btn cancel" onclick="closeForm()">CANCEL</button>
  </form>
</div>
<div class="row m-3 p-3"> </div>
<?php
$myfile = fopen("./class/khatabook.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("./class/khatabook.txt"));
fclose($myfile);
?>


    <div>
    
  </div>
  
<?php include 'footer.php'; ?>