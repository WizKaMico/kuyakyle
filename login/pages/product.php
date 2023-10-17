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
              <h3>PRODUCT MANAGEMENT </h3>
              <button id="createNewBtn">CREATE NEW MENU</button>
              <div id="buttonContainer" style="margin-top: 10px; display: none;">
                <button id="generateLinkBtn">PRODUCT ANALYTICS</button>
              </div>
              <div id="gridManageProduct" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
           </div>
          </div>
        </div>


        <style>

       #createNewBtn {
        margin-bottom: 20px;
        padding: 10px 20px;
        background-color: #d14c4c;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      #createNewBtn:hover {
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