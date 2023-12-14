<!-- The Modal -->
<div id="orderModalUpdate" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
  <h2>ORDER STATUS</h2>
  <div class="tab">
          <button class="tablinks active" onclick="openKyleOption(event, 'order')">Order</button>
          <button class="tablinks" onclick="openKyleOption(event, 'table')">Table</button>
  </div>
  <div id="order" class="tabcontent active">
    <form id="statusForm" method="POST" action="home.php?cashier=updateOrders">
    <input type="hidden" id="orderInput" name="order_id" readonly>
      <label for="statusSelect">Select Status:</label>
      <select id="statusSelect" name="status">
        <option value="PREPARING">PREPARING</option>
        <option value="READY TO SERVE">READY TO SERVE</option>
        <option value="COMPLETED">COMPLETED</option>
        <option value="CLAIMED">CLAIMED</option>
      </select>
      <label for="statusSelect">Select Payment:</label>
      <select id="statusSelect" name="payment">
        <option value="UN PAID">UN PAID</option>
        <option value="PAID">PAID</option>
      </select>

      <label for="statusSelect">AMOUNT TO PAY:</label>
      <input type="text" id="amountInput" name="change" readonly=""/>

      <label for="statusSelect">AMOUNT RECIEVED:</label>
      <input type="number" id="amountToPay" name="amount" />

      <label for="statusSelect">CHANGE:</label>
      <input type="number" id="changeInput" name="change" />

      <button type="submit" name="proceed">UPDATE</button>
    </form>
    </div>
    <div id="table" class="tabcontent">
    <form id="statusForm" method="POST" action="home.php?cashier=updateOrderTable">
    <input type="hidden" id="orderCheck" name="order_id" readonly>
    <label for="statusSelect">Select Status:</label>
      <select id="statusSelect" name="status">
        <option value="UNAVAILABLE">UNAVAILABLE</option>
        <option value="AVAILABLE">AVAILABLE</option>
      </select>
      <button type="submit" name="proceed">UPDATE</button>
    </form>
</div>
  </div>
</div>

<script>

document.addEventListener('DOMContentLoaded', function() {
  var amountReceivedInput = document.getElementById('statusSelect');
  var amountToPayInput = document.getElementById('amountInput');
  var changeInput = document.getElementsByName('change')[1]; // Assuming the second input with name 'change'

  amountReceivedInput.addEventListener('input', function() {
    var amountReceived = parseFloat(amountReceivedInput.value);
    var amountToPay = parseFloat(amountToPayInput.value);

    if (!isNaN(amountReceived) && !isNaN(amountToPay)) {
      var change = amountReceived - amountToPay;
      changeInput.value = (change >= 0) ? change : 0; // Ensure change is positive
    } else {
      changeInput.value = ''; // Reset the change field if inputs are invalid
    }
  });
});


function openKyleOption(evt, transName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(transName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Trigger the click event on the first button to make "London" tab active by default
document.getElementsByClassName("tablinks")[0].click();


</script>

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