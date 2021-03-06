<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Profit'],
          <?php


              $sql = "SELECT DATE_FORMAT(transactions.order_date, '%Y') as year, SUM(books_transactions.price*books_transactions.quantity) as profit, SUM(books_transactions.quantity) as quantity FROM transactions JOIN books_transactions on transactions.order_id=books_transactions.order_id GROUP BY DATE_FORMAT(transactions.order_date, '%Y')";
              $result = mysqli_query($link, $sql);
              while($row = $result->fetch_assoc()) {
                echo "['".$row['year']."',".$row['quantity'].",".$row['profit']."],";
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
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
  </body>
</html>