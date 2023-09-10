<?php 

include('../connection/LoginSession.php');
require_once "../connection/ApiController.php";
$portCont = new shopController();


$userSession = $portCont->getUserDetails($session_id);

if(!empty($_GET["cashier"])) {
    switch ($_GET["cashier"]) {
        case "updateOrders":
            if(isset($_POST['proceed']))
            {
                $order_id = $_POST['order_id']; 
                $status = $_POST['status']; 
                $payment  = $_POST['payment'];
                $amount  = $_POST['amount'];
                $change  = $_POST['change'];


                if (!empty($order_id) && !empty($status) && !empty($payment) && !empty($amount) && !empty($change)) 
                {
                     $portCont->updateOrderStat($status, $payment, $amount, $change, $order_id);
                     header('Location: home.php?view=home');
                    
                }
            }
          break;
    }
}

if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        
        case "security": 
        if(isset($_POST['security'])){
             $uid = $userSession[0]['uid']; 
             $email = $userSession[0]['email']; 
             $code = $_POST['code'];
             if(!empty($uid) && !empty($email) && !empty($code))
             {
                $validation = $portCont->userValidatesEmail($uid, $email, $code);
                if(!empty($validation))
                {
                    $portCont->userhasBeenValidated($uid, $email, $code); 
                    header('Location: home.php');
                }
             }
        }
        break;

        case "addproduct": 
            if(isset($_POST['add']))
            {
                $name = $_POST["name"];
                $code = $_POST["code"];
                $category = $_POST["category"];
                $price = $_POST["price"];
                $photoName = $_FILES['photo']['name'];
                $photoTmpName = $_FILES['photo']['tmp_name'];

                if (!empty($name) && !empty($code) && !empty($category) && !empty($photoName) && !empty($price)) {
                   


                    $uploadDir = 'product/' . strtolower($category); // Use '.' for string concatenation in PHP

                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
                    
                    $photoPath = $uploadDir . '/' . $photoName;
                    
                    // Move the uploaded file to the directory
                    move_uploaded_file($photoTmpName, $photoPath);
        
                    // Now you can use the $photoPath to store the image path in your database or further processing
                    // Perform any other necessary database operations
                    $portCont->productCreate($name, $code, $category, $price, $photoPath);
        
                    header('Location: home.php?view=product');


                }
            }
            break;

            case "updateProduct":
                if(isset($_POST['update']))
                {
                    $code = $_POST['code']; 
                    $status = $_POST['status']; 

                    if (!empty($code) && !empty($status)) 
                    {
                         $portCont->updateProduct($status,$code);
                         header('Location: home.php?view=product');
                        
                    }
                }
              break;

            }
        }
  
?>

