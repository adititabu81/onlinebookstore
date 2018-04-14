<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Store','Profit $'],
          <?php
              $sql = "SELECT store_id, SUM(price*quantity) as profit FROM books_transactions JOIN transactions ON books_transactions.order_id=transactions.order_id GROUP BY store_id ORDER BY profit DESC";
              $result = mysqli_query($link, $sql);
              while($row = $result->fetch_assoc()) {
                echo "['".$row['store_id']."',".$row['profit']."],";
              }
          ?>
        ]);

        var data2 = google.visualization.arrayToDataTable([
          ['Store','Sales'],
          <?php
              $sql = "SELECT store_id,count(*) as sales, SUM(price*quantity) as profit FROM books_transactions JOIN transactions ON books_transactions.order_id=transactions.order_id GROUP BY store_id ORDER BY sales DESC";
              $result = mysqli_query($link, $sql);
              while($row = $result->fetch_assoc()) {
                echo "['".$row['store_id']."',".$row['sales']."],";
              }
          ?>
        ]);

        var options = {
          chart: {
            title: 'Store Performance',
            subtitle: 'Store, Profit: 2013-2018',
          },
          hAxis: {
          viewWindow: {
                  min: 8000,
                  max: 12000
              },
              ticks: [8000, 9000, 10000, 11000, 12000] // display labels every 25
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var options2 = {
          chart: {
            title: 'Store Performance',
            subtitle: 'Store, Sales : 2013-2018',
          },

          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var chart2 = new google.charts.Bar(document.getElementById('barchart_material2'));

        chart2.draw(data2, google.charts.Bar.convertOptions(options2));

      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 1000px;"></div>
    <div id="barchart_material2" style="width: 900px; height: 1000px;"></div>
  </body>
</html>