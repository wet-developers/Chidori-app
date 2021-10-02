<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product employees</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="reviewStyle.css">
    <style>
		body	{ background-color: lightyellow;}
		.one	{ color: lightsteelblue;
				  font-family: sans-serif;
				  font-variant: small-caps;
				  font-weight: 700;
				  font-size: 18pt; }

    .bar {
      fill: darkolivegreen;
    }

    .bar:hover {
      fill: tan;
    }

    .axis--x path {
      display: none;
    }
  </style>

  <script>

    //ajax in jQuery
    $(function(){
      $("#emailDropDown").change(function(){
        $.ajax({
          url:"getInfo_John.php?id=" + $("#emailDropDown").val(),
          async:true,
          success: function(result){
            $("#contentArea").html(result);
          }
        })
      })
    })
	</script>


</head>

<body>
    <br />
    <div class="container-fluid">
      <div class="theme">
      <div class="logoImage">
        <a><img src="Logo.png" width=400px /></a>
      </div>
    
      <!--navigation bar-->
      <nav class="desc">
        <ul class="nav nav-pills">
          <li><a href="template.html">Home</a></li>
          <li><a href="#">About Us</a></li>
          <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria- haspopup="true" aria-expanded="false">
              Menu<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="OrderOnlinePage_Test.php">Order Online</a></li>
              <li><a href="OrderOnlinePage_Ryan.html">Menu Items</a></li>
              <li><a href="OrderHistoryPage_Ryan.html">Order History</a></li>
            </ul>
          </li>
          <li><a href="employeePage_Andre.php">employees</a></li>
          <li><a href="CustomerLoginPage_Andre.php">Customers</a></li>
          <li><a href="EmployeeLoginPage">Employees</a></li>
        </ul>
      </nav>
      <br />
      </div>
      <br />

  <p><strong>Employee Ages</strong></p>
  <svg width="1200" height="400"></svg>

  <!--D3 script-->
  <script src="https://d3js.org/d3.v4.min.js"></script>
  <script>
    var svg = d3.select("svg"),
        margin = {top: 20, right: 30, bottom: 20, left: 40},
        width = +svg.attr("width") - margin.left - margin.right,
        height = +svg.attr("height") - margin.top - margin.bottom;

    var x = d3.scaleBand().rangeRound([0, width]).padding(0.1),
        y = d3.scaleLinear().rangeRound([height, 0]);
    console.log(y(3));
    var g = svg.append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

    d3.json("getEmployeeData_John.php?employeeEmail=<?php
      if(isset($_GET['employeeEmail'])) 
        echo $_GET['employeeEmail'];
      else
        echo "0";
    ?>", function(error, data) {
      if (error) throw error;

      data.forEach(function(d){
        d.letter = d.employeeEmail;
        d.frequency = +d.employeeAge;
      })

      x.domain(data.map(function(d) { return d.letter; }));
      y.domain([0, d3.max(data, function(d) { return d.frequency; })]);

      g.append("g")
          .attr("class", "axis axis--x")
          .attr("transform", "translate(0," + height + ")")
          .call(d3.axisBottom(x));

      g.append("g")
          .attr("class", "axis axis--y")
          .call(d3.axisLeft(y).ticks(4,"s"))
        .append("text")
          .attr("transform", "rotate(-90)")
          .attr("y", 6)
          .attr("dy", "0.71em")
          .attr("text-anchor", "end")
          .text("Frequency");

      g.selectAll(".bar")
        .data(data)
        .enter().append("rect")
          .attr("class", "bar")
          .attr("x", function(d) { return x(d.letter); })
          .attr("y", function(d) { return y(d.frequency); })
          .attr("width", x.bandwidth())
          .attr("height", function(d) { return height - y(d.frequency); });
    });
  </script>
  <br/>
  <br/>
  <br/>


  <p><strong>Trying to find an Employee ID?</strong></p>
  <p>Search Email to find Employee ID</p>
  <form>
  <label> Search for Order with Identification: &nbsp;&nbsp;
    <select name="employeeEmail" id="emailDropDown">
      <?php
        require_once("db.php");
        $sql = "SELECT employeeID from bit4444group27.employee ORDER BY employeeID";
        $result = $mydb->query($sql);
        while($row=mysqli_fetch_array($result)){
          echo "<option value='".$row["employeeID"]."'>".$row["employeeID"]."</option>";
        }
      ?>
    </select>
  </label><br />
  <div id="contentArea">&nbsp;</div>

      </form>
      <div id="contentArea">&nbsp;</div>

    <br/>

    <table border="1" class="employeeTable">
      <thead>
        <tr>
          <th width="40">
            Employee ID
          </th>
          <th width="200">
            Employee Date of Birth
          </th>
          <th width="50">
            Employee Phone Number
          </th>
        </tr>
        </thead>

        <tbody>
          <tr>
            <td>
            <?php
            require_once("db.php");
            $sql = "SELECT employeeID FROM employee ORDER BY employeeID";
            $result = $mydb->query($sql);
            while($row=mysqli_fetch_array($result)){
              echo "<option value='".$row["employeeID"]."'>".$row["employeeID"]."</option>";
            }
            ?> 
            </td>
            <td>
            <?php
            require_once("db.php");
            $sql = "SELECT employeeDOB FROM employee ORDER BY employeeID";
            $result = $mydb->query($sql);
            while($row=mysqli_fetch_array($result)){
              echo "<option value='".$row["employeeDOB"]."'>".$row["employeeDOB"]."</option>";
            }
            ?> 
            </td>
            <td>
            <?php
            require_once("db.php");
            $sql = "SELECT employeePhone FROM employee ORDER BY employeeID";
            $result = $mydb->query($sql);
            while($row=mysqli_fetch_array($result)){
              echo "<option value='".$row["employeePhone"]."'>".$row["employeePhone"]."</option>";
            }
            ?> 
            </td>
          </tr>
        </tbody>
    </table>


    <br />
        <footer class="foot">
            <br /><br /><br /><br />
        </footer>


</body>
</html>
