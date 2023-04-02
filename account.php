<?php
ob_start();
session_start();
 ?>
<?php
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
	<?php
$tk = "" ;
$mk = "" ;
$kq = "";
if(isset($_POST['submit']))
{
    require 'inc/myconnect.php';
    $tk = $_POST['txtus'] ;
    $mk = $_POST['txtem'];
    $sql="SELECT * FROM loginuser  where email = '$tk'  and matkhau = '$mk'  ";
    $result = $conn->query($sql);
    // echo  $mk;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
        $_SESSION['txtus'] = $tk ;
        $_SESSION['HoTen'] = $row["HoTen"];
        $_SESSION['email'] = $row["email"];
        $_SESSION['dienthoai'] = $row["DienThoai"];
            header('Location: cart.php');
            $row = $result->fetch_assoc();  
        }         
    }
    else
    {
        $kq ="Thông tin không đúng vui lòng kiềm tra lại";
    }
}
?>
<?php
$name = "" ;
$email = "" ;
$dt= "";
$mk= "";
$kqdk ="";
$repass ="";

if(isset($_POST['dangky']))
{
    require 'inc/myconnect.php';
    $name  = $_POST['fullname'] ;
    $email = $_POST['email'];
    $dt = $_POST['phone'];
    $mk = $_POST['password'];
    $repass = $_POST['repass'];
    if($repass != $mk  )
    {
        $kqdk = "Mật khẩu nhập lại không chính xác";
    }
    else
    {
        $sql="INSERT INTO  loginuser (email,matkhau,hoten,DienThoai) 
        VALUES ('$email','$mk' ,'$name','$dt') ";
        // echo  $mk;
        if (mysqli_query($conn, $sql)) {
            $name = "" ;
            $email = "" ;
            $dt= "";
            $mk= "";
            $repass ="";
            $kqdk = "Đăng ký thành công";
        } else {
            $kqdk = "Đăng ký không thành công xin hay kiểm tra lại thông tin";
        }
    }

    
    mysqli_close($conn);
}
?>
	<div id="page-content" class="single-page">
		<div class="container">
			<div class="row">
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="heading"><h2 style="color: red;">Đăng nhập</h2></div>
					<form name="form1" id="ff1" method="POST" action="#">
						<div class="form-group">
							<input type="email"  placeholder="Email" name="txtus" required value	="">
						</div>
						<div class="form-group">
							<input type="password" placeholder="Mật khẫu" name="txtem"required value="">
						</div>
						<button type="submit" name="submit" class="btn btn-1" name="login" id="login"style="background-color: darkslategrey;">Đăng nhập</button>
						<P style="color:red"><?php echo $kq; ?></p>
						<a href="#"></a>
						<br>
					<i style = "color: blue;">Bạn chưa có tài khoản? Vui lòng đăng ký tại đây -></i>
					</form>
				</div>
				<div class="col-md-6">
					<div class="heading"><h2 style="color: red;"> Đăng ký tài khoản</h2></div>
					<form name="form2" id="ff2" method="post" action="#">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Họ Tên" name="fullname" id="firstname" value="<?php echo $name;?>" required >
						</div>
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Email" name="email" id="email"  value="<?php echo $email;?>" required>
						</div>
						<div class="form-group">
						<input type="number" class="form-control" placeholder="Điện thoại" name="phone" id="phone" value="<?php echo $dt;?>" required >
						</div>
						<div class="form-group">
						<input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="password"  value="<?php echo $mk;?>"required >
						</div>
						<div class="form-group">
						<input type="password" class="form-control" placeholder="Mật khẩu nhập lại" name="repass" id="repass" value="<?php echo $repass;?>" required >
						</div>
						<button type="submit" name="dangky" class="btn btn-1"style="background-color: darkslategrey;">Đăng kí</button>
						<P style="color:red"><?php echo $kqdk; ?></p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php 
	include "footer.php"
	?>
</body>
</html>
<?php ob_end_flush(); ?>
