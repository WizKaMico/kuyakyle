
<?php include('../connection/AdminHomeController.php'); ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>KYLE SIOMAI HOUSE | ADMIN</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-grid.css">
  <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-theme-alpine.css">
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css'>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="../css/main.css">


</head>
<body>
<!-- partial:index.partial.html -->
<div class="app">
  <header>
    <div class="logo">
      <img src="../logo/logo-main.png"  style="max-width: 40%; height: auto;" />
    </div>
    <div class="nav-trigger hidden-M">
      <i class="fa fa-bars"></i>
    </div>
    <div class="right-links visible-M">
    <a href="logout.php" style="text-decoration:none; color:white;"><i class="fas fa-sign-out-alt" style="font-size:30px;"></i></a>
    </div>
  </header>
  <div class="body">
    <nav class="side-nav">
      <ul>
        <li class="label">Main</li>
        <?php if($userSession[0]["designation"] == 1){ ?>
        <li class="active"><i class="fas fa-columns"></i><a href="home.php?view=home" style="text-decoration:none; color:white;">Dashboard</a></li>
        <li><i class="fas fa-columns"></i><a href="home.php?view=raw" style="text-decoration:none; color:white;">Raw Materials</a></li>
        <li><i class="fas fa-columns"></i><a href="home.php?view=sales" style="text-decoration:none; color:white;">Manage Sales</a></li>
        <li><i class="fas fa-columns"></i><a href="home.php?view=transaction" style="text-decoration:none; color:white;">Transaction History</a></li>
        <li><i class="fas fa-columns"></i><a href="home.php?view=product" style="text-decoration:none; color:white;">Product</a></li>
        <li><i class="fas fa-columns"></i><a href="home.php?view=category" style="text-decoration:none; color:white;">Category</a></li>
        <?php } else if($userSession[0]["designation"] == 2){ ?>
        <li class="active"><i class="fas fa-columns"></i><a href="home.php?view=home" style="text-decoration:none; color:white;">Orders</a></li>
        <?php } else { ?>
          <li class="active"><i class="fas fa-columns"></i><a href="home.php?view=home" style="text-decoration:none; color:white;">Orders</a></li>
        <?php } ?>
      </ul>
    </nav>
    <div class="content">
        <?php if(!empty($_GET['view'])) { ?>
        <?php if($_GET['view'] == 'home') { ?>
        <?php include('pages/home.php'); ?>
        <?php } else if($_GET['view'] == 'sales') { ?>
        <?php include('pages/sales.php'); ?>
        <?php } else if($_GET['view'] == 'raw') { ?>
        <?php include('pages/raw.php'); ?>
        <?php } else if($_GET['view'] == 'transaction') { ?>
        <?php include('pages/transaction.php'); ?>
        <?php } else if($_GET['view'] == 'product') { ?>
        <?php include('pages/product.php'); ?>
        <?php } else if($_GET['view'] == 'analytics') { ?>
        <?php include('pages/analytics.php'); ?>
        <?php } else if($_GET['view'] == 'category') { ?>
        <?php include('pages/category.php'); ?>
        <?php } else if($_GET['view'] == 'addorder') { ?>
        <?php include('pages/neworder.php'); ?>
        <?php } else {  ?>
        <?php include('pages/home.php'); ?>
        <?php } ?>     
        <?php }else{ ?>
        <?php include('pages/home.php'); ?>
        <?php } ?>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/ag-grid-enterprise@30.0.6/dist/ag-grid-enterprise.min.js"></script>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script src="js/home-aggrid.js"></script>
  <script  src="js/main.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale-all.js'></script>
  <?php if($userSession[0]["designation"] == 1){ ?>
  <script src="../js/home-admin-sales.js"></script> 
  <script src="../js/home-admin-transaction.js"></script> 
  <script src="../js/home-admin-product.js"></script> 
  <script src="../js/product-admin-product.js"></script>
  <script src="../js/transaction-admin-transaction.js"></script>
  <script src="../js/home-admin-raw.js"></script>
  <script src="../js/home-admin-raw-analytics.js"></script>
  <script src="../js/home-admin-pie.js"></script>
  <script src="../js/category-admin-category.js"></script>
  <script src="../js/category-admin-category-analytics.js"></script>
 
 
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get references to the button and modal
      const createNewBtn = document.getElementById('createNewBtn');
      const modal = document.getElementById('CreateNewProduct'); // Use the correct modal ID

      // Add a click event listener to the button
      createNewBtn.addEventListener('click', () => {
        // Display the modal
        modal.style.display = 'block';
      });

      // Add a click event listener to close the modal when clicking outside of it
      window.addEventListener('click', function(event) {
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });
    });

  </script>   


<script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get references to the button and modal
      const CreateNewRawMaterialsButton = document.getElementById('CreateNewRawMaterialsButton');
      const modal = document.getElementById('CreateNewProductRaw'); // Use the correct modal ID

      // Add a click event listener to the button
      CreateNewRawMaterialsButton.addEventListener('click', () => {
        // Display the modal
        modal.style.display = 'block';
      });

      // Add a click event listener to close the modal when clicking outside of it
      window.addEventListener('click', function(event) {
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });
    });

  </script>   


<script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get references to the button and modal
      const BindNewRawMaterialsButton = document.getElementById('BindNewRawMaterialsButton');
      const modal = document.getElementById('BindNewProductRaw'); // Use the correct modal ID

      // Add a click event listener to the button
      BindNewRawMaterialsButton.addEventListener('click', () => {
        // Display the modal
        modal.style.display = 'block';
      });

      // Add a click event listener to close the modal when clicking outside of it
      window.addEventListener('click', function(event) {
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });
    });

  </script>   

<script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get references to the button and modal
      const CreateNewCategoryButton = document.getElementById('CreateNewCategoryButton');
      const modal = document.getElementById('CreateNewCategory'); // Use the correct modal ID

      // Add a click event listener to the button
      CreateNewCategoryButton.addEventListener('click', () => {
        // Display the modal
        modal.style.display = 'block';
      });

      // Add a click event listener to close the modal when clicking outside of it
      window.addEventListener('click', function(event) {
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });
    });

  </script>   

 <?php include('modal/bind-new-raw_materials.php'); ?>
 <?php include('modal/create-new-product.php'); ?>
 <?php include('modal/create-new-raw_materials.php'); ?>
 <?php include('modal/edit-new-product.php'); ?>
 <?php include('modal/create-new-category.php'); ?>
 <?php } else if($userSession[0]["designation"] == 2) { ?>


  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var amountReceivedInput = document.getElementById('amountToPay');
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
</script>

  <?php include('modal/edit-new-order.php'); ?>
  <script src="../js/home-cashier-sales.js"></script>
  <script src="../js/cashier-tab.js"></script> 

  <?php } else { ?>

  <?php include('modal/edit-new-order-chef.php'); ?>
  <script src="../js/home-chef-sales.js"></script>
 
 
  <?php } ?>
</body>
</html>
