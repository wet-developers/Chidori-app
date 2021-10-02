<?php

 ?>


<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="loginPages.css">
  <title>Our Morning Doe</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="template.css">

  <style>
		body	{ background-color: lightyellow;}
		.one	{ color: lightsteelblue;
				  font-family: sans-serif;
				  font-variant: small-caps;
				  font-weight: 700;
				  font-size: 18pt; }
  </style>
</head>

<body>
  <section id="1">
  <div class="container-fluid">
    <div class="theme">
    <div class="logoImage">
        <a><img src="Logo.png" width=200px /></a>
    </div>
      <h1>Our Morning Doe</h1>
      <p>Local Breakfast diner in the Blacksburg, Virginia</p>
    </div>
    <br />

    <!--navigation bar for entire webpage-->
    <nav class="desc">
      <ul class="nav nav-pills">
        <li><a href= "template.html">Home</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria- haspopup="true" aria-expanded="false">
            Menu<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="OrderOnlinePage_Ryan.php">Order Online</a></li>
            <li><a href="MenuItemsPage_Ryan.html">Menu Items</a></li>
            <li><a href="OrderHistoryPage_Ryan.php">Order History</a></li>
          </ul>
        </li>
          <li><a href="createReview_Andre.php">Reviews</a></li>
          <li><a href="CustomerLoginPage_Andre.php">Customers</a></li>
          <li><a href="EmployeeLoginPage_Keith.php">Employees</a></li>
          <li><a href="ManagerLogin_John.php">Managers</a></li>
      </ul>
    </nav>
    <br />

    </div>
  </section>


  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
  <h1 class="one">Learn More About Us</h1>
  <p class="loginTable"> <br>
      Our Morning Do' Bakery & Bistro, established in 2020, has steadily grown from a small bakery into a bustling breakfast area and casual eat-in for Hokies all around. 
    <br><br>
    We serve breakfast, lunch, and dinner as well as a variety of pastries, cakes, pies and ESPECIALLY breads.  
    <br><br>
    We are passionate about the art of baking and hospitality. Our goal is to bring our patrons the best food and customer service possible. 
    We understand during this tough time, many will not be able, or comfortable in coming into the resturant. Hopefully, our website will create the ease of access you 
    need for your favorite place to eat. 
    <br><br>

    Fresh hot breakfast items and pastries can be enjoyed with organic gourmet coffee 
    or Italian espresso drinks. <br>
    Lunch is made fresh daily featuring sandwiches made from fresh baked bread, whole grain salads, made-from-scratch 
    soups and special-of-the-day entree items. <br>
    For dinner we specialize in French-inspired cuisine. <br><br>

Owned by Ryan Pelto, Andre Houtz, Keith Marshall and John Tillinghast <br> <br>
</p>




<br>
<br>

    <!--Carousal-->
    <div id="carousel1" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel1" data-slide-to="0" class="active"></li>
        <li data-target="#carousel1" data-slide-to="1"></li>
        <li data-target="#carousel1" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="images/bagels2.jpg">
          <div class="carousel-caption">
            <h2>Homemade Bagels</h2>
          </div>
        </div>

        <div class="item">
          <img src="images/egg_benedict2.jpg">
          <div class="carousel-caption">
            <h2>Scrumptious Eggs Benedict</h2>
          </div>
        </div>

        <div class="item">
          <img src="images/pancake2.jpg">
          <div class="carousel-caption">
            <h2>Fresh Pancakes</h2>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel1" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

</html>


