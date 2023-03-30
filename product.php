<?php include 'header.php'; ?>

  <div class="content">
  <a href="export.php?exportdata=true"><button class="data-button"><i class="fa-solid fa-download"></i> &nbsp;Export Data</button></a>
  <button class="open-button" onclick="openForm()"><i class="fa-solid fa-plus"></i> &nbsp;ADD PRODUCT</button>

<div class="form-popup" id="myForm">
  <form action="./class/processor.php" class="form-container p-3" method="POST" enctype="multipart/form-data">
    <h2>Add Product</h2>
    <hr class="my-3">

    <label class="my-3" for="product_name"><b>product Name </b></label>
    <input class="my-3" type="text" placeholder="Enter product name" name="product_name" required>

    <label class="my-3" for="category_name"><b>category Name </b></label>
    <select class="my-3" name="category">
      <?php
      $query = 'select catid,catname from category';
      if($db->sql($query))
      {
        $result = $db->result();
        if($db->numrows()>0){
          foreach($result as $key=>$row){
            ?>
            <option value="<?php echo $row['catid']?>"><?php echo $row['catname'];?> (<?php echo $row['catid']?>)</option>

            <?php

          }
        }
      }
      ?>
      
    </select>
    

    <label class="my-3" for="psw"><b>Product Image</b></label>
    <input class="my-3" type="file" placeholder="select product image" name="product_image" required>
    
   

    <button name="add_product" type="submit" class="btn">ADD PRODUCT</button>
    <button type="button" class="btn cancel" onclick="closeForm()">CANCEL</button>
  </form>
</div>
<div class="row m-3 p-3"> </div>
    <div class="row p-3 m-3 table-card">
      <h3 style="text-align:left;padding:0.3rem;"> Product</h3>
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
          $query='select count(prodid) AS total from product';
          $db->sql($query);
          $total_records=$db->result();
          $total_records = $total_records[0]['total'];
          $res_per_page=3;
          $number_of_pages=ceil($total_records/$res_per_page);
          // echo "<br> Total Pages=".$number_of_pages."<br>";
          $limit_query='select * from product limit '.($_GET['page']-1)*$res_per_page.",".$res_per_page;
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
            <td><?php echo $row['qty'];?></td>
            <td><?php echo $row['price'];?></td>
            <td><?php echo $row['updated_at'];?></td>
            <td><input class="color-success" type="button" value="update"> <input class="color-danger" type="button" value="delete"> </td>
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