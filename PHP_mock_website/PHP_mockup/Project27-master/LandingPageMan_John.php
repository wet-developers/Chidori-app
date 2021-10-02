<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="loginPages.css">
  <title>Our Morning Do'</title>
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
      <h1>Our Morning Do'</h1>
      <p>Local Breakfast diner in the Blacksburg, Virginia</p>
    </div>
    <br />

    <!--navigation bar for entire webpage-->
    <nav class="desc">
      <ul class="nav nav-pills">
        <li><a href= "template.html">Home</a></li>
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
  <h1 class="one">Manager Dashboard</h1>
  <p>To modify an existing account, <a href="ModifyManager_John.php">click here</a> </p>
  <p>To delete an existing account, <a href="DeleteManager_John.php">click here</a> </p>
  <p>To look at Employee Data Analyzation, <a href="http://localhost/project/project27-master/EmployeePage_John.php">click here</a> </p>

  <br /> <br />
  <footer class="foot">
        <br /><br /><br /><br />
  </footer>

</html>

