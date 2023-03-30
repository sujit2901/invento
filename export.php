<?php 
include("./config/conn.php");
  
$db = new database();
$db->connect();
if (isset($_GET['exportdata'])) {
    $query = "SELECT * FROM product ORDER BY prodid ASC";
    $db->sql($query);
    $result=$db->result();
    if ($db->numrows() > 0) {
      $delimiter = ",";
      $filename = "product-data_" . date('Y-m-d') . ".csv";
  
      
      $f = fopen('php://memory', 'w');
  
       
      $fields = array('prodid', 'prodname', 'prodimage', 'category', 'qty', 'price', 'updated_at');
      fputcsv($f, $fields, $delimiter);
  
      
      foreach ($result as $key => $row) {
        $lineData = array($row['prodid'], $row['prodname'], $row['prodimage'], $row['category'], $row['qty'], $row['price'], $row['updated_at']);
        fputcsv($f, $lineData, $delimiter);
      }
  
      fseek($f, 0);
  
     
      header('Content-Type: text/csv');
      header('Content-Disposition: attachment; filename="' . $filename . '";');
  
   
      fpassthru($f);
    }
    exit;
  }
  echo 'Succesfully exported file!'
?>