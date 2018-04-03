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
<<<<<<< Updated upstream
        <li c lass="active"><a href="product.html">Products <span class="sr-only">(current)</span></a></li>
=======
        <li c lass="active"><a href="product.php">Products <span class="sr-only">(current)</span></a></li>
>>>>>>> Stashed changes
      </ul>

      <!--navbar for other pages-->
      <ul class="nav navbar-nav navbar-left">

        <li><a href="orders.html">Orders</a></li>

      </ul>

<<<<<<< Updated upstream
=======
        <ul class="nav navbar-nav navbar-left">

        <li ><a href="customerData.html">Modify/delete customer data</a></li>

      </ul>

      <ul class="nav navbar-nav navbar-left">

        <li ><a href="productData.html">Modify/delete product data</a></li>

      </ul>

>>>>>>> Stashed changes
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

</nav>

<!-- Button to add new product-->
<td><a style="font-size: 25px" href="addproduct.html" class="btn btn-success btn-block">Add New Product <i class="fa fa-angle-right"></i></a></td>


 <div class="container">

           
    <h1> Products </h1>

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
            echo '<tr><th>ID</th><th>Name</th><th>Quantity</th><th>Price</th></tr>';
            foreach ($products as $document) {
                echo '<tr>';
<<<<<<< Updated upstream
                echo '<td>' . $document["productid"] . "</td>";
=======
                echo '<td>' . $document["_id"] . "</td>";
>>>>>>> Stashed changes
                echo '<td>' . $document["productname"] . "</td>";
                echo '<td>' . $document["quantity"] . "</td>";
                echo '<td>' . $document["price"] . "</td>";
                echo '</tr>';
            }
            echo '</table>';
       
        }

        //Close the connection
        $mongoClient->close();

        ?>

  </div>

<td><a style="font-size: 15px" href="loginAdmin.html" class="btn btn-success btn-block">Proceed to Logout <i class="fa fa-angle-right"></i></a></td>



      <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>