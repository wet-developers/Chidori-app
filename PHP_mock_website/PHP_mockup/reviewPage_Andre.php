<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product Reviews</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="reviewStyle.css">
    <style>

    .bar {
      fill: steelblue;
    }

    .bar:hover {
      fill: brown;
    }

    .axis--x path {
      display: none;
    }
  </style>

  <!--AJAX Script-->
  <script>
    function getContent() {
      var id = document.forms[0].supplierid.value;
      var z = document.getElementById("contentArea");
      if(id==0) {
        z.innerHTML = "";
      } else {
        try {
          asyncRequest = new XMLHttpRequest();  //create request object

          //register event handler
          asyncRequest.onreadystatechange=stateChange;
          var url="getInfo_Andre.php?id="+id;
          asyncRequest.open('GET',url,true);  // prepare the request
          asyncRequest.send(null);  // send the request
        }
          catch (exception) {alert("Request failed");}

      }

      function stateChange() {
        // if request completed successfully
        if(asyncRequest.readyState==4 && asyncRequest.status==200) {
          document.getElementById("contentArea").innerHTML=
            asyncRequest.responseText;  // places text in contentArea
        }
      }
    }
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
          <li><a href="reviewPage_Andre.php">Reviews</a></li>
          <li><a href="CustomerLoginPage_Andre.php">Customers</a></li>
          <li><a href="EmployeeLoginPage">Employees</a></li>
        </ul>
      </nav>
      <br />
      </div>
      <br />
  <p><strong>Popular Products</strong></p>
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

    d3.json("getReviewData_Andre.php?itemName=<?php
      if(isset($_GET['itemName'])) 
        echo $_GET['itemName'];
      else
        echo "0";
    ?>", function(error, data) {
      if (error) throw error;

      data.forEach(function(d){
        d.letter = d.itemName;
        d.frequency = +d.rating;
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


  <p><strong>Interested in saving a Product ID for later?</strong></p>
  <p>Search Product by Product ID</p>
  <form>
        <select name="supplierid" onchange="getContent()">
          <option value="">Select a Product ID you wish to find</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
        </select>
      </form>
      <div id="contentArea">&nbsp;</div>

    <br/>

    <table border="1" class="reviewTable">
      <thead>
        <tr>
          <th width="40">
            Item
          </th>
          <th width="200">
            Review Text
          </th>
          <th width="50">
            Rating
          </th>
        </tr>
        </thead>

        <tbody>
          <tr>
            <td>
            <?php
            require_once("db.php");
            $sql = "SELECT itemName FROM review ORDER BY reviewID";
            $result = $mydb->query($sql);
            while($row=mysqli_fetch_array($result)){
              echo "<option value='".$row["itemName"]."'>".$row["itemName"]."</option>";
            }
            ?> 
            </td>
            <td>
            <?php
            require_once("db.php");
            $sql = "SELECT reviewText FROM review ORDER BY reviewID";
            $result = $mydb->query($sql);
            while($row=mysqli_fetch_array($result)){
              echo "<option value='".$row["reviewText"]."'>".$row["reviewText"]."</option>";
            }
            ?> 
            </td>
            <td>
            <?php
            require_once("db.php");
            $sql = "SELECT rating FROM review ORDER BY reviewID";
            $result = $mydb->query($sql);
            while($row=mysqli_fetch_array($result)){
              echo "<option value='".$row["rating"]."'>".$row["rating"]."</option>";
            }
            ?> 
            </td>
          </tr>
        </tbody>
    </table>

    <table class="createReview">
          <tr>
            <td><p class="returnText"><a href="createReview_Andre.php">Want to leave a review?</a></p></td>
          </tr>
        </table>


    <br />
        <footer class="foot">
            <br /><br /><br /><br />
        </footer>


</body>
</html>
