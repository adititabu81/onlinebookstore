<?php
	if(empty($_SESSION['id'])){
  echo "<div class=\"alert alert-danger\" role=\"alert\">
  You have not login, this page is not available
  </div>";
    die;
  }
?>
<div class="container mainContainer">


    	<table class="table table-hover">
  		<thead>
	    	<tr>
		    <th scope="col">Order</th>
		    <th scope="col">Item</th>
		    <th scope="col">Price</th>
		    <th scope="col">Quantity</th>
		    <th scope="col">Category</th>
		    <th scope="col">Date</th>
		    <th scope="col">Status</th>
	    	</tr>
  		</thead>
  		<tbody>
  			<?php
  				$pagesize=3;
  				$query = "SELECT t.order_id,order_date,order_status,price,quantity,category,book_name,book_cover_photo FROM transactions t JOIN books_transactions b ON b.order_id=t.order_id JOIN books k ON b.book_id = k.book_id WHERE customer_id='".$_SESSION['id']."' ORDER BY order_date DESC";
                $result = mysqli_query($link, $query);
                $numrows = mysqli_num_rows($result);
                $pages=intval($numrows/$pagesize)+1;
				if($_GET['pagenum']){
					$page=intval($_GET['pagenum']);
				} else {
					$page=1;
				}
				$offset=$pagesize*($page - 1);
				$query = $query." limit ".$offset.",".$pagesize;

				$result = mysqli_query($link, $query);
                while($row = $result->fetch_assoc()) {
                	echo "<tr>
	    	<th  scope=\"row\">".$row['order_id']."</th>
	      	<td width=180><img src=\"pic/".$row['book_cover_photo']."\"border=3 height=200 >".$row['book_name']."</img></td>
	      	<td>$ ".$row['price']."</td>
	      	<td>".$row['quantity']."</td>
	      	<td>".$row['category']."</td>
	      	<td>".$row['order_date']."</td>
	      	<td>".$row['order_status']."</td>
	    	</tr>";
            	}

  			?>

	    </tbody>
  		</table>
  			<?php
  				$first=1;
				$prev=$page-1;
				$next=$page+1;
				$last=$pages;

				if ($page > 1)
				{
					echo "<a href=\"?page=orders&pagenum=".$first."\">First Page  </a>";
					echo "<a href=\"?page=orders&pagenum=".$prev."\"> Previous</a> ";
				}

				if ($page < $pages)
				{
					echo "<a href=\"?page=orders&pagenum=".$next."\"> Next  </a>";
					echo "<a href=\"?page=orders&pagenum=".$last."\"> Tail   </a> ";
				}
			?>

</div>
<div style="clear: both;">
    <p>&nbsp</p>
    <p>&nbsp</p>
  </div>