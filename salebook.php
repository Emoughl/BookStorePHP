<div class="row">
	<div class="col-lg-12">
		<div class="heading"><h2>Sách đang khuyến mãi</h2></div>
			<div class="products">
<?php
require 'inc/truyvan.php';
   if ($result->num_rows > 0) {
	   while($row = $result->fetch_assoc()) {
?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	<div class="product">
		<div class="image"><a href="product.php?id=<?php echo $row["ID"]?>"><img src="images/<?php echo $row["HinhAnh"]?>" style="width:300px;height:300px" /></a></div>
			<div class="caption">
				<div class="name"><h3><a href="product.php?id=<?php echo $row["ID"]?>"><?php echo $row["Ten"]?></a></h3></div>
<?php
    if($row["Khuyenmai"] == true){                                      
?>
	<div class="price" style="color: red;"><?php echo $row["Giakhuyenmai"]?>,000₫<span style="font-size: 14px;"><?php echo $row["Gia"]?>,000₫</span></div>
<?php 
	}
?>
<div class="g-plusone" data-size="medium" data-annotation="none" data-href="/product.php?id=<?php echo $row["ID"] ?>"></div>
	</div>
		</div>
			</div>
<?php
	}
}
?>
	</div>
		</div>
			</div>
			