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
  				$query = "SELECT t.order_id,order_date,order_status,price,quantity,category,book_name,book_cover_photo FROM transactions t JOIN books_transactions b ON b.order_id=t.order_id JOIN books k ON b.book_id = k.book_id WHERE customer_id='".$_SESSION['id']."' ORDER BY order_date DESC";
                $result = mysqli_query($link, $query);
                while($row = $result->fetch_assoc()) {
                	echo "<tr>
	    	<th  scope=\"row\">".$row['order_id']."</th>
	      	<td width=180><img src=\"pic/".$row['book_cover_photo']."\"border=3 height=200 >".$row['book_name']."</img></td>
	      	<td>".$row['price']."</td>
	      	<td>".$row['quantity']."</td>
	      	<td>".$row['category']."</td>
	      	<td>".$row['order_date']."</td>
	      	<td>".$row['order_status']."</td>
	    	</tr>";
            	}
  			?>
  			
	    </tbody>
  		</table>
  	
    
</div>
<div style="clear: both;">
    <p>&nbsp</p>
    <p>&nbsp</p>
  </div>