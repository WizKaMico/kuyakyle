
<!-- The Modal -->
<div id="BindNewProductRaw" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
  <h2>BIND PRODUCT</h2>
    <form id="statusForm" method="POST" action="home.php?view=raw&action=bindInventoryProduct">
      
       <label for="statusSelect">Product:</label>
       <select id="statusSelect" name="product_id">
             <?php
              $allProduct = $portCont->getAllProduct();
              if (! empty($allProduct)) { foreach ($allProduct as $key => $value) {  ?>
                <option value="<?php echo $allProduct[$key]["id"]; ?>"><?php echo $allProduct[$key]["name"]; ?></option>
             <?php } } ?>
      </select> 
      <hr />
      <label for="statusSelect">Material:</label>
       <select id="statusSelect" name="rid">
             <?php
              $allMaterials = $portCont->inventoryProduct();
              if (! empty($allMaterials)) { foreach ($allMaterials as $key => $value) {  ?>
                <option value="<?php echo $allMaterials[$key]["rid"]; ?>"><?php echo $allMaterials[$key]["material"]; ?></option>
             <?php } } ?>
      </select> 
     <hr />
     <label for="statusSelect">Unit:</label>
     <input type="text" id="statusSelect" name="unit" />
     <hr />
     <label for="statusSelect">Quantity:</label>
     <input type="number" id="statusSelect" name="quantity" />
     <hr />

     <button type="submit" name="add">BIND PRODUCT</button>
    
    </form>
  </div>
</div>


<style>
/* Styles for the form and dropdown */
select {
  width: 100%;
  padding: 8px;
  border-radius: 4px;
  border: 1px solid #ccc;
  box-sizing: border-box;
}



#statusForm {
  margin-top: 20px;
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="text"],input[type="date"],input[type="file"],input[type="number"] {
  width: 100%;
  padding: 8px;
  border-radius: 4px;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button[type="submit"] {
    width: 100%;
  margin-top: 10px;
  padding: 10px 20px;
  background-color: #d14c4c;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #0056b3;
}


/* Styles for the modal */
.modal {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

/* Styles for the modal content */
.modal-content {
  background-color: #fff;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-55%, -55%);
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  width: 80%;
  max-width: 400px;
}

/* Close button for the modal */
.close {
  color: #aaa;
  float: right;
  font-size: 20px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

</style>