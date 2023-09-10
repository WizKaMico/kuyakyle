
<div class="row" style="margin-top:20px; display: flex; justify-content: center; align-items: center;">
        <div class="col-md-3">
            <div class="content-with-shadow" style="background-color:#eece32;">
             <center>
             <img src="../logo/logo.png" style="width:50%; display: flex; justify-content: center; align-items: center;" />
                <h1 style="margin-bottom:30px; margin-top:10px; font-size:20px;">WELCOME! <?php echo strtoupper($userSession[0]["email"]); ?></h1>
                <form method="POST" action="home.php?action=security">
                <input type="number" name="code" placeholder="4-digit Code" class="rounded-input">
                <button class="rounded-button" name="security">Validate</button>
                <form>
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
    padding: 10px 20px;
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