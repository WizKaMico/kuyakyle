
   <div class="row" style="margin-top:20px; display: flex; justify-content: center; align-items: center;">
        <div class="col-md-3">
            <div class="content-with-shadow" style="background-color:#eece32;">
                <center>
                    <img src="../logo/logo.png" style="width:50%; display: flex; justify-content: center; align-items: center;" />
                </center>
                <br />
                <br />
                <form method="POST" action="index.php?action=validate">

                <!-- Input field -->
                <input type="text" name="username" placeholder="UserName" class="rounded-input">


                <input type="password" name="password" placeholder="Password" class="rounded-input">
                <label><input type="checkbox" name="remember_me"> Remember Me</label>
                <button class="rounded-button" name="login">Login</button>
                <a href="index.php?view=forgot" class="rounded-button" style="color:white; text-decoration:none; margin-top:10px;">Forgot Password</a>
                <form>
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