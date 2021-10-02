<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Our Morning Doe</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://d3js.org/d3.v4.min.js"></script>

    <link rel="stylesheet" href="template.css">
    <style>
        body {
            background-color: lightyellow;
        }

        .one {
            color: lightsteelblue;
            font-family: sans-serif;
            font-variant: small-caps;
            font-weight: 700;
            font-size: 18pt;
        }

        .bar {
            fill: lightcoral;
        }

        .bar:hover {
            fill: brown;
        }

        .axis--x path {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="theme">
            <div class="logoImage">
                <a><img src="Logo.png" width=200px /></a>
            </div>
            <br />

            <!--navigation bar-->
            <nav class="desc">
                <ul class="nav nav-pills">
                    <li><a href="template.html">Home</a></li>
                    <li><a href="AboutUs.php">About Us</a></li>
                    <li role="presentation" class="dropdown">
                        <a <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria- haspopup="true" aria-expanded="false">
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
        <h3>Item Price Data</h3>
        <p>View item price data ordered by Item ID</p>
        <svg width="3000" height="500"></svg>
        <script src="https://d3js.org/d3.v4.min.js"></script>
        <script>
            var svg = d3.select("svg"),
                margin = {
                    top: 20,
                    right: 20,
                    bottom: 30,
                    left: 40
                },
                width = +svg.attr("width") - margin.left - margin.right,
                height = +svg.attr("height") - margin.top - margin.bottom;

            var x = d3.scaleBand().rangeRound([0, width]).padding(0.1),
                y = d3.scaleLinear().rangeRound([height, 0]);
            var g = svg.append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");



            d3.json("getItemData.php", function(error, data) {
                if (error) throw error;


                data.forEach(function(d) {
                    d.letter = d.ItemDesc;
                    d.frequency = +d.itemPrice;
                })


                x.domain(data.map(function(d) {
                    return d.letter;
                }));
                y.domain([0, d3.max(data, function(d) {
                    return d.frequency;
                })]);

                g.append("g")
                    .attr("class", "axis axis--x")
                    .attr("transform", "translate(0," + height + ")")
                    .call(d3.axisBottom(x));

                g.append("g")
                    .attr("class", "axis axis--y")
                    .call(d3.axisLeft(y).ticks(4, "s"))
                    .append("text")
                    .attr("transform", "rotate(90)")
                    .attr("y", 6)
                    .attr("dy", "0.71em")
                    .attr("text-anchor", "end")
                    .text("Frequency");

                g.selectAll(".bar")
                    .data(data)
                    .enter().append("rect")
                    .attr("class", "bar")
                    .attr("x", function(d) {
                        return x(d.letter);
                    })
                    .attr("y", function(d) {
                        return y(d.frequency);
                    })
                    .attr("width", x.bandwidth())
                    .attr("height", function(d) {
                        return height - y(d.frequency);
                    });
            });
        </script>

        <footer class="foot">
            <br />
            <p><a href="LandingPageEmp_Keith.php">Back to dashboard</a></p><br />
            <br />
        </footer>
    </div>

</body>

</html>