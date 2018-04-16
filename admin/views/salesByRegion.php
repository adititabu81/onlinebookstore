<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Region', 'Profit'],
          <?php


              $sql = "SELECT region.region_name as region, SUM(transactions.total_cost_price) as profit FROM transactions JOIN store ON transactions.store_id=store.store_id JOIN region ON region.region_id=store.region GROUP BY store.region";
              $result = mysqli_query($link, $sql);
              while($row = $result->fetch_assoc()) {
                echo "['".$row['region']."',".$row['profit']."],";
              }
          ?>
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 600px; height: 500px;"></div>
  </body>
</html>