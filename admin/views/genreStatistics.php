<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Genre', 'sales'],
          <?php
              $sql = "SELECT genre.genre,COUNT(*) as sales FROM books_transactions JOIN genre on books_transactions.book_id=genre.book_id GROUP BY genre.genre ORDER BY sales DESC";
              $result = mysqli_query($link, $sql);
              while($row = $result->fetch_assoc()) {
                echo "['".$row['genre']."',".$row['sales']."],";
              }
          ?>
        ]);

        var options = {
          title: 'Chess opening moves',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Sales of each genre',
                   subtitle: '' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Sales'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
  </head>
  <body>
    <div id="top_x_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>