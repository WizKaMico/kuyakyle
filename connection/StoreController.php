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
            $storeCart->emptyCart($member_id);
            break;

        case "dine":
            if(isset($_POST['proceed'])){
                 $queue = rand(6666,9999);
                 $purpose = 'DINE-IN';
                 header('Location:?view=food&queue='.$queue.'&purpose='.$purpose);
            }
            break;

        case "take":
            if(isset($_POST['proceed'])){
                $queue = rand(6666,9999);
                $purpose = 'TAKE-OUT';
                header('Location:?view=food&queue='.$queue.'&purpose='.$purpose);
            }
            break;
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
    }
}
?>