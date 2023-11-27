<?php include('connection/StoreController.php'); ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>KYLE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-grid.css">
  <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-theme-alpine.css">
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/cart.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  

</head>
<body>
<!-- partial:index.partial.html -->
<div class="app">
  <header>
    <div class="logo">
       <img src="logo/logo-main.png"  style="max-width: 40%; height: auto;" />
    </div>
    <div class="nav-trigger hidden-M">
      <i class="fa fa-bars"></i>
    </div>
    <div class="right-links visible-M">

    </div>
  </header>
  <div class="body">
  <?php if(!empty($_GET['view'])) { ?>
     <?php if($_GET['view'] == 'food') { ?>
      <nav class="side-nav">
          <ul>
            <li class="label">Main</li>
            <?php 
            $category = $storeCart->categoryProduct(); 
            if (!empty($category)) {
                foreach ($category as $key => $value) {
                    $activeClass = ($key === 0) ? 'active' : ''; // Add 'active' class to the first element
            ?>
                    <li class="<?php echo $activeClass; ?>"><i class="fas fa-columns"></i><a href="#" class="tablinks" onclick="openCategory(event, '<?php echo $category[$key]['cid']; ?>')" style="text-decoration:none; color:white;"><?php echo $category[$key]['category_name']; ?></a></li>
            <?php } } ?>
        </ul>          
      </nav>
    <?php } } ?> 
    <div class="content">
        <?php if(!empty($_GET['view'])) { ?>
        <?php if($_GET['view'] == 'index') { ?>
        <?php include('pages/index.php'); ?>
        <?php }else if($_GET['view'] == 'reoder') { ?>
        <?php include('pages/re-order.php'); ?>
        <?php }else if($_GET['view'] == 'food') { ?>
        <?php include('pages/food.php'); ?>
        <?php }else if($_GET['view'] == 'checkout') { ?>
        <?php include('pages/checkout.php'); ?>
        <?php }else if($_GET['view'] == 'confirmed') { ?>
        <?php include('pages/confirmed.php'); ?>
        <?php }else{ ?>
        
        <?php } ?>
        <?php }else{ ?>
        <?php include('pages/index.php'); ?>
        <?php } ?>
        

   <?php if(!empty($_GET['view'])) { ?>
     <?php if($_GET['view'] == 'food') { ?>   
        <div id="cartCheck" class="cartCheck">
        <?php if(empty($item_quantity)) { ?>
          <i class="fas fa-shopping-cart icon" aria-hidden="true" style="font-size:20px;"></i>
        <?php } else { ?>
          <i class="fas fa-shopping-cart icon" aria-hidden="true" style="font-size:20px;"></i>
        <span style="position: absolute; top: -10px; right: -10px; background-color: red; color: white; border-radius: 50%; padding: 5px 8px; font-size: 14px;"><?php echo $item_quantity; ?></span>
        <?php } ?>
            <div class="col-md-12">
            <form class="form" style="overflow: auto; max-height: 400px; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">
               <?php include('pages/cart.php'); ?>
            </form>
            </div>
        </div>
    <?php } } ?> 
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/ag-grid-enterprise@30.0.6/dist/ag-grid-enterprise.min.js"></script>
  <script src="js/home-aggrid.js"></script>
  <script  src="js/cart.js"></script>
  <script  src="js/main.js"></script>
  <script  src="js/tab.js"></script>
  <script>
    $(document).ready(function () {
        // Event listener for increasing quantity
        $(".increase-quantity").on("click", function () {
            var quantityElement = $(this).siblings(".quantity");
            var currentQuantity = parseInt(quantityElement.text());
            if (!isNaN(currentQuantity)) {
                quantityElement.text(currentQuantity + 1);
            }
        });

        // Event listener for decreasing quantity
        $(".decrease-quantity").on("click", function () {
            var quantityElement = $(this).siblings(".quantity");
            var currentQuantity = parseInt(quantityElement.text());
            if (!isNaN(currentQuantity) && currentQuantity > 1) {
                quantityElement.text(currentQuantity - 1);
            }
        });
    });
</script>   

</body>
</html>
