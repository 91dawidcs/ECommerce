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
        <li><a href="product.php">Products <span class="sr-only">(current)</span></a></li>
      </ul>

      <!--navbar for other pages-->
      <ul class="nav navbar-nav navbar-left">

        <li ><a href="Orders.html">Orders</a></li>

      </ul>

      <ul class="nav navbar-nav navbar-left">

        <li class="active" ><a href="customerData.php">Modify/delete customer data</a></li>

      </ul>

      <ul class="nav navbar-nav navbar-left">

        <li ><a href="productData.html">Modify/delete product data</a></li>

      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

</nav>

<div class="container">

           
    <h1> Modify customer data </h1>

    <form action="customer_update_forms.php" method="post">
            Search criteria: <input type="text" name="search" required><br>
            <input type="submit">
    </form>

</div>

<div class="container">

	<h1> Delete customer data </h1>

	<form action="delete_customer.php" method="post">
            Customer ID: <input type="text" name="id" required>
            <input type="submit">
    </form>
    <br>
    <br>

    <h1> Customers </h1>

    <!-- PHP loads product information -->        
        <?php

        //Connect to MongoDB and select database
        $mongoClient = new MongoClient();
        $db = $mongoClient->ecommerce;
        
        //Find all products
        $customers = $db->customers->find();

        //Output results onto page
        if($customers->count() > 0){
           
            echo '<table width="100%" cellspacing="2" cellpadding="0" border="0" align="center"';
            echo '<tr><th>ID</th><th>Name</th></tr>';
            foreach ($customers as $document) {
                echo '<tr>';
                echo '<td>' . $document["_id"] . "</td>";
                echo '<td>' . $document["name"] . "</td>";
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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>