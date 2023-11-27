<div class="row" style="margin-top:20px;">
       <div class="col-md-12">
         <div class="content-with-shadow">
              <h1>HI! <?php echo strtoupper($userSession[0]["fullname"]); ?></h1>
              <p>EMAIL :  <?php echo strtoupper($userSession[0]["email"]); ?> || CONTACT : <?php echo strtoupper($userSession[0]["contact"]); ?></p>
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
          <div class="col-md-8">
          <div class="content-with-shadow">
             <h3>SALES PREVIEW </h3>
             <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'Overall')">Overall Sales</button>
                <button class="tablinks" onclick="openCity(event, 'Daily')">Daily Sales</button>
                <button class="tablinks" onclick="openCity(event, 'Weekly')">Weekly Sales</button>
                <button class="tablinks" onclick="openCity(event, 'Monthly')">Monthly Sales</button>
                <button class="tablinks" onclick="openCity(event, 'Product')">Most Sold Product</button>
              </div>

              <div id="Overall" class="tabcontent">
                <h3>Overall</h3>
                <a href="printsales/overallsales.php" class="form-control">PRINT</a>
                    <table id="mySales" class="table table-striped" style="text-align:center;">
                        <thead>
                            <tr>
                              <th scope="col">DATE</th>
                              <th scope="col">ACCUMULATED SALES</th>
                              <th scope="col">EXPENSE (INVENTORY)</th>
                              <th scope="col">PROFIT</th>
                              <th scope="col">ORDER</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                               $Sales = $portCont->allSalesListTabulated();
                                 if (!empty($Sales)) {
                                     foreach ($Sales as $key => $value) { 
                                         $date = $Sales[$key]['DateSpecific'];
                                        $Expense = $portCont->checkSalesDayToCompare($date);
                                        $PROFIT =  $Sales[$key]['PROFIT'] - $Expense[0]['expense'];
                             ?>
                                    <tr>
                                        <th scope="row"><?php echo $Sales[$key]['DateSpecific']; ?></th>
                                        <td>₱<?php echo $Sales[$key]['PROFIT']; ?></td>
                                        <td>₱<?php echo $Expense[0]['expense']; ?></td>
                                       <td>₱<?php echo  $PROFIT; ?></td>
                                      <td><?php echo $Sales[$key]['TOTAL_ORDERS']; ?></td>
                                                            
                                   </tr>
                           <?php } } ?>
                          </tbody>
                      </table>
              </div>

              <div id="Daily" class="tabcontent">
                <h3>Daily Sales</h3>
                <a href="printsales/daily.php" class="form-control">PRINT</a>
                <table id="mySalesDaily" class="table table-striped" style="text-align:center;">
                        <thead>
                            <tr>
                              <th scope="col">DATE</th>
                              <th scope="col">ACCUMULATED SALES</th>
                              <th scope="col">EXPENSE (INVENTORY)</th>
                              <th scope="col">PROFIT</th>
                              <th scope="col">ORDER</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                               $Sales = $portCont->allSalesListTabulatedToday();
                                 if (!empty($Sales)) {
                                     foreach ($Sales as $key => $value) { 
                                         $date = $Sales[$key]['DateSpecific'];
                                        $Expense = $portCont->checkSalesDayToCompare($date);
                                        $PROFIT =  $Sales[$key]['PROFIT'] - $Expense[0]['expense'];
                             ?>
                                    <tr>
                                        <th scope="row"><?php echo $Sales[$key]['DateSpecific']; ?></th>
                                        <td>₱<?php echo $Sales[$key]['PROFIT']; ?></td>
                                        <td>₱<?php echo $Expense[0]['expense']; ?></td>
                                       <td>₱<?php echo  $PROFIT; ?></td>
                                      <td><?php echo $Sales[$key]['TOTAL_ORDERS']; ?></td>
                                                            
                                   </tr>
                           <?php } } ?>
                          </tbody>
                      </table> 
 
              </div>

              <div id="Weekly" class="tabcontent">
                <h3>Weekly Sales</h3>
                <a href="printsales/weekly.php" class="form-control">PRINT</a>
                <table id="mySalesWeekly" class="table table-striped" style="text-align:center;">
                        <thead>
                            <tr>
                              <th scope="col">DATE</th>
                              <th scope="col">ACCUMULATED SALES</th>
                              <th scope="col">EXPENSE (INVENTORY)</th>
                              <th scope="col">PROFIT</th>
                              <th scope="col">ORDER</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                               $Sales = $portCont->allSalesListTabulatedWeek();
                                 if (!empty($Sales)) {
                                     foreach ($Sales as $key => $value) { 
                                         $date = $Sales[$key]['DateSpecific'];
                                        $Expense = $portCont->checkSalesDayToCompare($date);
                                        $PROFIT =  $Sales[$key]['PROFIT'] - $Expense[0]['expense'];
                             ?>
                                    <tr>
                                        <th scope="row"><?php echo $Sales[$key]['DateSpecific']; ?></th>
                                        <td>₱<?php echo $Sales[$key]['PROFIT']; ?></td>
                                        <td>₱<?php echo $Expense[0]['expense']; ?></td>
                                       <td>₱<?php echo  $PROFIT; ?></td>
                                      <td><?php echo $Sales[$key]['TOTAL_ORDERS']; ?></td>
                                                            
                                   </tr>
                           <?php } } ?>
                          </tbody>
                      </table> 
              </div>

              <div id="Monthly" class="tabcontent">
                <h3>Monthly Sales</h3>
                <a href="printsales/monthly.php" class="form-control">PRINT</a>
                <table id="mySalesMonthly" class="table table-striped" style="text-align:center;">
                        <thead>
                            <tr>
                              <th scope="col">DATE</th>
                              <th scope="col">ACCUMULATED SALES</th>
                              <th scope="col">EXPENSE (INVENTORY)</th>
                              <th scope="col">PROFIT</th>
                              <th scope="col">ORDER</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                               $Sales = $portCont->allSalesListTabulatedMonth();
                                 if (!empty($Sales)) {
                                     foreach ($Sales as $key => $value) { 
                                         $date = $Sales[$key]['DateSpecific'];
                                        $Expense = $portCont->checkSalesDayToCompare($date);
                                        $PROFIT =  $Sales[$key]['PROFIT'] - $Expense[0]['expense'];
                             ?>
                                    <tr>
                                        <th scope="row"><?php echo $Sales[$key]['DateSpecific']; ?></th>
                                        <td>₱<?php echo $Sales[$key]['PROFIT']; ?></td>
                                        <td>₱<?php echo $Expense[0]['expense']; ?></td>
                                       <td>₱<?php echo  $PROFIT; ?></td>
                                      <td><?php echo $Sales[$key]['TOTAL_ORDERS']; ?></td>
                                                            
                                   </tr>
                           <?php } } ?>
                          </tbody>
                      </table> 
              </div>

              <div id="Product" class="tabcontent">
              <a href="printsales/product.php" class="form-control">PRINT</a>
              <table id="mySalesMProduct" class="table table-striped" style="text-align:center;">
                        <thead>
                            <tr>
                              <th scope="col">PRODUCT</th>
                              <th scope="col">SALES</th>
                              <th scope="col">INCOME</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                               $SalesProduct = $portCont->mostSoldProduct();
                                 if (!empty($SalesProduct)) {
                                     foreach ($SalesProduct as $key => $value) { 
                                   
                             ?>
                                    <tr>
                                        <th scope="row"><?php echo $SalesProduct[$key]['name']; ?></th>
                                        <td><?php echo $SalesProduct[$key]['orders']; ?></td>
                                        <td>₱<?php echo $SalesProduct[$key]['income']; ?></td>
                                     
                                                            
                                   </tr>
                           <?php } } ?>
                          </tbody>
                      </table> 

              </div>
                                       
           </div>
          </div>
        </div>

<style>
        /* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
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
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>