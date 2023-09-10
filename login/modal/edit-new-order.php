<!-- The Modal -->
<div id="orderModalUpdate" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
  <h2>ORDER STATUS</h2>
    <form id="statusForm" method="POST" action="home.php?cashier=updateOrders">
    <input type="hidden" id="orderInput" name="order_id" readonly>
      <label for="statusSelect">Select Status:</label>
      <select id="statusSelect" name="status">
        <option value="PENDING">PENDING</option>
        <option value="IN-PROGRESS">IN-PROGRESS</option>
        <option value="COMPLETED">COMPLETED</option>
        <option value="CLAIMED">CLAIMED</option>
      </select>
      <label for="statusSelect">Select Payment:</label>
      <select id="statusSelect" name="payment">
        <option value="UN PAID">UN PAID</option>
        <option value="PAID">PAID</option>
      </select>

      <label for="statusSelect">AMOUNT RECIEVED:</label>
      <input type="number" id="statusSelect" name="amount" />

      <label for="statusSelect">CHANGE:</label>
      <input type="number" id="statusSelect" name="change" />

      <button type="submit" name="proceed">UPDATE</button>
    </form>
  </div>
</div>


<style>



/* Styles for the form and dropdown */
#statusForm {
  margin-top: 20px;
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

select {
  width: 100%;
  padding: 8px;
  border-radius: 4px;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

input[type="text"],input[type="date"],input[type="number"] {
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