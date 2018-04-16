
<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['bar']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
            <?php
          $servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "bookstore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

          $query = "SELECT left(books.book_name, 20) as n,SUM(quantity) AS t FROM books_transactions JOIN books ON books_transactions.book_id = books.book_id GROUP BY books_transactions.book_id ORDER BY  t DESC LIMIT 10;";

$stmt = $conn->prepare($query);
    $stmt->execute();

    $stmt->store_result();
    $num_of_rows = $stmt->num_rows;

    $stmt->bind_result($id,$qty);
echo "var data = new google.visualization.arrayToDataTable([['BookName','Quantity'],";
          while($stmt->fetch()) {
              $string = addslashes($id);
 echo "['".$string."', ".$qty."],";
}
 echo "]);";
          ?>
   var options = {
        title: "Most Popular Books",
        width: 1000,
        height: 500,
        bars: 'horizontal',
       hAxis: {
            minValue: 0,
            ticks: [0, 1000, 2000, 3000, 4000]
          }
      };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        chart.draw(data, options);
      };
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>

  </body>
</html>

