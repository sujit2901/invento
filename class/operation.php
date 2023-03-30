<?php
session_start();
include("../config/conn.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer\PHPMailer-master\src\PHPMailer.php';
require 'phpmailer\PHPMailer-master\src\Exception.php';
require 'phpmailer\PHPMailer-master\src\SMTP.php';

class operations extends database{
    public function user_register($email,$password,$confirm_password)
    {
        $this->email = parent::clean($email);
        $this->password = sha1(parent::clean($password));
        $this->confirm_password = sha1(parent::clean($confirm_password));
        if ($password==$confirm_password)
        {
        
        

            $checkuser = "SELECT * FROM `user` WHERE `email`='$this->email'";
            // echo $checkuser;
            
            if  (parent::sql($checkuser)){
                if (parent::numrows()==1){
                    return "Already Exists!";
                }
                else{
                    parent::result();
                    $sql = "INSERT INTO `user` (`email`,`password`) VALUES ('$this->email','$this->password')";
                    // echo $sql;
                    if (parent::sql($sql))
                    {
                        return "Register Successful";
                    }
                    else{
                        return "failed to Register Please Try Again Later!";
                    }
                    
                }
            }else{
                return "Server Error, Try Again Later !";
            }
        }
        else{
            return "password and confirm password Is Not Matching!";
        }

    }
    public function user_login($email,$password)
    {
        $this->email = parent::clean($email);
        $this->password = sha1(parent::clean($password));
        $checkuser = "SELECT * FROM `user` WHERE `email`='$this->email' and `password`='$this->password'";
        // echo $checkuser;
        if (parent::sql($checkuser)) {
            if(parent::numrows()==1) {
                $admin_data = parent::result();
                $_SESSION['email'] = $admin_data[0]['email'];
                $_SESSION['password'] = $admin_data[0]['password'];
                
                return "Login Successful";
              
            }
            else{
                return "Failed To Login";
            }
        }
        else{
            return "Wrong Username or Password";

        }
    }
    public function add_category($category_name,$category_image)
    {
        $this->category_name = parent::clean($category_name);
        $path = "../assets/images/category/";
		$this->category_image = '';

		if (!empty($category_image['name'])) {
			$ext = explode(".", strtolower($category_image['name']));
        
			$this->category_image = "cat" . time() . "." . end($ext);
		}
        $sql = "INSERT INTO `category`(`catname`, `catimage`) VALUES ('$this->category_name', '$this->category_image')";

		if (parent::sql($sql)) {

			if (!empty($category_image['tmp_name'])) {
				move_uploaded_file($category_image['tmp_name'], $path . $this->category_image);
			}

			return "Category Added Successfully!";
		} else {
			return "Failed To Add, Please Try Again Later !";
		}
    }
    
    public function add_product($product_name,$category, $product_image)
    {
        $this->product_name = parent::clean($product_name);
        $this->category = parent::clean($category);
        $path = "../assets/images/product/";
		$this->product_image = '';

		if (!empty($product_image['name'])) {
			$ext = explode(".", strtolower($product_image['name']));
        
			$this->product_image = "prod" . time() . "." . end($ext);
		}
        $sql = "INSERT INTO `product`(`prodname`,`category`, `prodimage`) VALUES ('$this->product_name',$this->category, '$this->product_image')";

		if (parent::sql($sql)) {

			if (!empty($product_image['tmp_name'])) {
				move_uploaded_file($product_image['tmp_name'], $path . $this->product_image);
			}

			return "Product Added Successfully!";
		} else {
			return "Failed To Add, Please Try Again Later !";
		}
    }
    public function add_dealer($dealer_name ,$dealer_phone, $dealer_email)
    {
        $this->dealer_name = parent::clean($dealer_name);
        $this->dealer_phone = parent::clean($dealer_phone);
        $this->dealer_email = parent::clean($dealer_email);
       
        $sql = "INSERT INTO `dealer`(`dealername`,`dealerphone`, `dealeremail`) VALUES ('$this->dealer_name','$this->dealer_phone', '$this->dealer_email')";

		if (parent::sql($sql)) {
			
            $mail = new PHPMailer (true);
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->SMTPDebug = 1;
            $mail->Username="sujit.sahu@somaiya.edu";
            $mail->Password="jdynjtdamzlqlmyd";
        
            $mail->SMTPSecure="ssl";
            $mail->Port=465;
        
            $mail->setFrom("sujit.sahu@somaiya.edu");
            $mail->addAddress ($this->dealer_email);
            $mail->Subject="Congratulation for joining invento";
            $mail->Body="welcome to our invento family, SIR/MADAM ".$this->dealer_name;
            $mail->isHTML (true);
            $mail->send();
            return "Dealer Added Successfully!";
		} else {
			return "Failed To Add, Please Try Again Later !";
		}
    }
    
    public function add_transaction($dealer,$product,$qty,$price)
    {
        $this->dealer = parent::clean($dealer);
        $this->product = parent::clean($product);
        $this->qty = parent::clean($qty);
        $this->price = parent::clean($price);
       
        $sql = "INSERT INTO `transaction`(`dealer`,`product`, `qty`,`price`) VALUES ($this->dealer,$this->product, $this->qty,$this->price)";
      
        $update1 = "update product set qty=qty+$qty, price=$price where prodid=$product";

		if (parent::sql($sql)) {
            if(parent::sql($update1)){
                return "Transcation Added Successfully!";

            }

			
		} else {
			return "Failed To Add, Please Try Again Later !";
		}
    }
    public function update_stock($product_id,$qty)
    {
        $this->product_id = parent::clean($product_id);
        $this->qty = parent::clean($qty);

       
        $sql = "UPDATE `product` SET qty=qty-$qty WHERE prodid=$this->product_id";

       
		if (parent::sql($sql)) {
            
                return "Stock Updated Successfully!";
			
		} else {
			return "Failed To Update, Please Try Again Later !";
		}
    }
    public function write_book($name,$type,$amount){
        $this->name=$name;
        $this->type = $type;
        $this->amount = $amount;
        $date = date("Y/m/d");
        $myfile = fopen("khatabook.txt", "a") or die("Unable to open file!");
        fwrite($myfile, $date);
        fwrite($myfile, '<br>');
        fwrite($myfile, $name);
        fwrite($myfile, '<br>');
        fwrite($myfile, $type);
        fwrite($myfile, '<br>');
        fwrite($myfile, $amount);
        fwrite($myfile, '<br><br>');
        fclose($myfile);
        return "Successfully write in khatabook!";

    }
    public function update_book($book){
        $this->book=$book;
        $myfile = fopen("khatabook.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $book);
        fclose($myfile);
        return "Successfully write in khatabook!";

    }
    public function update_product($prodid,$product_name,$product_image)
    {
        $this->prodid = parent::clean($prodid);
        $this->product_name = parent::clean($product_name);
        $path = "../assets/images/product/";
		$this->product_image = '';

		if (!empty($product_image['name'])) {
			$ext = explode(".", strtolower($product_image['name']));
        
			$this->product_image = "prod" . time() . "." . end($ext);
		}
        $sql = "UPDATE `product` SET prodname='$this->product_name',prodimage='$this->product_image' where prodid='$this->prodid'";

		if (parent::sql($sql)) {

			if (!empty($product_image['tmp_name'])) {
				move_uploaded_file($product_image['tmp_name'], $path . $this->product_image);
			}

			return "Product Added Successfully!";
		} else {
			return "Failed To Add, Please Try Again Later !";
		}
    }
    
}
?>