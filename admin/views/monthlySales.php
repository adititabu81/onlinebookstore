<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales'],
          <?php
          //$servername = "localhost";
          //$username = "root";
          //$password = "shivASHA81";
          //$database = "bookstore";
          //$conn = new mysqli($servername, $username, $password, $database);

      // Check connection

              $sql = " call monthlysales_of_a_year('2017');";
              $result = mysqli_query($link, $sql);
              while($row = $result->fetch_assoc()) {
                echo "['".$row['sales_month']."',".$row['sales_percent']."],";
              }
          ?>
        ]);

        var options = {
          title: 'Sales By Each Month',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>