<?php
if(isset($_GET['call'])){
  if($_GET['call'] == 'logout'){
    session_start();
    $_SESSION["admin"] = "invalid";
    echo '<script>  window.location="index.php"; </script>';
  }
}
?>
<nav class="navbar navbar-default navbar-fixed-top">
 <div class="container-fluid">
   <div class="navbar-header">
     <a class="navbar-brand" href="dashboard.php">ScoopsNSmile</a>
   </div>
   <ul class="nav navbar-nav">
     <li id="nav_dashboard"><a href="dashboard.php">Home</a></li>
     <li id="nav_customers"><a href="customers.php">Customers</a></li>
     <li id="nav_products"><a href="products.php">Products</a></li>
     <li id="nav_orders1"><a href="orders1.php">Order Details</a></li>
   </ul>
   <ul class="nav navbar-nav navbar-right">
     <li><a href='<?php echo $_SERVER['PHP_SELF'];?>?call=logout'><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
   </ul>
 </div>
</nav>

<script>
var x = window.location.pathname;
if(x.search("dashboard") != -1)
  { $("#nav_customers").removeClass("active"); $("#nav_products").removeClass("active"); $("#nav_dashboard").addClass("active"); $("#nav_orders1").removeClass("active");}
if(x.search("customers") != -1)
  { $("#nav_dashboard").removeClass("active"); $("#nav_products").removeClass("active"); $("#nav_customers").addClass("active"); $("#nav_orders1").removeClass("active");}
if(x.search("products") != -1)
  { $("#nav_dashboard").removeClass("active"); $("#nav_customers").removeClass("active"); $("#nav_products").addClass("active"); $("#nav_orders1").removeClass("active");}
  if(x.search("orders1") != -1)
  { $("#nav_dashboard").removeClass("active"); $("#nav_customers").removeClass("active"); $("#nav_products").removeClass("active"); $("#nav_orders1").addClass("active");}
</script>
