         <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
               <div class="content-with-shadow">
                 <?php date_default_timezone_set('Asia/Manila'); ?>
                  <h1 style="text-align:center;">ORDER # <?php echo strtoupper($_GET['queue']); ?></h1>
              </div>
            </div>
          </div>

          <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
               <?php 
                $category = $storeCart->categoryProduct(); 
                if(!empty($category)){
                foreach ($category as $key => $value) {
                ?>
                <div class="tabcontent" id="<?php echo $category[$key]['cid']; ?>">
                    <h1 style="text-align:center;"><?php echo $category[$key]['category_name']; ?></h1>
                    <hr />
                    <?php
                    $cid = $category[$key]['cid'];
                    $product = $storeCart->getProductByCid($cid);
                    if (! empty($product)) {
                        foreach ($product as $key => $value) {
                    ?>
                     <form method="post" action="?view=food&queue=<?php echo $_GET["queue"]; ?>&purpose=<?php echo $_GET["purpose"]; ?>&action=add&code=<?php echo $product[$key]["code"]; ?>">
                     <div class="col-md-3">
                        <!-- <div class="content-with-shadow" style="background-image: url('product//icey.gif'); background-repeat: no-repeat; background-color: black;">    -->
                        <div class="content-with-shadow" style="background-repeat: no-repeat; background-color: black;"> 
                            <img src="login/<?php echo $product[$key]["image"]; ?>" style="width:100%;">
                            <hr />
                            <h3 style="text-align:center; color:white;"><b><?php echo $product[$key]["name"]; ?>  ₱ <?php echo $product[$key]["price"]; ?></b></h5>
                            <input type="hidden" name="quantity" value="1"/>
                            <input type="hidden" name="queue" value="<?php echo $_GET['queue']; ?>" />
                            <input type="hidden" name="purpose" value="<?php echo $_GET['purpose']; ?>" />
                            <button name="add" class="rounded-button">ADD</button>
                        </div>
                     </div>
                     </form>
                    <?php } } ?>
                </div>
               <?php } } ?>
            </div>
          </div>

          <style>

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
