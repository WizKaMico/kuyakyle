         <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
               <div class="content-with-shadow">
                  <h1 style="text-align:center;">ORDER # <?php echo strtoupper($_GET['queue']); ?></h1>
              </div>
            </div>
          </div>

          <div class="row" style="margin-top:20px;">
            <div class="col-md-9">
               <div class="content-with-shadow"  style="height: 600px; overflow: auto;">
               <div class="tab">
                    <button class="tablinks" onclick="openCategory(event, 'meal')">🧆 MEAL</button>
                    <button class="tablinks" onclick="openCategory(event, 'drink')">🥤 DRINK</button>
                    <button class="tablinks" onclick="openCategory(event, 'extra')">🍚 EXTRA</button>
                </div>
                    <br />
                    <div id="meal" class="tabcontent">
                    <h1 style="text-align:center;">🧆 MEAL</h1>
                    <hr />
                    <?php
                    $meal = $storeCart->getMealProduct();
                    if (! empty($meal)) {
                        foreach ($meal as $key => $value) {
                    ?>
                     <form method="POST" action="?view=food&queue=<?php echo $_GET["queue"]; ?>&purpose=<?php echo $_GET["purpose"]; ?>&action=add&code=<?php echo $meal[$key]["code"]; ?>">
                     <div class="col-md-3">
                        <div class="content-with-shadow" style="background-image: url('product/meal/fire.gif');">    
                           <img src="<?php echo $meal[$key]["image"]; ?>" style="width:100%;">
                           <hr />
                           <h3 style="text-align:center; color:white;"><b>🍲 <?php echo $meal[$key]["name"]; ?> 💰 ₱ <?php echo $meal[$key]["price"]; ?></b></h3>
                           <input type="hidden" name="quantity" value="1"/>
                           <input type="hidden" name="queue" value="<?php echo $_GET['queue']; ?>" />
                           <input type="hidden" name="purpose" value="<?php echo $_GET['purpose']; ?>" />
                           <button name="add" class="rounded-button">ADD</button>
                        </div>
                     </div>
                     </form>
                    <?php } } ?>
                    </div>

                    <div id="drink" class="tabcontent">
                    <h1 style="text-align:center;">🥤 DRINK</h1>
                    <hr />
                    <?php
                    $drink = $storeCart->getDrinkProduct();
                    if (! empty($drink)) {
                        foreach ($drink as $key => $value) {
                    ?>
                     <form method="post" action="?view=food&queue=<?php echo $_GET["queue"]; ?>&purpose=<?php echo $_GET["purpose"]; ?>&action=add&code=<?php echo $drink[$key]["code"]; ?>">
                     <div class="col-md-3">
                        <div class="content-with-shadow" style="background-image: url('product/drinks/icey.gif'); background-repeat: no-repeat; background-color: black;">    
                            <img src="<?php echo $drink[$key]["image"]; ?>" style="width:100%;">
                            <hr />
                            <h3 style="text-align:center; color:white;"><b>🥤 <?php echo $drink[$key]["name"]; ?> 💰 ₱ <?php echo $drink[$key]["price"]; ?></b></h5>
                            <input type="hidden" name="quantity" value="1"/>
                            <input type="hidden" name="queue" value="<?php echo $_GET['queue']; ?>" />
                            <input type="hidden" name="purpose" value="<?php echo $_GET['purpose']; ?>" />
                            <button name="add" class="rounded-button">ADD</button>
                        </div>
                     </div>
                     </form>
                    <?php } } ?>
                    </div>

                    <div id="extra" class="tabcontent">
                    <h1 style="text-align:center;">🍚 EXTRA</h1>
                    <hr />
                    <?php
                    $extra = $storeCart->getExtraProduct();
                    if (! empty($extra)) {
                        foreach ($extra as $key => $value) {
                    ?>
                    <form method="post" action="?view=food&queue=<?php echo $_GET["queue"]; ?>&purpose=<?php echo $_GET["purpose"]; ?>&action=add&code=<?php echo $extra[$key]["code"]; ?>">
                    <div class="col-md-3">
                        <div class="content-with-shadow" style="background-image: url('product/extra/fire.gif');">    
                           <img src="<?php echo $extra[$key]["image"]; ?>" style="width:100%;">
                           <hr />
                           <h3 style="text-align:center; color:white;"><b>🍚 <?php echo $extra[$key]["name"]; ?> 💰 ₱ <?php echo $extra[$key]["price"]; ?></b></h5>
                           <input type="hidden" name="quantity" value="1"/>
                           <input type="hidden" name="queue" value="<?php echo $_GET['queue']; ?>" />
                           <input type="hidden" name="purpose" value="<?php echo $_GET['purpose']; ?>" />
                           <button name="add" class="rounded-button">ADD</button>
                        </div>
                     </div>
                    </form>
                    <?php } } ?>
                    
                </div>
              </div>
            </div>
            <div class="col-md-3">
               <div class="content-with-shadow"  style="height: 600px; overflow: auto;">
               <h1 style="text-align:center;">CART 🛒</h1>
               <hr />
                <table>
                    <tr>
                        <th>ITEM</th>
                        <th>QTY</th>
                        <th>PRICE</th>
                        <th>REMOVE</th>
                    </tr>
                    <?php if (! empty($cartItem)) { ?>
                    <?php foreach ($cartItem as $item) { ?>
                    <tr>
                        <td><img src="<?php echo $item["image"]; ?>" style="width:100%;" /></td>
                        <td><?php echo $item["quantity"]; ?></td>
                        <td><?php echo "₱".$item["price"]; ?></td>
                        <td>
                            <a href="?view=food&queue=<?php echo $_GET["queue"]; ?>&purpose=<?php echo $_GET["purpose"]; ?>&action=remove&id=<?php echo $item["cart_id"]; ?>"
                            class="btnRemoveAction"><img
                            src="product/cart/Exit.png" alt="icon-delete"
                            title="Remove Item" /></a>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="4" style="text-align:center;"><b>AMOUNT TO PAY : ₱ <?php echo $item_price; ?></b></td>
                    </tr>
                    <tr>
                      <td colspan="4" style="text-align:center;">
                      <a href="?view=checkout&queue=<?php echo $_GET["queue"]; ?>&purpose=<?php echo $_GET["purpose"]; ?>" class="rounded-button" style="text-decoration:none; color:white;">CHECKOUT  🍳 </a>
                      </td>
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

                            /* Style the tab */
                .tab {
                overflow: hidden;
                border: 1px solid #ccc;
                background-color: #eece32;
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
                width:33.3%;
                color:white;
                }

                /* Change background color of buttons on hover */
                .tab button:hover {
                background-color: #de8c8c;
                }

                /* Create an active/current tablink class */
                .tab button.active {
                background-color: #d14c4c;
                }

                /* Style the tab content */
                .tabcontent {
                display: none;
                padding: 6px 12px;
                border-top: none;
                }

          </style>