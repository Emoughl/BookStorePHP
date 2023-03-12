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
        echo "<script>window.location.replace('http://host2.org/cart.php'); </script>";

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
                                        <li>Thể Loại: <a href="/kind.php?Matheloai=<?php echo $row["Matheloai"]?>"><?php echo $row["Tentheloai"]?></a> <h3></li>
										<li>Nhà xuất bản: <a href="/nxb.php?manhasx=<?php echo $row["Manhasx"]?>"><?php echo $row["Tennhasx"]?></a> <h3></li>
									</ul>
								</div>
								<?php
                                 if($row["KhuyenMai"] == true)
								 {                                      
								?>
									<div class="price"><?php echo $row["giakhuyenmai"]?>.000 VNĐ<span><?php echo $row["Gia"]?>.000 VNĐ</span></div>
								<?php 
								}
								?>
								<?php
                                 if($row["KhuyenMai"] == false)
								 {
								?>
								    <p style="color:red">Không có khuyến mãi</p>
									<div class="price"><?php echo $row["Gia"]?>.000 VNĐ<span></span></div>
								<?php 
								}
								?>
	
								<div style="margin-top: 50px;">
								<form name="form3" id="ff3" method="POST" action="">
								<input type="submit" name="submit" id="add-to-cart" class="btn btn-2" value="Thêm vào giỏ hàng" />
								<a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal">Mua ngay</a>
								<input type="hidden" name="acction" value="them vao gio hang" />
								<input type="hidden" name="idsp" value="<?php echo $row["ID"] ?>" />
								</form>
								</div>
							
								
								<div class="modal fade" id="myModal" role="dialog">
							
    <div class="modal-dialog">
    
      <!--Thanh Toán-->
      <div class="modal-content"style="background: cadetblue;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center">Thông tin khách hàng</h4>
        </div>
        <div class="modal-body"style="margin-top: 40px;">
		<form name="form6" id="ff6" method="POST" action="<?php include "luumuangay.php" ?>"style="margin-left: 40px;width: 400px;">
		<div class="form-group">
		<input type="text" class="form-control" placeholder="Tên:" name="name" id="name" required>
		</div>
			<div class="form-group">
				<input type="email" class="form-control" placeholder="Email :" name="email" id="email" required>
				</div>
				<div class="form-group">
					<input type="tel" class="form-control" placeholder="Số Điện thoại :" name="phone" id="phone" required>
				</div>
				<div class="form-group">
				<input type="text" class="form-control" placeholder="Địa chỉ :" name="txtdiachi" id="txtdiachi" required>
                </div>
				<div class="form-group">
					<input type="number" class="form-control" placeholder="Số lượng:" name="txtsoluong" id="txtsoluong" required>
				</div>
				<div class="form-group">
				<label><input type="date" class="form-control" placeholder="Ngày giao  :" name="date" id="datechoose"  required ></label>
			</div>
			<div class="form-group"style="color: red;">
			<label> Hình thức thanh toán :<select class="selectpicker" name="hinhthuctt">
    			<option value="ATM">Trả thẻ</option>
    				<option value="Live">Trực tiếp</option>
  						</optgroup>
					</select>
					</lable>
			</div>
				<input type="hidden" name="idsp" value="<?php echo $row["ID"] ?>" />
				<input type="hidden" name="gia" value="<?php echo $row["Gia"] ?>" />
			<button type="submit" name="muangay"  class="btn btn-1">Đặt hàng</button>
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>
      
    </div>
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

