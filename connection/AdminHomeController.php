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


if(!empty($_GET["chef"])) {
    switch ($_GET["chef"]) {
        case "updateOrders":
            if(isset($_POST['proceed']))
            {
                $order_id = $_POST['order_id']; 
                $status = $_POST['status']; 
              

                if (!empty($order_id) && !empty($status)) 
                {
                     $portCont->updateOrderStatChef($status, $order_id);
                     header('Location: home.php?view=home');
                    
                }
            }
          break;
    }
}

if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {

        case "addinventory": 
            if(isset($_POST['add']))
            {
                 $material  = $_POST['material'];
                 $quantity  = $_POST['quantity'];   

                 if (!empty($material) && !empty($quantity)) 
                 {
                    $portCont->addInventoryProduct($material,$quantity);
                    header('Location: home.php?view=raw');      
                 }
            }
        break;
        
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
                $category = $_POST["category"];
                $price = $_POST["price"];
                $photoName = $_FILES['photo']['name'];
                $photoTmpName = $_FILES['photo']['tmp_name'];

                if (!empty($name) && !empty($category) && !empty($photoName) && !empty($price)) {
                   


                    $uploadDir = 'product/' . strtolower($category); // Use '.' for string concatenation in PHP

                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
                    
                    $photoPath = $uploadDir . '/' . $photoName;
                    
                    // Move the uploaded file to the directory
                    move_uploaded_file($photoTmpName, $photoPath);

                    $categ = $portCont->checkCategoryNumber($category);

                    $generateCode = $categ[0]["category_name"].'-'.rand(6666,9999);

                    // Now you can use the $photoPath to store the image path in your database or further processing
                    // Perform any other necessary database operations
                    $portCont->productCreate($name, $generateCode, $category, $price, $photoPath);
        
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


            case "addinventory":
                if(isset($_POST['add']))
                {
                    $material = $_POST['material']; 
                    $quantity = $_POST['quantity']; 

                    if (!empty($material) && !empty($quantity)) 
                    {
                         $portCont->addInventoryProduct($material,$quantity);
                         header('Location: home.php?view=raw');
                        
                    }
                }
            break;

            case "bindInventoryProduct":
                if(isset($_POST['add']))
                {
                    $rid = $_POST['rid']; 
                    $product_id = $_POST['product_id']; 
                    $unit = $_POST['unit']; 
                    $quantity = $_POST['quantity']; 

                    if (!empty($rid) && !empty($product_id) && !empty($unit) && !empty($quantity)) 
                    {
                         $portCont->bindInventoryProduct($rid,$product_id,$unit,$quantity);
                         header('Location: home.php?view=raw');
                        
                    }
                }
            break;


            case "addcategory":
                if(isset($_POST['add']))
                {
                   $category = strtoupper($_POST['category']); 

                   if(!empty($category)){
                        $isCategoryExisting = $portCont->checkCategory($category);
                        if(empty($isCategoryExisting))
                        {
                            $portCont->addCategory($category); 
                            header('Location: home.php?view=category&message=sucessfully');
                        }
                        else{
                            header('Location: home.php?view=category&message=existing');
                        }
                   }
                }
                break;

                case "add":
                    if(isset($_POST['add'])){
                    if (!empty($_POST["quantity"]) && !empty($_POST["order_id"]) && !empty($_POST['product_id']) && !empty($_POST['price'])) {
                        
                        $quantity = $_POST["quantity"];
                        $order = $_POST["order_id"];
                        $product_id = $_POST["product_id"];
                        $price = $_POST["price"];
                        
                        // Check if the order item already exists in the order
                        $checkExisting = $portCont->orderItem($order, $product_id);
                        
                        if (!empty($checkExisting)) {
                            // Item already exists in the order, update the quantity
                            $quantityUpdate = $quantity + $checkExisting[0]['quantity'];
                            $portCont->updateOrderChange($quantityUpdate, $order, $product_id);
                        } else {
                            // Item doesn't exist in the order, insert a new item
                            $portCont->insertOrderItem($order, $product_id, $price, $quantity);
                        }
                        
                        // Calculate the new sum for the order
                        $orderItems = $portCont->getOrderItemsByOrderId($order);
                        $newSum = 0;
                        foreach ($orderItems as $item) {
                            $newSum += $item['price'] * $item['quantity'];
                        }
                        
                        // Update the order's sum
                        $portCont->updateCustomerOrderDetails($order, $newSum);
                        
                        // Redirect to the appropriate page with a success message
                        header('Location: home.php?view=addorder&order_id=' . $order . '&message=' . (empty($checkExisting) ? 'INSERTED' : 'UPDATED') . '&quantity=' . $quantity . '&newsume=' . $newSum);
                        
                       
                      }
                    }
                    break;

          }
        }
    
    
        

      
  
?>

