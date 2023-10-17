<div class="row" style="margin-top:20px;">
       <div class="col-md-12">
         <div class="content-with-shadow">
              <h1>HI! <?php echo strtoupper($userSession[0]["fullname"]); ?></h1>
              <p>EMAIL :  <?php echo strtoupper($userSession[0]["email"]); ?> || CONTACT : <?php echo strtoupper($userSession[0]["contact"]); ?></p>
          </div>
       </div>
    </div>



    
    <div class="row" style="margin-top:20px;">
      <div class="col-md-6">
          <div class="content-with-shadow">
              <h3>CATEGORIES AVAILABLE</h3>
              <button id="CreateNewCategoryButton">CREATE CATEGORY</button>
              <div id="gridManageCategoryProduct" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
           </div>
        </div>
        <div class="col-md-6">
          <div class="content-with-shadow">
              <h3>CATEGORIES STATISTICS</h3>
              <div id="gridProductCategoryAnalytics" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
           </div>
        </div>
     </div>

      

        <style>

       #CreateNewCategoryButton {
        margin-bottom: 20px;
        padding: 10px 20px;
        background-color: #d14c4c;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      #CreateNewCategoryButton:hover {
        background-color: #d14c4c;
      }



        </style>