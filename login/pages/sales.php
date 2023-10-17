<div class="row" style="margin-top:20px;">
       <div class="col-md-12">
         <div class="content-with-shadow">
              <h1>HI! <?php echo strtoupper($userSession[0]["fullname"]); ?></h1>
              <p>EMAIL :  <?php echo strtoupper($userSession[0]["email"]); ?> || CONTACT : <?php echo strtoupper($userSession[0]["contact"]); ?></p>
          </div>
       </div>
    </div>

    <div class="row" style="margin-top:20px;">
         <div class="col-md-12">
          <div class="content-with-shadow">
             <h3>SALES PREVIEW </h3>
             <div id="gridSales" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
           </div>
          </div>
        </div>
