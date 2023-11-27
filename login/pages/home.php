<div class="row" style="margin-top:20px;">
       <div class="col-md-12">
         <div class="content-with-shadow">
              <h1>HI! <?php echo strtoupper($userSession[0]["fullname"]); ?></h1>
              <p>EMAIL :  <?php echo strtoupper($userSession[0]["email"]); ?> || CONTACT : <?php echo strtoupper($userSession[0]["contact"]); ?></p>
          </div>
       </div>
    </div>

    <?php if($userSession[0]["designation"] == 1){ ?>
    <div class="row" style="margin-top:20px;">
      <!-- <div class="col-md-4">
          <div class="content-with-shadow">
            <h3>SALES PER DAY</h3>
            <canvas id="lineChart" width="400" height="200"></canvas>
         </div>
      </div> -->
      <div class="col-md-4">
          <div class="content-with-shadow">
          <h3>TOP SELLING PRODUCT</h3>
            <canvas id="pieChart" width="400" height="200"></canvas>
         </div>
      </div>
    </div>
      <div class="row" style="margin-top:20px;">
         <div class="col-md-4">
          <div class="content-with-shadow">
             <h3>SALES  </h3>
             <div id="gridSales" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
           </div>
          </div>
          <div class="col-md-4">
          <div class="content-with-shadow">
              <h3>TRANSACTION  </h3>
              <div id="gridTransaction" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
           </div>
          </div>
          <div class="col-md-4">
          <div class="content-with-shadow">
              <h3>PRODUCT  </h3>
              <div id="gridProduct" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
           </div>
          </div>
        </div>
    <?php } else if($userSession[0]["designation"] == 2) { ?>  
      <div class="row" style="margin-top:20px;">
         <div class="col-md-8">
          <div class="content-with-shadow">
             <h3>ORDERS TODAY</h3>
             <div id="gridSalesToday" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
           </div>
          </div>
          <div class="col-md-4">
          <div class="content-with-shadow">
             <h3>CREATE DISCOUNT</h3>
             <form id="statusForm" method="POST" action="home.php?cashier=updateOrdersDiscount">
                <label for="statusSelect">Select Order:</label>
                <select id="statusSelect" name="order_id">
                    <?php $salesListToday = $portCont->allSalesTodayList(); ?>
                    <?php 
                      
                        if(!empty($salesListToday)) {
                          foreach ($salesListToday as $key => $value) {
                      
                    ?>
                    <option value="<?php echo $salesListToday[$key]['member']; ?>"><?php echo $salesListToday[$key]['member']; ?></option>   
                    <?php } } ?>
                </select>
                <label for="statusSelect">Select Discount:</label>
                <select id="statusSelect" name="discount">
                  <option value="PWD">PWD</option>
                  <option value="SENIOR">SENIOR</option>
                </select>

                <label for="statusSelect">How Many:</label>
                <input type="number" name="discount_number"/>


                <button type="submit" name="proceed">UPDATE</button>
              </form>
           </div>
          </div>
        </div>

    <?php } else { ?>
      <div class="row" style="margin-top:20px;">
         <div class="col-md-12">
          <div class="content-with-shadow">
             <h3>KITCHEN ORDERS TODAY</h3>
             <div id="gridChefSalesToday" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
           </div>
          </div>
        </div>
    
    <?php } ?>
