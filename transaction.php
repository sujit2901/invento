<?php include 'header.php'; ?>
  <div class="content">

  <button class="open-button" onclick="openForm()"><i class="fa-solid fa-plus"></i> &nbsp;ADD TRANSACTION</button>

<div class="form-popup" id="myForm">
  <form action="./class/processor.php" method="POST" enctype="multipart/form-data" class="form-container p-3">
    <h2>Add TRANSACTION</h2>
    <hr class="my-3">

    <label class="my-3" for="product_name"><b>Dealer Name </b></label>
    <select class="my-3" name="dealer">
      <?php
      $query = 'select dealerid,dealername from dealer';
      if($db->sql($query))
      {
        $result = $db->result();
        if($db->numrows()>0){
          foreach($result as $key=>$row){
            ?>
            <option value="<?php echo $row['dealerid']?>"><?php echo $row['dealername'];?> (<?php echo $row['dealerid']?>)</option>

            <?php

          }
        }
      }
      ?>
      
    </select>
    <label class="my-3" for="category_name"><b>Product Name </b></label>
    <select class="my-3" name="product">
      <?php
      $query = 'select prodid,prodname from product';
      if($db->sql($query))
      {
        $result = $db->result();
        if($db->numrows()>0){
          foreach($result as $key=>$row){
            ?>
            <option value="<?php echo $row['prodid']?>"><?php echo $row['prodname'];?> (<?php echo $row['prodid']?>)</option>

            <?php

          }
        }
      }
      ?>
      
    </select>
    

    <label class="my-3" for="psw"><b>Qty</b></label>
    <input class="my-3" type="number" placeholder="Enter quantity" name="qty" required>
    
    <label class="my-3" for="psw"><b>Price</b></label>
    <input class="my-3" type="number" placeholder="Enter Price" name="price" required>
    
   

    <button type="submit" name="add_transaction" class="btn">ADD TRANSACTION
    </button>
    <button type="button" class="btn cancel" onclick="closeForm()">CANCEL</button>
  </form>
</div>
<div class="row m-3 p-3"> </div>
    <div class="row p-3 m-3 table-card">
      <h3 style="text-align:left;padding:0.3rem;"> Transaction</h3>
      <div style="overflow-x:auto;">
        <table>
          <tr>
            <th>Transaction Id</th>
            <th>Dealer Id</th>
            <th>Product Id</th>
            <th>Qty</th>
            <th>Price</th>
            <th>created At</th>
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
          $query='select count(transcationid ) AS total from transaction';
          $db->sql($query);
          $total_records=$db->result();
          $total_records = $total_records[0]['total'];
          $res_per_page=3;
          $number_of_pages=ceil($total_records/$res_per_page);
          // echo "<br> Total Pages=".$number_of_pages."<br>";
          $limit_query='select * from transaction limit '.($_GET['page']-1)*$res_per_page.",".$res_per_page;
          // echo $limit_query;
              if ($db->sql($limit_query)) {
            // print_r($db->result());
                $result = $db->result();
            
                if ($db->numrows() > 0) {
                    foreach ($result as $key => $row) {
                                ?>
          <tr>
            <td><?php echo $row['transcationid']?></td>
            <td><?php echo $row['dealer']?></td>
            <td><?php echo $row['product']?></td>
            <td><?php echo $row['qty']?></td>
            <td><?php echo $row['price']?></td>
            <td><?php echo $row['created_at']?></td>
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
    echo "<a class='active' href='transaction.php?page=".($_GET['page']-1)."'>&laquo;</a>";
}

for ($i=1;$i<=$number_of_pages;$i++){
    echo "<a  href='transaction.php?page=".$i."'>".$i."</a>";
}
if ($_GET['page']==$number_of_pages){

}
else{
    echo "<a class='active' href='transaction.php?page=".($_GET['page']+1)."'>&raquo;</a>";
}
?>
      </div>

    <div>
    
  </div>
  
<?php include 'footer.php'; ?>