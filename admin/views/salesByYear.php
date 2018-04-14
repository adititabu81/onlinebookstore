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


              $sql = "SELECT DATE_FORMAT(transactions.order_date, '%Y') as year,SUM(total_cost_price)*100/(SELECT SUM(total_cost_price) from transactions) as salespercentage FROM transactions GROUP BY DATE_FORMAT(transactions.order_date, '%Y')";
              $result = mysqli_query($link, $sql);
              while($row = $result->fetch_assoc()) {
                echo "['".$row['year']."',".$row['salespercentage']."],";
              }
          ?>
        ]);

        var options = {
          title: 'Sales By Each Year',
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