	

	<a href="?action=add" class="btn btn-primary">Add product</a>
				<br><br>
				<table class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<th>id</th>
							<th>name</th>
							<th>price</th>
							<th>sale</th>
							<th>image</th>
							<th>category</th>
							<th>controls</th>
						</tr>
					</thead>
					<tbody>
			<?php
          
          include 'functions/connect.php';
          $query= $conn ->query("SELECT * FROM products");
          foreach($query as $product){

			?>
						<tr>
							<td><?= $product['id'] ?></td>
							<td><?= $product['name'] ?></td>
							<td><?= $product['price'] ?></td>
							<td><?= $product['sale'] ?></td>
							<td><img style="width:100px"  src="images/<?= $product['img'] ?>" alt=""></td>
							<td><?php

							$cat_id = $product['cat_id'] ;
							$selectCat = "SELECT name FROM categories WHERE id = $cat_id";
							$queryCat = $conn -> query($selectCat);
							$cat = $queryCat -> fetch_assoc();
							echo $cat['name'];


							 ?></td>
							<td>controls</td>
						</tr>

			<?php } ?>

					</tbody>
					
				</table>