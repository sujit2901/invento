<?php include 'header.php'; ?>
  <div class="content" style="display:flex;align-items:center;justify-content-center;">
  

<div class="form-popup" id="myForm">
  <form action="./class/processor.php" class="form-container p-3" method="POST" enctype="multipart/form-data">
    <h2>Add Product</h2>
    <hr class="my-3">

    <label class="my-3" for="product_name"><b>product ID</b></label>
    <input class="my-3" type="number" placeholder="Enter product name" id="product-id" name="product_id" required>

    <label class="my-3" for="psw"><b>Product qty</b></label>
    <input class="my-3" type="number" placeholder="select product image" name="qty" required>
    
   

    <button name="update_product" type="submit" class="btn">UPDATE STOCK</button>
    <button type="button" class="btn cancel" onclick="closeForm()">CANCEL</button>
  </form>
</div>

<div class="row" >
  <div class="col">
    <div style="width:500px;" id="reader"></div>
  </div>
  <!-- <div class="col" style="padding:30px;">
    <h4>SCAN RESULT</h4>
    <div id="result">Result Here</div>
  </div> -->
</div>
    
  </div>
  
<?php include 'footer.php'; ?>
