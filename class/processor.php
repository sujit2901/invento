<?php

include('./operation.php');
$db = new operations();
$db->connect();
$method = $_SERVER['REQUEST_METHOD'];

if($method=="POST")
{   //user register
    if (isset( $_POST['user_register']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])){
        $email=$_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $result = $db->user_register($email,$password,$confirm_password);
        echo $result;
        if ($result=='Register Successful'){
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/login.php");}, 3000);</script>';

        }
        else{
            if ($result=='Already Exists!'){
                echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/login.php");}, 3000);</script>';
    
            }
            else{
                echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/register.php");}, 3000);</script>';
            }
            

        }       

    
    }

    //user login
    if (isset($_POST['user_login']) && isset($_POST['email']) && isset($_POST['password'])){
        $email=$_POST['email'];
        $password = $_POST['password'];
        $result = $db->user_login($email,$password);
        echo $result;
        if ($result=='Login Successful'){
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/index.php");}, 3000);</script>';
        }
        else{
                echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/login.php");}, 3000);</script>';
        }       
    }

    if (isset($_POST['add_category']) && isset($_POST['category_name']) && isset($_FILES['category_image'])){
        $category_name = $_POST['category_name'];
        $category_image = $_FILES['category_image'];
        $result = $db->add_category($category_name, $category_image);
        echo $result;
        if ($result=='Category Added Successfully!'){
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/category.php");}, 3000);</script>';
        }
        else{
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/category.php");}, 3000);</script>';
        }
        
    }
    if (isset($_POST['add_product']) && isset($_POST['category']) && isset($_POST['product_name']) && isset($_FILES['product_image'])){
        $product_name = $_POST['product_name'];
        $category = $_POST['category'];
        $product_image = $_FILES['product_image'];
        $result = $db->add_product($product_name,$category, $product_image);
        echo $result;
        if ($result=='Product Added Successfully!'){
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/product.php");}, 3000);</script>';
        }
        else{
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/product.php");}, 3000);</script>';
        }
        
    }
    if (isset($_POST['add_dealer']) && isset($_POST['dealer_name']) && isset($_POST['dealer_phone']) && isset($_POST['dealer_email'])){
        $dealer_phone = $_POST['dealer_phone'];
        $dealer_name = $_POST['dealer_name'];
        $dealer_email = $_POST['dealer_email'];
        $result = $db->add_dealer($dealer_name ,$dealer_phone, $dealer_email);
        echo $result;
        if ($result=='Dealer Added Successfully!'){
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/dealer.php");}, 3000);</script>';
        }
        else{
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/dealer.php");}, 3000);</script>';
        }
        
    }
    if (isset($_POST['add_transaction']) && isset($_POST['dealer']) && isset($_POST['product']) && isset($_POST['qty']) && isset($_POST['price'])){
        $product = $_POST['product'];
        $dealer = $_POST['dealer'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        $result = $db->add_transaction($dealer,$product,$qty,$price);
        echo $result;
        if ($result=='Transaction Added Successfully!'){
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/transaction.php");}, 3000);</script>';
          
         
        }
        else{
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/transaction.php");}, 3000);</script>';
        }
        
    }
    if (isset($_POST['update_product']) && isset($_POST['product_id']) && isset($_POST['qty'])){
        $product_id = $_POST['product_id'];
        $qty = $_POST['qty'];
        $result = $db->update_stock($product_id,$qty);
        echo $result;
        if ($result=='Stock Updated Successfully!'){
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/scan.php");}, 3000);</script>';
        }
        else{
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/scan.php");}, 3000);</script>';
        }
        
    }
    
    if (isset($_POST['write_book']) && isset($_POST['name']) && isset($_POST['type']) && isset($_POST['amount'])){
        $name = $_POST['name'];
        $type = $_POST['type'];
        $amount = $_POST['amount'];
        $result = $db->write_book($name,$type,$amount);
        echo $result;
        if ($result=='Successfully write in khatabook!'){
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/khatabook.php");}, 3000);</script>';
        }
        else{
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/khatabook.php");}, 3000);</script>';
        }
        
    }
    if (isset($_POST['update_product']) && isset($_POST['category']) && isset($_POST['product_name']) && isset($_FILES['product_image'])){
        $product_name = $_POST['product_name'];
        $category = $_POST['category'];
        $product_image = $_FILES['product_image'];
        $result = $db->add_product($product_name,$category, $product_image);
        echo $result;
        if ($result=='Product Added Successfully!'){
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/product.php");}, 3000);</script>';
        }
        else{
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/product.php");}, 3000);</script>';
        }
        
    }
    if (isset($_POST['update_book']) && isset($_POST['book'])){
        $book = $_POST['book'];
        $result = $db->update_book($book);
        echo $result;
        if ($result=='Book Update Successfully!'){
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/khatabook.php");}, 3000);</script>';
        }
        else{
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/khatabook.php");}, 3000);</script>';
        }
        
    }
    if (isset($_POST['product_name']) && isset($_POST['update_category'])){
        $prodid = $_POST['prodid'];
        $product_name = $_POST['product_name'];
        $product_image = $_FILES['product_image'];
        $result = $db->update_product($prodid,$product_name,$product_image);
        echo $result;
        if ($result=='Products Update Successfully!'){
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/index.php");}, 3000);</script>';
        }
        else{
            echo '<script> setTimeout(function() {window.location.replace("http://localhost:8080/invento/index.php");}, 3000);</script>';
        }
        
    }
    
}
else{
    echo "Method Not Allowed";
}
$db->disconnect();
?>