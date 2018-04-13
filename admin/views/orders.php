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
		    <th scope="col">salesperson_ID</th>
		    <th scope="col">Operation</th>
	    	</tr>
  		</thead>
  		<tbody>
  			<?php
  				$pagesize=3; 
  				$query = "SELECT t.order_id,order_date,order_status,price,quantity,category,book_name,book_cover_photo,salesperson_id FROM transactions t JOIN books_transactions b ON b.order_id=t.order_id JOIN books k ON b.book_id = k.book_id WHERE t.store_id='".$_COOKIE['store_id']."' AND salesperson_id IS NULL OR salesperson_id='".$_COOKIE["id"]."' ORDER BY order_date DESC";
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
                echo " <form method=POST action=\"?page=updateOrder\"><tr>
	    	<td >".$row['order_id']."<input type=\"text\" name=\"order_id\" value=\"".$row['order_id']."\" hidden></td>
	      	<td width=180><img src=\"../pic/".$row['book_cover_photo']."\"border=3 height=200 >".$row['book_name']."</img></td>
	      	<td>$ ".$row['price']."</td>
	      	<td>".$row['quantity']."</td>
	      	<td>".$row['category']."</td>
	      	<td>".$row['order_date']."</td>
	      	<td><input type=\"text\" value=\"".$row['order_status']."\" name=\"order_status\" class=\"field left\"></td>
	      	<td>".$row['salesperson_id']."</td>
	      	<td><input type=\"submit\" class=\"btn btn-outline-danger\" value=\"Update\" />  
			<a href=\"?page=deleteOrder&orderid=".$row['order_id']."\" class=\"btn btn-outline-danger\">Delete</a>
	      	</td>
	    	</tr></form>";
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