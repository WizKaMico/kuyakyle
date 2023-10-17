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
              <h3>RAW MATERIALS MANAGEMENT </h3>
              <button id="CreateNewRawMaterialsButton">CREATE RAW MATERIALS</button>
              <button id="BindNewRawMaterialsButton">BIND RAW MATERIALS</button>
              <div id="gridManageInventoryProduct" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
           </div>
          </div>

          <div class="col-md-6">
          <div class="content-with-shadow">
              <h3>PRODUCTS INGREDIENTS </h3>
              <div id="gridManageInventoryAnalyticsProduct" class="ag-theme-alpine" style="width: 100%; margin-top:70px; height: 500px;"></div>
           </div>
          </div>
        </div>

      

        <style>

       #CreateNewRawMaterialsButton {
        margin-bottom: 20px;
        padding: 10px 20px;
        background-color: #d14c4c;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      #CreateNewRawMaterialsButton:hover {
        background-color: #d14c4c;
      }


      #BindNewRawMaterialsButton {
        margin-bottom: 20px;
        padding: 10px 20px;
        background-color: #d14c4c;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      #BindNewRawMaterialsButton:hover {
        background-color: #d14c4c;
      }


      #generateLinkBtn {
        margin-bottom: 20px;
        padding: 10px 20px;
        background-color: #d14c4c;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      #generateLinkBtn:hover {
        background-color: #d14c4c;
      }

        </style>