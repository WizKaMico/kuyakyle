


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
                <table>
                    <tr>
                        <th>ITEM</th>
                        <th>NAME</th>
                        <th>QTY</th>
                        <th>PRICE</th>
                    </tr>
                    <?php if (! empty($cartItem)) { ?>
                    <?php foreach ($cartItem as $item) { ?>
                    <tr>
                        <td><img src="<?php echo $item["image"]; ?>" style="width:10%;" /></td>
                        <td><?php echo $item["name"]; ?></td>
                        <td><?php echo $item["quantity"]; ?></td>
                        <td><?php echo "₱".$item["price"]; ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="4" style="text-align:right; margin-right:5px;"><b>AMOUNT TO PAY : ₱ <?php echo $item_price; ?></b></td>
                    </tr>
                   
                    <?php }else{ ?>
                    <tr>
                        <td colspan="4" style="text-align:center;"><b>NO ITEM IN CART</b></td>
                    </tr>    
                    <?php } ?>
                </table>

               </div>
            </div>
            <div class="col-md-3">
              <div class="content-with-shadow"  style="height: 600px; overflow: auto;">
                <h1 style="text-align:center;">CUSTOMER 👨🏼‍🦱 👩🏼‍🦰</h1>
                <form  action="?view=checkout&queue=<?php echo $_GET["queue"]; ?>&purpose=<?php echo $_GET["purpose"]; ?>&action=checkout" method="POST">
                    <br />
                    <div class="input-field">
                        <input type="text" name="name" class="rounded-input" id="name" PlaceHolder="Customer Name" required>
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

table {
                border-collapse: collapse;
                border-spacing: 0;
                width: 100%;
                border: 1px solid #ddd;
                
                }

                th {
                    background:#eece32;
                    color:white;
                }

                th, td {
                text-align: center;
                padding: 8px;

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