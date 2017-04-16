<?php 
  session_start();
  if (isset($_SESSION['userSession'])!="") {
    header("Location: home.php");
} 
require_once 'config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>bookMart</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Loading Bootstrap -->
  <link href="css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Loading Flat UI -->
  <link href="css/flat-ui.min.css" rel="stylesheet">
  <link href="css/myCSS.css" rel="stylesheet">

  <link rel="shortcut icon" href="img/favicon.ico">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
  <!--[if lt IE 9]>
    <script src="js/vendor/html5shiv.js"></script>
    <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
      <nav class="navbar navbar-inverse" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-5">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a class="navbar-brand" href="index.html">bookMart</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-5">
          <ul class="nav navbar-nav">
            <?php include('components/nav_menu.php'); ?>
          </ul>
         <!--
        <form class="navbar-form navbar-left" action="#" role="search">
          <div class="form-group">
            <div class="input-group">
              <input class="form-control" id="navbarInput-01" type="search" placeholder="Search">
              <span class="input-group-btn">
                <button type="submit" class="btn"><span class="fui-search"></span></button>
              </span>
            </div>
          </div>
        </form> 
      -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            
                  My Account 
                  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#" data-toggle="modal" data-target=".modalLogin" data-backdrop="true">Login</a></li>
                    <li class="divider"></li>
                    <li><a href="register.php">Register</a></li>
                  </ul>

        </li>
        <li><a class="btn" href="#" data-toggle="modal" data-target="#cartModal"><span class="visible-sm visible-xs" style="float:left;"><span class="glyphicon glyphicon-shopping-cart"></span> Cart<span id="cartCount_xs" class="badge" style="float:right;">0</span></span><span class="visible-md visible-lg"><span class="glyphicon glyphicon-shopping-cart" style="float:left;"></span><span id="cartCount" class="badge" style="float:right;">3</span></span></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>

<!-- Carousel -->
<?php include('components/main_carousel.php'); ?>
<!-- /.Carousel -->
  


</div>
<!-- /.container -->

<!-- CART MODAL -->

<div class="modal fade" tabindex="-1" id= "cartModal" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Shopping Cart</h4>
      </div>
      
      <div class="modal-body">

      <!-- For each distinct item in the cart, add a row -->
        
        <table class="table table-hover">
            <tr>
                <th class="hidden-xs"></th>
                <th>Name</th>
                <th class="text-center">Units</th>
                <th class="text-right">Price</th>
                <th></th>
            </tr>
            
            <tbody id="cartProductList">
                
                <!-- PRODUCT -->
                <tr class="cartProductDetails" id="ProductID1" name="ProductID1">
                    <td class="hidden-xs"><img class="img-responsive cartProductTile" src="img\_demo\A01.jpg"></td>
                    <td style="vertical-align:middle;">Only Time Will Tell</td>
                    
                    <td class="text-center" style="vertical-align:middle;">
                        <a href="#increaseCountandUpdate">
                            <span class="glyphicon glyphicon-plus-sign" style="float:inline; font-size:0.9em;"></span>
                        </a> 
                        
                        <span name="ProductID_count">2</span> 
                        
                        <a href="#decreaseCountandUpdate">
                            <span class="glyphicon glyphicon-minus-sign" style="float:inline;font-size:0.9em;"></span>
                        </a>
                    </td>
                    
                    <td class="text-right" style="vertical-align:middle;">499</td>
                    
                    <td class="text-center" style="vertical-align:middle;"><a href="#deleteProductFromCart"><span class="glyphicon glyphicon-trash" style="float:inline;font-size:0.9em;"></span></a></td>
                </tr>
                <!-- /.PRODUCT -->
            </tbody>
        </table>


      <div class="modal-footer">
        <div class = "row">
          <div class="col-xs-12 text-right"><p><strong>Total: 599 INR</strong></p></div>
        </div>
          
        <div class=row>
          <button type="button" class="btn btn-info" data-dismiss="modal" onclick="window.location.reload();">Save Changes</button>
          <button type="button" class="btn btn-success">Checkout</button>
        </div>
      </div>


    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
</div><!-- /.modal -->


<!-- /.CART MODAL -->



<!-- LOGIN MODAL -->
<?php include('components/login_modal.php'); ?>
<!-- /.LOGIN MODAL -->

<!-- DISPLAY PAGE -->
    <div class="container" id="ProductTileList1">
        <div class="row">
            <div class="col-xs-12 col-md-4 displayProductTile">
                <img class="img-responsive center-block" src="img/_demo/A01.jpg">
                <hr>
                <div class="row">
                    <div class="col-xs-7 col-xs-push-1 text-left">
                        <p><strong>Only Time Will Tell</strong><br>Jeffrey Archer</p>   
                    </div>
                    
                    <div class="col-xs-4 text-right">
                        <p>INR 499</p>    
                    </div>
                </div>
                
                <div class="row text-center">
                    <div class="col-xs-12">
                        <input type="text" size=2 id="productID_units" value=1>
                        <button class="btn btn-primary">Add To Cart</button>    
                    </div>
                </div>
            </div>
            
            <div class="col-xs-12 col-md-4 displayProductTile">
                <img class="img-responsive center-block" src="img/_demo/A01.jpg">
                <hr>
                <div class="row">
                    <div class="col-xs-7 col-xs-push-1 text-left">
                        <p><strong>Only Time Will Tell</strong><br>Jeffrey Archer</p>   
                    </div>
                    
                    <div class="col-xs-4 text-right">
                        <p>INR 499</p>    
                    </div>
                </div>
                
                <div class="row text-center">
                    <div class="col-xs-12">
                        <input type="text" size=2 id="productID_units" value=1>
                        <button class="btn btn-primary">Add To Cart</button>    
                    </div>
                </div>
            </div>
            
            
            <div class="col-xs-12 col-md-4 displayProductTile">
                <img class="img-responsive center-block" src="img/_demo/A01.jpg">
                <hr>
                <div class="row">
                    <div class="col-xs-7 col-xs-push-1 text-left">
                        <p><strong>Only Time Will Tell</strong><br>Jeffrey Archer</p>   
                    </div>
                    
                    <div class="col-xs-4 text-right">
                        <p>INR 499</p>    
                    </div>
                </div>
                
                <div class="row text-center">
                    <div class="col-xs-12">
                        <input type="text" size=2 id="productID_units" value=1>
                        <button class="btn btn-primary">Add To Cart</button>    
                    </div>
                </div>
            </div>
        
        
        
        
        
        
        
        
        
        </div>
    </div>
    
<!-- /.DISPLAY PAGE -->

<!-- FOOTER -->
<?php include('components/footer.php'); ?>
<!-- /.FOOTER -->

<!-- INCLUDE JS -->
<script src="js/vendor/jquery.min.js"></script>

<script src="js/vendor/video.js"></script>
<script src="js/flat-ui.min.js"></script>
<script src="js/myJS.js"></script>

<script>

</script>

</body>
</html>
