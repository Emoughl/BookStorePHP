<div class="product-related">
	<div class="heading"><h2>Sách liên quan</h2></div>
		<div class="products">
	<?php
   require 'inc/myconnect.php';
   $Matheloai = $row["Matheloai"];
   $truyvan="SELECT ID,Ten,Gia,HinhAnh
   from sanpham 
	WHERE  Matheloai = '$Matheloai'  limit 3 " ;
   $re = $conn->query($truyvan);
   if ($re ->num_rows > 0) {
	while($dong = $re ->fetch_assoc()) {

?>

	<div class="col-lg-4 col-md-4 col-xs-12">
		<div class="product">
			<div class="image"><a href="product.php?id=<?php echo $dong["ID"]?>"><img src="images/<?php echo $dong["HinhAnh"]?>" style="width:300px;height:300px"/></a></div>
				<div class="caption">
					<div class="name"><h3><a href="product.php?id=<?php echo $dong["ID"]?>"><?php echo $dong["Ten"]?></a></h3></div>										
					</div>
		</div>
			</div>
		<?php 
	}
}
	?>
</div>