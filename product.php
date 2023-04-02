<?php
	session_start();
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
	<?php
   require 'inc/myconnect.php';
   //lay san pham theo id
   $id = $_GET["id"];
   $query="SELECT s.ID,s.Ten,s.date,s.Gia,s.HinhAnh,s.tacgia,s.KhuyenMai,s.giakhuyenmai,s.Mota, n.Ten as Tennhasx,s.Manhasx , l.Ten as Tentheloai,s.Matheloai
   from sanpham s 
   LEFT JOIN nhaxuatban n on n.ID = s.Manhasx 
   LEFT JOIN theloai l on l.ID = s.Matheloai
	WHERE  s.id =".$id;
   $result = $conn->query($query);
$row = $result->fetch_assoc();
if(isset($_POST['submit']))
{
    $idsp = $_POST["idsp"];
    $sl;
        if(isset($_SESSION['cart'][$idsp]))
        {
            $sl = $_SESSION['cart'][$idsp] +1;
        }
        else
        {
            $sl=1;
        }
        $_SESSION['cart'][$idsp] = $sl;
        echo "<script>history.go(-1);</script>";

}
?>
		<div class="container">
			<div class="row">

				<div id="main-content" class="col-md-8">
					<div class="product">
						<div class="col-md-6">
							<div class="image">
								<img src="images/<?php echo $row["HinhAnh"]?>" style="width:300px;height:400px" />
								
							</div>
						</div>
						<div class="col-md-6">
							<div class="caption">
								<div class="name"><h5><?php echo $row["Ten"]?></h5></div>
								<div class="info">
									<ul>
										<li>Tác giả: <b><?php echo $row["tacgia"]?></b></li>
                                        <li>Thể Loại: <a href="/BookStorePHP/kind.php?Matheloai=<?php echo $row["Matheloai"]?>"><?php echo $row["Tentheloai"]?></a> <h3></li>
										<li>Nhà xuất bản: <a href="/BookStorePHP/nxb.php?manhasx=<?php echo $row["Manhasx"]?>"><?php echo $row["Tennhasx"]?></a> <h3></li>
									</ul>
								</div>
								<?php
                                 if($row["KhuyenMai"] == true)
								 {                                      
								?>
									<div class="price">Giá : <?php echo $row["giakhuyenmai"]?>.000 VNĐ<span><?php echo $row["Gia"]?>.000 VNĐ</span></div>
								<?php 
								}
								?>
								<?php
                                 if($row["KhuyenMai"] == false)
								 {
								?>
								    <p style="color:red">Không có khuyến mãi</p>
									<div class="price">Giá : <?php echo $row["Gia"]?>.000 VNĐ<span></span></div>
								<?php 
								}
								?>
	
								<div style="margin-top: 50px;">
								<form name="form3" id="ff3" method="POST" action="">
								<input type="submit" name="submit" id="add-to-cart" class="btn btn-2" value="Thêm vào giỏ hàng" />
								
								<input type="hidden" name="acction" value="them vao gio hang" />
								<input type="hidden" name="idsp" value="<?php echo $row["ID"] ?>" />
								</form>
								</div>
							
								
								<div class="modal fade" id="myModal" role="dialog">
							
  </div>
	</div>
		</div>
		<div class="clear"></div>
		</div>	
		<div class="product-desc">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#description">Thông tin sách</a></li>
			</ul>
		<div class="tab-content">
			<div id="description" class="tab-pane fade in active">
			<div innerHTML>
             <p><?php echo $row["Mota"]?></p>
        </div>						
		</div>
	</div>
		</div>
	<?php 
	include "Samepd.php"
	?>
	
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>	

	<?php 
	include "footer.php"
	?>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">         
          <div class="modal-body">                
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
	
	<script>
	$(document).ready(function(){
		$(".nav-tabs a").click(function(){
			$(this).tab('show');
		});
		$('.nav-tabs a').on('shown.bs.tab', function(event){
			var x = $(event.target).text();         
			var y = $(event.relatedTarget).text();  
			$(".act span").text(x);
			$(".prev span").text(y);
		});
	});
	</script>
</body>
</html>
<script>
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    document.getElementById("datechoose").value = today;
</script>

