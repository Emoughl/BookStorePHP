<?php 
	include "login.php"
	?>
<?php 
	include "frist.php"
	?>
	  <?php 
	include "header.php"
	?>
	<?php 
	include "navigation.php"
	?>
	<div id="page-content" class="single-page">
		<div class="container">

			<div class="row">
            <?php 
	        include "sidebar.php"
            ?>
				<div id="main-content" class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<div class="products">
							<?php
							   require 'inc/myconnect.php';
							   $result = mysqli_query($conn, "select count(ID) as total from sanpham " );
							   $row = mysqli_fetch_assoc($result);
							   $total_records = $row['total'];
							   $offset =1;
							   $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
							   $limit = 6;
							   $total_page = ceil($total_records / $limit);
							   if ($current_page > $total_page){
								   $current_page = $total_page;
							   }
							   else if ($current_page < 1){
								   $current_page = 1;
							   }
							   $start = ($current_page - 1) * $limit;
							   $result = mysqli_query($conn, "SELECT * FROM sanpham   LIMIT $start, $limit " );
	while ($row = mysqli_fetch_assoc($result)){

?>

								<div class="col-lg-4 col-md-4 col-xs-12">
								<div class="product">
								<div class="image"><a href="product.php?id=<?php echo $row["ID"]?>"><img src="images/<?php echo $row["HinhAnh"]?>" style="width:300px;height:300px"/></a></div>
								<div class="caption">
									<div class="name"><h3><a href="product.php"><?php echo $row["Ten"]?></a></h3></div>
									<div class="price"><?php echo $row["Gia"] ?>.000 VNĐ<span></span></div>
								</div>
							</div>
								</div>
								<?php
		}
					?>
							</div>
						</div>
	
					</div>
		
					<div class="row text-center">
						<ul class="pagination">
						<?php 
			for ($i = 1; $i <= $total_page; $i++){
				if ($i == $current_page){

					   ?>
					   <li class="active"><a href="#"><?php echo $i ?></a></li>					   
						  <?php 
				}

			?>
			<?php
			if($i != $current_page){
			 ?>	
			 	  <li><?php echo '<a href="Nosearch.php?&page='.$i.'">'.$i.'</a> '; ?></li>
			 <?php
			}
			  ?>	
						  <?php 
			}
						  ?>
						</ul>
					</div>
		
				</div>
			</div>
		</div>
	</div>	
	<?php 
	include "footer.php"
	?>
    </body>
</html>

