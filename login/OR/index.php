<?php 

    require_once "../../connection/ApiController.php";
    $portCont = new shopController();
    date_default_timezone_set('Asia/Manila');
    $order = $_GET['order_id'];
    $orderTaker = $portCont->myOrderDetails($order);

?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>OR RECIEPT</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt Sample</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<center><button onclick="printReceipt()">Print Receipt</button></center>
<div class="container">
    
    <div class="receipt_header">
    <h1>Receipt of Sale <span>KUYA KYLE</span></h1>
    <h2>Address: 22 B Maysan Rd, Valenzuela, 1440 Metro Manila <span>Tel: +1 012 345 67 89</span></h2>
    <h3>ORDER : <?php echo  $orderTaker[0]['customer_id']; ?></h3>
    <h3>CUSTOMER : <?php echo  $orderTaker[0]['name']; ?></h3>
    </div>
    
    <div class="receipt_body">

        <div class="date_time_con">
            <div class="date"><?php echo date('Y-m-d'); ?></div>
            <div class="time"><?php echo date('H:i:s'); ?></div>
        </div>

        <div class="items">
            <table>
        
                <thead>
                    <th>ITEM</th>
                    <th>PRICE</th>
                    <th>QTY</th>
                    <th>AMT</th>
                </thead>
        
                <tbody>
                    <?php 
                 $orderResult = $portCont->getOrderItemsByOrderId($order);
                 foreach ($orderResult as $key => $value) {     
                        $totalAmount = $orderResult[$key]['item_price'] * $orderResult[$key]['quantity'];

                        echo "
                            <tr>
                                <td>".$orderResult[$key]['product_name']."</td>
                                <td>".$orderResult[$key]['item_price']."</td>
                                <td>".$orderResult[$key]['quantity']."</td>
                                <td>".$totalAmount."</td>
                            </tr>
                        ";

                    
                    }

                    ?>
                </tbody>

                <br />

                <thead>
                    <th>DISCOUNT</th>
                    <th>NUMBER</th>
                    <th>AMOUNT</th>
                </thead>
        
                <tbody>
                    <?php 
                 $customerId = $orderTaker[0]['customer_id']; 
                 $orderResult1 = $portCont->getDiscountIfAny($customerId);
                 if(!empty($orderResult1)) {
                 foreach ($orderResult1 as $key => $value) {     

                        echo "
                            <tr>
                                <td>".$orderResult1[$key]['discount']."</td>
                                <td>".$orderResult1[$key]['user_discount']."</td>
                                <td>".$orderResult1[$key]['discount_amount']."</td>
                            </tr>
                        ";

                    
                    }
                }

                    ?>
                </tbody>

                <tfoot>
                    <?php $orderResultDiscount = $portCont->getDiscountIfAny($customerId); ?>
                    <?php if(!empty($orderResultDiscount)) {  ?>
                    <tr>
                        <td>Total</td>
                        <td></td>
                        <td><?php echo  $orderTaker[0]['discount_amount']; ?></td>
                    </tr>
                    <tr>
                        <td>W/O Discount</td>
                        <td></td>
                        <td><?php echo  $orderResultDiscount[0]['original_price']; ?></td>
                    </tr>
                    <?php }else { ?>
                    <tr>
                        <td>Total</td>
                        <td></td>
                        <td><?php echo  $orderTaker[0]['amount']; ?></td>
                    </tr>    
                    <?php } ?>
                    <tr>
                        <td>Cash</td>
                        <td></td>
                        <td> <?php echo  $orderTaker[0]['amounts']; ?></td>
                    </tr>

                    <tr>
                        <td>Change</td>
                        <td></td>
                        <td><?php echo  $orderTaker[0]['changes']; ?></td>
                    </tr>

                </tfoot>

            </table>
        </div>


        

    </div>

    <h3>CASHIER : <?php echo $_GET['cashier']; ?> </h3>
    <h3>Thank You!</h3>

</div>

</body>
</html>
<!-- partial -->
<script>
function printReceipt() {
  window.print();
}
</script>

  
</body>
</html>
