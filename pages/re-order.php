
<div class="row" style="margin-top:20px; display: flex; justify-content: center; align-items: center;">
        <div class="col-md-12">
            <div class="content-with-shadow" style="background-color:#eece32;">
                <center>
                    <form action="?action=orderchecker" method="POST">
                    <img src="product/tc/dinein.png" style="width:40%;"/>
                    <input type="text" name="customer_id" class="rounded-input" placeholder="Enter OrderId Found In Your Reciept" />
                    <button name="proceed" class="rounded-button">DINE-IN</button>
                    </form>
                </center>
            </div>
        </div>
     </div>

<style>

  
.rounded-input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 20px; /* Increased border radius for more rounded edges */
    border: 1px solid #ccc;
    justify-content: center;
     align-items: center;
     display: flex;
}

.rounded-button {
    padding: 15px 20px;
    background-color: #d14c4c;
    width: 100%;
    border: none;
    color: white;
    border-radius: 20px; /* Increased border radius for more rounded edges */
    cursor: pointer;
    justify-content: center;
     align-items: center;
     display: flex;
}

</style>