
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
              if($_POST['year']){
              $sql = " call monthlysales_of_a_year('".$_POST['year']."');";
              $result = mysqli_query($link, $sql);
              while($row = $result->fetch_assoc()) {
                echo "['".$row['sales_month']."',".$row['sales_percent']."],";
              }
            }
          ?>
        ]);
        <?php
        if($_POST['year']){
          echo "var options = {
          title: 'Sales By Each Month Of ".$_POST['year']."',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options)"
          ;
        }
        ?>
      }

    </script>
  </head>
  <body>
    <div class="col-md-4 order-md-1 mb-4">
    <form method="POST" action="?page=monthlySales" >
      <select class="form-control my-2 my-lg-3" name="year">
      <option >Select a year</option>
      <option value="2018">2018</option>
      <option value="2017">2017</option>
      <option value="2016">2016</option>
      <option value="2015">2015</option>
      <option value="2014">2014</option>
      <option value="2013">2013</option>
      </select>
      <button class="btn btn-info my-2 my-sm-0" type="submit">Select</button>
    </form>
    </div>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>