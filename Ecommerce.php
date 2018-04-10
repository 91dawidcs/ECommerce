<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--Name of the page-->
    <title>Tathata</title>

  
    <!-- Bootstrap css -->
    <link href="css/bootstrap.css" rel="stylesheet">
   
    <!-- Bootstrap themes css -->
    <link rel="stylesheet" type="css/bootstrap-theme.min.css" href="">

    <!-- Background -->
    <style type="text/css">

    body{


	 	background-image: url(backgroundMin.jpg);
	 	background-size: 100%;	
	 	background-repeat: no-repeat;
    }

</style>
</head>
<body>

 
    

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
      	<img src="logo2.png" style="">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Find Item">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
      </ul>

      <!--navbar for other pages-->
      <ul class="nav navbar-nav navbar-left">

        <li><a href="JoinUs.html">Join us</a></li>
        <li><a href="login.html">Login/Logout</a></li>
        <li><a href="AboutUs.html">About</a></li>

      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="shoppingCart.html" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span>   Items   </a>
        </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

</nav>

  <!-- Page Content -->
  
  <div class="container">

  <td><a href="shoppingCart.html" class="btn btn-warning"><i class="fa fa-angle-left"></i> Check Basket</a></td>

  <h1>Tathata</h1>

        <!-- PHP loads product information -->        
        <?php

        //Connect to MongoDB and select database
        $mongoClient = new MongoClient();
        $db = $mongoClient->ecommerce;
        
        //Find all products
        $products = $db->products->find();

        //Output results onto page
        if($products->count() > 0){
            echo '<table width="100%" cellspacing="2" cellpadding="0" border="0" align="center"';
            echo '<tr><th>ID</th><th>Name</th><th>Description</th><th>Size</th></tr>';
            foreach ($products as $document) {
                echo '<tr>';
                echo '<td>' . $document["_id"] . "</td>";
                echo '<td>' . $document["productname"] . "</td>";
                echo '<td>' . $document["description"] . "</td>";
                echo '<td><button onclick=\'addToBasket("' . $document["_id"] . '", "' . $document["productname"] . '")\'>';
                echo '<img class="addButtonImg" width="20px" height="20px" src="basket-add-icon.png"></button></td>';
                echo '</tr>';
            }
            echo '</table>';
        }

        //Close the connection
        $mongoClient->close();

        ?>

    </div>



	<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <script src="basket.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>