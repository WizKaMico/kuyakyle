


         <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
               <div class="content-with-shadow">
                <a href="?view=food&queue=<?php echo $_GET["queue"]; ?>&purpose=<?php echo $_GET["purpose"]; ?>">
                  <img src="product/cart/back.png" style="width:5%; float:left; margin-top:-10px;"/>
                </a>
                  <h1 style="text-align:center;">ORDER # <?php echo strtoupper($_GET['queue']); ?></h1>
              </div>
            </div>
          </div>

          <div class="row" style="margin-top:20px;">
            <div class="col-md-9">
               <div class="content-with-shadow"  style="height: 600px; overflow: auto;">
               <h1 style="text-align:center;">CART 🛒</h1>
               <hr />
               <div class="table-container">
               <table>
                    <tr>
                        <th>ITEM</th>
                        <th>NAME</th>
                        <th>QTY</th>
                        <th>PRICE</th>
                    </tr>
                    <?php if (!empty($cartItem)) { ?>
                        <?php foreach ($cartItem as $item) { ?>
                            <tr>
                                <td><img src="login/<?php echo $item["image"]; ?>" style="width: 30%;" /></td>
                                <td><?php echo $item["name"]; ?></td>
                                <td>
                                 <form method="POST" action="?view=checkout&queue=<?php echo $_GET['queue'] ?>&purpose=<?php echo $_GET['purpose']; ?>&action=UpdateSpecificCartItem">
                                   <input type="hidden" name="cart_id" value="<?php echo $item["cart_id"];  ?>" />
                                    <div class="quantity-container">
                                        <button class="decrease-quantity" name="decrease">-</button>
                                        <input type="number" class="quantity" name="quantity" value="<?php echo $item["quantity"]; ?>" style="border:none; width:10%; line-height: 30px; vertical-align: middle;  text-align: center;" readonly=""/>
                                        <!-- <span class="quantity"><?php echo $item["quantity"]; ?></span> -->
                                        <button class="increase-quantity" name="increase">+</button>
                                    </div>
                                 </form>
                                </td>
                                <td><?php echo "₱" . $item["price"]; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="4" style="text-align:right; margin-right:5px;"><b>AMOUNT TO PAY : ₱ <?php echo $item_price; ?></b></td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td colspan="4" style="text-align:center;"><b>NO ITEM IN CART</b></td>
                        </tr>
                    <?php } ?>
                </table>
                </div>
               </div>
            </div>
            <div class="col-md-3">
              <div class="content-with-shadow"  style="height: 600px; overflow: auto;">
                <h1 style="text-align:center;">CUSTOMER 👨🏼‍🦱 👩🏼‍🦰</h1>
                <form  action="?view=checkout&queue=<?php echo $_GET["queue"]; ?>&purpose=<?php echo $_GET["purpose"]; ?>&action=checkout" method="POST">
                    <br />
                    <div class="input-field">
                        <?php $orderId = $_GET['queue']; ?>
                        <?php $checkIfReProcess = $storeCart->checkIfExestingOrderRepeated($orderId); ?>
                        <?php if(!empty($checkIfReProcess)) { ?>
                        <input type="text" name="name" class="rounded-input" id="name" PlaceHolder="Customer Name" value="<?php echo $checkIfReProcess[0]['name']; ?>" readonly="">
                        <?php } else { ?>
                        <input type="text" name="name" class="rounded-input" id="name" PlaceHolder="Customer Name" required>
                        <?php } ?>
                        <input type="hidden" name="purpose" class="rounded-input" id="purpose" value="<?php echo $_GET["purpose"]; ?>" required>
                    </div> 
                    <div class="input-field">
                        <button name="proceed_payment" class="rounded-button">FINISH ORDER</button>
                    </div>             
                </form>
             </div>
           </div>
        </div>


          <style>
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

                .rounded-input {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 10px;
                    border-radius: 20px; /* Increased border radius for more rounded edges */
                    border: 1px solid #ccc;
                    justify-content: center;
                    align-items: center;
                    display: flex;
                }

                .quantity-container {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .decrease-quantity,
                .increase-quantity {
                    /* padding: 15px 20px; */
                    background-color: #d14c4c;
                    width: 30px; /* Adjust the width as needed */
                    border: none;
                    color: white;
                    border-radius: 20px; /* Increased border radius for more rounded edges */
                    cursor: pointer;
                    margin: 0 5px; 
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

        </style>