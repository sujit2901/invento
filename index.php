<?php include 'header.php'; ?>
<?php
if(isset($_GET['delete-product']) && isset($_GET['id'])){
  $id=$_GET['id'];
  $delete = "delete from product where prodid=$id";
  // echo $delete;
  if($db->sql($delete)){
    echo "<script>alert('deleted product sucessfully');</script>";
    echo "<script>window.location.href = 'http://localhost:8080/invento';</script>";
  }
  else{
    echo "<script>alert('failed to Delete');</script>";
    echo "<script>window.location.href = 'http://localhost:8080/invento';</script>";
  }
}
?>


  <div class="content">
    <div class="row p-3">
      <div class="column">
        <div class="card">
          <h1 class="text-light">
            <?php
            $query = "select * from category";
            $db->sql($query);
            $catdetails=$db->result();
            echo $db->numrows();
            ?>
            </h1>
          <p class="text-light">No of category</p>
          
        </div>
      </div>

      <div class="column">
        <div class="card">
          <h1 class="text-light"> <?php
            $query = "select * from product";
            $db->sql($query);
            $catdetails=$db->result();
            echo $db->numrows();
            ?></h1>
          <p class="text-light">No of product</p>
          
        </div>
      </div>
      
      <div class="column">
        <div class="card">
          <h1 class="text-light"> <?php
            $query = "select * from product where qty<10";
            $db->sql($query);
            $catdetails=$db->result();
            echo $db->numrows();
            ?></h1>
          <p class="text-light">No of product Out of stock</p>
          
        </div>
      </div>
      
      
    </div>
    <div class="form-popup" id="myForm">
      <form action="class/processor.php" class="form-container p-3" method="POST" enctype="multipart/form-data">
        <h2>update Product</h2>
        <hr class="my-3">

        <label class="my-3" for="category_name"><b>Product Name</b></label>
        <input class="my-3" type="text" placeholder="Enter category name" name="category_name" required>

        <label class="my-3" for="psw"><b>product Image</b></label>
        <input class="my-3" type="file" placeholder="select category image" name="category_image" required>

        <button type="submit" name="add_category" class="btn">Update Product</button>
        <button type="button" class="btn cancel" onclick="closeForm()">CANCEL</button>
      </form>
    </div>
    <div class="row p-3 m-3 table-card">
      <h3 style="text-align:left;padding:0.3rem;"> Out Of Stock Product</h3>
      <div style="overflow-x:auto;">
      <table>
          <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Category</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Updated At</th>
            <th>Action</th>
          </tr>
          <?php
          if(!isset($_GET['page']))
          {
              $page=1;
              $_GET['page']=1;
          
          }
          else{
              $_GET['page'];
          }
          $query='select count(prodid) AS total from product where qty<10';
          $db->sql($query);
          $total_records=$db->result();
          $total_records = $total_records[0]['total'];
          $res_per_page=3;
          $number_of_pages=ceil($total_records/$res_per_page);
          // echo "<br> Total Pages=".$number_of_pages."<br>";
          $limit_query='select * from product where qty<10 limit '.($_GET['page']-1)*$res_per_page.",".$res_per_page;
          // echo $limit_query;
              if ($db->sql($limit_query)) {
            // print_r($db->result());
                $result = $db->result();
            
                if ($db->numrows() > 0) {
                    foreach ($result as $key => $row) {
                                ?>
          <tr>
            <td><?php echo $row['prodid'];?></td>
            <td><?php echo $row['prodname'];?></td>
            <td><img src="assets/images/product/<?php echo $row['prodimage'];?>" width="100" height="100"></td>
            <td><?php echo $row['category'];?></td>
            <td><?php if ($row['qty'] == 0) {
              echo "<p style='color:red'>out of stock</p>";} else {echo "<p style='color:red'>".$row['qty']." item left</p>";}?></td>
            <td><?php echo $row['price'];?></td>
            <td><?php echo $row['updated_at'];?></td>
            <td><a href="updateproduct.php?id=<?php echo $row['prodid']?>"><input class="color-success" type="button" value="update"></a> <a href="index.php?delete-product=true&id=<?php echo $row['prodid']?>"><input class="color-danger" type="button" value="delete"></a> </td>
          </tr>
          <?php
               }
              }
            }
          ?>
        </table>
      </div>
      <div class="pagination">
      <?php

if ($_GET['page']==1){

}
else{
    echo "<a class='active' href='product.php?page=".($_GET['page']-1)."'>&laquo;</a>";
}

for ($i=1;$i<=$number_of_pages;$i++){
    echo "<a  href='product.php?page=".$i."'>".$i."</a>";
}
if ($_GET['page']==$number_of_pages){

}
else{
    echo "<a class='active' href='product.php?page=".($_GET['page']+1)."'>&raquo;</a>";
}
?>
      </div>

    <div>
    
  </div>
  
<?php include 'footer.php'; ?>