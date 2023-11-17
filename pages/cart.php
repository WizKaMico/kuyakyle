            <div class="table-container">
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
                        <!-- <td><img src="login/<?php echo $item["image"]; ?>" style="width:20%;" /></td> -->
                        <td><?php echo $item["name"]; ?></td>
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

                </style>