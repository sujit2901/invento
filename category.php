<?php include 'header.php'; ?>
<?php

?>
  <div class="content">
  <button class="open-button" onclick="openForm()"><i class="fa-solid fa-plus"></i> &nbsp;ADD CATEGORY</button>

<div class="form-popup" id="myForm">
  <form action="class/processor.php" class="form-container p-3" method="POST" enctype="multipart/form-data">
    <h2>Add Category</h2>
    <hr class="my-3">

    <label class="my-3" for="category_name"><b>Category Name </b></label>
    <input class="my-3" type="text" placeholder="Enter category name" name="category_name" required>

    <label class="my-3" for="psw"><b>Category Image</b></label>
    <input class="my-3" type="file" placeholder="select category image" name="category_image" required>

    <button type="submit" name="add_category" class="btn">ADD CATEGORY</button>
    <button type="button" class="btn cancel" onclick="closeForm()">CANCEL</button>
  </form>
</div>
<div class="row m-3 p-3"> </div>
    <div class="row p-3 m-3 table-card">
      <h3 style="text-align:left;padding:0.3rem;"> Category</h3>
      <div style="overflow-x:auto;">
        <table>
          <tr>
            <th>Category ID</th>
            <th>Category Name</th>
            <th>Category Image</th>
            <th>Created At</th>
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
          $query='select count(catid) AS total from category';
          $db->sql($query);
          $total_records=$db->result();
          $total_records = $total_records[0]['total'];
          $res_per_page=3;
          $number_of_pages=ceil($total_records/$res_per_page);
          // echo "<br> Total Pages=".$number_of_pages."<br>";
          $limit_query='select * from category limit '.($_GET['page']-1)*$res_per_page.",".$res_per_page;
          // echo $limit_query;
              if ($db->sql($limit_query)) {
            // print_r($db->result());
                $result = $db->result();
            
                if ($db->numrows() > 0) {
                    foreach ($result as $key => $row) {
                                ?>
          <tr>
            <td><?php echo $row['catid']?></td>
            <td><?php echo $row['catname']?></td>
            <td><image src="assets/images/category/<?php echo $row['catimage']?>" width="100" height="100"></td>
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
    echo "<a class='active' href='category.php?page=".($_GET['page']-1)."'>&laquo;</a>";
}

for ($i=1;$i<=$number_of_pages;$i++){
    echo "<a  href='category.php?page=".$i."'>".$i."</a>";
}
if ($_GET['page']==$number_of_pages){

}
else{
    echo "<a class='active' href='category.php?page=".($_GET['page']+1)."'>&raquo;</a>";
}
?>
        <!-- <a href="#">&laquo;</a>
        <a href="#">1</a>
        <a class="active" href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">&raquo;</a> -->
      </div>

    <div>
    
  </div>
  
<?php include 'footer.php'; ?>