<div class="row" style="margin-top:20px;">
       <div class="col-md-12">
         <div class="content-with-shadow">
              <h1>HI! <?php echo strtoupper($userSession[0]["email"]); ?></h1>
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
             <h3>SALES PREVIEW </h3>
             <div id="gridSales" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
           </div>
          </div>
          <div class="col-md-4">
          <div class="content-with-shadow">
              <h3>TRANSACTION PREVIEW </h3>
              <div id="gridTransaction" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
           </div>
          </div>
          <div class="col-md-4">
          <div class="content-with-shadow">
              <h3>PRODUCT PREVIEW </h3>
              <div id="gridProduct" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
           </div>
          </div>
        </div>
    <?php } else { ?>
        <div class="row" style="margin-top:20px;">
         <div class="col-md-12">
          <div class="content-with-shadow">
             <h3>ORDERS TODAY</h3>
             <div id="gridSalesToday" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
           </div>
          </div>
        </div>
    
    <?php } ?>
