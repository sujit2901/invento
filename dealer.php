<?php include 'header.php'; ?>
  <div class="content">
  <button class="open-button" onclick="openForm()"><i class="fa-solid fa-plus"></i> &nbsp;ADD DEALER</button>

<div class="form-popup" id="myForm">
  <form action="./class/processor.php" method="POST" enctype="multipart/form-data" class="form-container p-3">
    <h2>Add Dealer
    </h2>
    <hr class="my-3">

    <label class="my-3" for="dealer_name"><b>Dealer Name </b></label>
    <input class="my-3" type="text" placeholder="Enter product name" name="dealer_name" required>

    <label class="my-3" for="contact number"><b>Contact Number</b></label>
    <input class="my-3" type="number" placeholder="Enter contact number" name="dealer_phone" required>

    <label class="my-3" for="category_email"><b>Dealer Email</b></label>
    <input class="my-3" type="email" placeholder="Enter Dealer Email" name="dealer_email" required>
      
    <button type="submit" name="add_dealer" class="btn">ADD DEALER</button>
    <button type="button" class="btn cancel" onclick="closeForm()">CANCEL</button>
  </form>
</div>
<div class="row m-3 p-3"> </div>
    <div class="row p-3 m-3 table-card">
      <h3 style="text-align:left;padding:0.3rem;"> DEALER</h3>
      <div style="overflow-x:auto;">
        <table>
          <tr>
            <th>Dealer Id</th>
            <th>Dealer Name</th>
            <th>Dealer number</th>
            <th>Dealer Email</th>
            <th>Created at</th>
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
          $query='select count(dealerid) AS total from dealer';
          $db->sql($query);
          $total_records=$db->result();
          $total_records = $total_records[0]['total'];
          $res_per_page=3;
          $number_of_pages=ceil($total_records/$res_per_page);
          // echo "<br> Total Pages=".$number_of_pages."<br>";
          $limit_query='select * from dealer limit '.($_GET['page']-1)*$res_per_page.",".$res_per_page;
          // echo $limit_query;
              if ($db->sql($limit_query)) {
            // print_r($db->result());
                $result = $db->result();
            
                if ($db->numrows() > 0) {
                    foreach ($result as $key => $row) {
                                ?>
          <tr>
            <td><?php echo $row['dealerid']?></td>
            <td><?php echo $row['dealername']?></td>
            <td><?php echo $row['dealerphone']?></td>
            <td><?php echo $row['dealeremail']?></td>
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
    echo "<a class='active' href='dealer.php?page=".($_GET['page']-1)."'>&laquo;</a>";
}

for ($i=1;$i<=$number_of_pages;$i++){
    echo "<a  href='dealer.php?page=".$i."'>".$i."</a>";
}
if ($_GET['page']==$number_of_pages){

}
else{
    echo "<a class='active' href='dealer.php?page=".($_GET['page']+1)."'>&raquo;</a>";
}
?>
      </div>

    <div>
    
  </div>
  
<?php include 'footer.php'; ?>