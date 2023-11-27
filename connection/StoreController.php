<?php
require_once "connection/ApiController.php";
$storeCart = new shopController();


if(!empty($_GET['view'])) {
  if($_GET['view'] == 'food' || $_GET['view'] == 'checkout'){
    $member_id = $_GET['queue'];
    $cartItem = $storeCart->getMemberCartItem($member_id);
    $item_quantity = 0;
    $item_price = 0;
    if (! empty($cartItem)) {
        if (! empty($cartItem)) {
            foreach ($cartItem as $item) {
                $item_quantity = $item_quantity + $item["quantity"];
                $item_price = $item_price + ($item["price"] * $item["quantity"]);
            }
        }
    }
  } // you can your integerate authentication module here to get logged in member
}

if (! empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if(isset($_POST['add'])){
            if (!empty($_POST["quantity"]) && !empty($_POST["queue"]) && !empty($_POST["purpose"])) {
                
                $productResult = $storeCart->getProductByCode($_GET["code"]);
                
                $cartResult = $storeCart->getCartItemByProduct($productResult[0]["id"], $member_id);
                
                if (!empty($cartResult)) {
                    // Update cart item quantity in database
                    $newQuantity = $cartResult[0]["quantity"] + $_POST["quantity"];
                    $storeCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
                    $purpose = $_POST['purpose']; 
                    $queue = $_POST["queue"];
                    header('Location:?view=food&queue='.$queue.'&purpose='.$purpose);
                } else {
                    // Add to cart table
                    $storeCart->addToCart($productResult[0]["id"], $_POST["quantity"], $member_id);
                    $purpose = $_POST['purpose']; 
                    $queue = $_POST["queue"];
                    header('Location:?view=food&queue='.$queue.'&purpose='.$purpose);
                }
              }
            }
            break;
        case "remove":
            // Delete single entry from the cart
            if(!empty($_GET['id']) && !empty($_GET["queue"]) && !empty($_GET["purpose"]))
            {
            $purpose = $_GET['purpose']; 
            $queue = $_GET["queue"];
            $storeCart->deleteCartItem($_GET["id"]);
            header('Location:?view=food&queue='.$queue.'&purpose='.$purpose);
            }
            break;
        case "empty":
            // Empty cart
       
            if(!empty($member_id)){
            $storeCart->emptyCart($member_id);
            header('Location:?view=index');
            }
            break;

        case "dine":
            if(isset($_POST['proceed'])){
                session_start();
                date_default_timezone_set('Asia/Manila');

            
                $currentDate = date("Ymd");
                
        
                if (!isset($_SESSION['lastDate']) || $_SESSION['lastDate'] !== $currentDate) {
                    $_SESSION['lastDate'] = $currentDate;
                    $_SESSION['queueCounter'] = 1;
                } else {
                    
                    $_SESSION['queueCounter']++;
                }
                
                if ($_SESSION['queueCounter'] > 999) {
                    $_SESSION['queueCounter'] = 1;
                }
                
                 $queueNumber = str_pad($_SESSION['queueCounter'], 3, '0', STR_PAD_LEFT);
                 $queue = $currentDate . '-' . $queueNumber;      
                 $purpose = 'DINE-IN';
                 header('Location:?view=food&queue='.$queue.'&purpose='.$purpose);
            }
            break;

        case "take":
            if(isset($_POST['proceed'])){
                session_start();
                date_default_timezone_set('Asia/Manila');

            
                $currentDate = date("Ymd");
                
        
                if (!isset($_SESSION['lastDate']) || $_SESSION['lastDate'] !== $currentDate) {
                    $_SESSION['lastDate'] = $currentDate;
                    $_SESSION['queueCounter'] = 1;
                } else {
                    
                    $_SESSION['queueCounter']++;
                }
                
                if ($_SESSION['queueCounter'] > 999) {
                    $_SESSION['queueCounter'] = 1;
                }
                
                 $queueNumber = str_pad($_SESSION['queueCounter'], 3, '0', STR_PAD_LEFT);
                 $queue = $currentDate . '-' . $queueNumber;      
                $purpose = 'TAKE-OUT';
                header('Location:?view=food&queue='.$queue.'&purpose='.$purpose);
            }
            break;

        case "reorder":
            if(isset($_POST['proceed'])){
                session_start();
                header('Location:?view=reoder');
            }
            break;

        case "orderchecker":
            if(isset($_POST['proceed'])){
                $orderid = $_POST['customer_id'];
                if(!empty($orderid)){
                    $order = $storeCart->checkMyOrder($orderid);
                    if(!empty($order)){
                        $purpose = $order[0]['purpose'];
                        $queue = $order[0]['customer_id'];
                        header('Location:?view=food&queue='.$queue.'&purpose='.$purpose);
                    }else{
                        header('Location:?view=reoder&message=noorder');    
                    }
                }else{
                    header('Location:?view=reoder&message=error');  
                }
            }

        case "checkout":
            if(isset($_POST["proceed_payment"])) {
                $name = $_POST ['name'];
                $purpose = $_POST ['purpose'];
            }
            $order = 0;
            if (!empty($name)) {
                // able to insert into database
                
                $order = $storeCart->insertOrder ( $_POST, $member_id, $item_price);
                if(!empty($order)) {
                    if (! empty($cartItem)) {
                        if (! empty($cartItem)) {
                            foreach ($cartItem as $item) {
                                $storeCart->insertOrderItem ( $order, $item["id"], $item["price"], $item["quantity"]);
                            }
                            header('Location:?view=confirmed&queue='.$member_id);
                        }
                    }
                }
            }
            break;

            case "UpdateSpecificCartItem":
                if(isset($_POST["decrease"])) {
                  $cart_id = $_POST['cart_id']; 
                  $qty = $_POST['quantity']; 
                  $quantity = $qty - 1;
                  $queue = $_GET['queue'];
                  $purpose = $_GET['purpose'];
                  if($quantity == 0){
                    $storeCart->deleteCartItemCheckQuantity($cart_id);
                    header('Location:?view=checkout&queue='.$queue.'&purpose='.$purpose);
                  }else{
                    $storeCart->updateCartItemCheckQuantity($cart_id, $quantity);
                    header('Location:?view=checkout&queue='.$queue.'&purpose='.$purpose);
                  }
                }else if (isset($_POST["increase"])){
                  $cart_id = $_POST['cart_id']; 
                  $qty = $_POST['quantity']; 
                  $quantity = $qty + 1;
                  $queue = $_GET['queue'];
                  $purpose = $_GET['purpose'];
                  $storeCart->updateCartItemCheckQuantity($cart_id, $quantity);
                  header('Location:?view=checkout&queue='.$queue.'&purpose='.$purpose);
                }
            break;

            
    }
}
?>