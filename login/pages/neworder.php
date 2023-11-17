<div class="row" style="margin-top:20px;">
       <div class="col-md-12">
         <div class="content-with-shadow">
              <h1>HI! <?php echo strtoupper($userSession[0]["fullname"]); ?></h1>
              <p>EMAIL :  <?php echo strtoupper($userSession[0]["email"]); ?> || CONTACT : <?php echo strtoupper($userSession[0]["contact"]); ?></p>
          </div>
       </div>
    </div>

    <?php if($userSession[0]["designation"] == 2){ ?>
    <div class="row" style="margin-top:20px;">
        <div class="col-md-8" style="background-color: none;">
           <div class="tab">
           <?php 
            $category = $portCont->categoryProduct(); 
            if(!empty($category)){
            foreach ($category as $key => $value) {
            ?>
            <button class="tablinks" onclick="openProducts(event, '<?php echo $category[$key]['cid']; ?>')"><?php echo $category[$key]['category_name']; ?></button>
            <?php } } ?>
            
            </div>
           
            <?php 
            $category = $portCont->categoryProduct(); 
            if(!empty($category)){
            foreach ($category as $key => $value) {
            ?>
            <div id="<?php echo $category[$key]['cid']; ?>" class="tabcontent">
               <h1 style="text-align:center;"><?php echo $category[$key]['category_name']; ?></h1>
                    <hr />
                    <?php
                    $cid = $category[$key]['cid'];
                    $product = $portCont->getProductByCid($cid);
                    if (! empty($product)) {
                        foreach ($product as $key => $value) {
                    ?>
                     <form method="post" action="?view=addorder&order_id=<?php echo $_GET["order_id"]; ?>&action=add">
                     <div class="col-md-3">
                        <div class="content-with-shadow" style="background-repeat: no-repeat; background-color: black;"> 
                            <img src="<?php echo $product[$key]["image"]; ?>" style="width:100%;">
                            <hr />
                            <h3 style="text-align:center; color:white;"><b><?php echo $product[$key]["name"]; ?></b></h5>
                            <input type="hidden" name="quantity" value="1"/>
                            <input type="hidden" name="order_id" value="<?php echo $_GET['order_id']; ?>" />
                            <input type="hidden" name="product_id" value="<?php echo $product[$key]["id"]; ?>" />
                            <input type="hidden" name="price" value="<?php echo $product[$key]["price"]; ?>" />
                            <button name="add" class="rounded-button">ADD</button>
                        </div>
                     </div>
                     </form>
                    <?php } } ?>
            </div>
            <?php } } ?>
        </div>
        <div class="col-md-4">
          <div class="content-with-shadow">
            <div class="table-container">
            <a href="print_pdf.php?order_id=<?php echo $_GET['order_id']; ?>"  class="rounded-button"><span class="glyphicon glyphicon-print"></span> &nbsp; RECIEPT</a>
            <hr />
            <a href="OR/?order_id=<?php echo $_GET['order_id']; ?>&cashier=<?php echo strtoupper($userSession[0]["fullname"]); ?>" target="_BLANK" class="rounded-button"><span class="glyphicon glyphicon-print"></span> &nbsp; NEW OR</a>
            <hr />
               <table>
                    
                    <tr>
                        <th>ITEM</th>
                        <th>QTY</th>
                        <th>PRICE</th>
                        <th>VOID</th>
                    </tr>
                    <?php $order = $_GET['order_id']; ?>
                    <?php $orderResult = $portCont->getOrderItemsByOrderId($order); ?>
                    <?php if (!empty($orderResult)) { ?>
                    <?php foreach ($orderResult as $item) { ?>
                    <tr>
                        <td><img src="<?php echo $item["image"]; ?>" style="width:50%;" /></td>
                        <td><?php echo $item["quantity"]; ?></td>
                        <td><?php echo "₱".$item["price"]; ?></td>
                        <td>
                            <a href="?view=food&queue=<?php echo $_GET["queue"]; ?>&purpose=<?php echo $_GET["purpose"]; ?>&action=remove&id=<?php echo $item["cart_id"]; ?>"
                            class="btnRemoveAction"><img
                            src="../product/cart/Exit.png" alt="icon-delete"
                            title="Remove Item" /></a>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="4"><b>CUSTOMER NAME :  <?php echo $orderResult[0]['name']; ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>AMOUNT TO PAY : ₱ <?php echo $orderResult[0]['amount']; ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>CASHIER ATTENDED : <?php echo strtoupper($userSession[0]["fullname"]); ?></b></td>
                    </tr>
                
                    <?php }else{ ?>
                    <tr>
                        <td colspan="4" style="text-align:center;"><b>NO ITEM IN CART</b></td>
                    </tr>    
                    <?php } ?>
                </table>
              </div>
          </div>
        </div>
     </div>
     <?php } else { ?>
        
        <div class="row" style="margin-top:20px;">
        <div class="col-md-12">
          <div class="content-with-shadow">
            <div class="table-container">
            <hr />
               <table>
                    
                    <tr>
                        <th>ITEM</th>
                        <th>QTY</th>
                        <th>PRICE</th>
                    </tr>
                    <?php $order = $_GET['order_id']; ?>
                    <?php $orderResult = $portCont->getOrderItemsByOrderId($order); ?>
                    <?php if (!empty($orderResult)) { ?>
                    <?php foreach ($orderResult as $item) { ?>
                    <tr>
                        <td><img src="<?php echo $item["image"]; ?>" style="width:50%;" /></td>
                        <td><?php echo $item["quantity"]; ?></td>
                        <td><?php echo "₱".$item["price"]; ?></td>
                    </tr>
                    <?php } ?>
 
                    <?php }else{ ?>
                    <tr>
                        <td colspan="4" style="text-align:center;"><b>NO ITEM IN CART</b></td>
                    </tr>    
                    <?php } ?>
                </table>
              </div>
          </div>
        </div>
        </div>
    
     <?php } ?>

     <style>

        /* Style the tab */
        .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
        background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
        background-color: #ccc;
        }

        .rounded-button {
                    padding: 15px 20px;
                    background-color: #d14c4c;
                    width: 100%;
                    border: none;
                    color: white;
                    border-radius: 20px; /* Increased border radius for more rounded edges */
                    cursor: pointer;
                    justify-content: center;
                    align-items: center;
                    display: flex;
         }

         .table-container {
                        overflow-x: auto;
                        max-width: 100%;
                    }

                    table {
                        border-collapse: collapse;
                        border-spacing: 0;
                        width: 100%;
                        border: 1px solid #ddd;
                        table-layout: fixed;
                    }

                    th {
                        background: #eece32;
                        color: white;
                    }

                    th, td {
                        text-align: center;
                        padding: 8px;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                    }

    



     </style>

