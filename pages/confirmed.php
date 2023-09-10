         <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
               <div class="content-with-shadow">
                  <h1 style="text-align:center;">ORDER # <?php echo strtoupper($_GET['queue']); ?></h1>
                  <center>
                  <img src="product/cart/1.gif" style="width:50%;"/>
                  </center>
                  <br />
                  <center>
                  <a href="?view=index" class="rounded-button" style="text-decoration:none; color:white;">NEW ORDER</a>
                  </center>
                </div>
            </div>
          </div>


          <style>

                .rounded-button {
                    padding: 15px 20px;
                    background-color: #d14c4c;
                    width: 50%;
                    border: none;
                    color: white;
                    border-radius: 20px; /* Increased border radius for more rounded edges */
                    cursor: pointer;
                    justify-content: center;
                    align-items: center;
                    display: flex;
                }

          </style>