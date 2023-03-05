<head>

<title>Đăng Nhập</title>

<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Existing Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

<!-- Style --> <link rel="stylesheet" href="css/styles.css" type="text/css" media="all">

<!-- Fonts -->
<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

</head>
	<?php
$tk = "" ;
$mk = "" ;
$kq = "";
if(isset($_POST['submit']))
{
    require 'inc/myconnect.php';
    $tk = $_POST['txtus'] ;
    $mk = $_POST['txtem'];
    $sql="SELECT * FROM user  where Email = '$tk'  and Matkhau = '$mk'  ";
    $result = $conn->query($sql);
    // echo  $mk;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
        $_SESSION['txtus'] = $tk ;
        $_SESSION['HoTen'] = $row["Hoten"];
        $_SESSION['email'] = $row["Email"];
        $_SESSION['dienthoai'] = $row["Sodienthoai"];
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
	<h1>ĐĂNG NHẬP TÀI KHOẢN NGƯỜI DÙNG</h1>

<div class="w3layoutscontaineragileits">
<h2>ĐĂNG NHẬP</h2>
	<form action="#" method="post">
		<input type="email" Name="Username" placeholder="Email" name="txtus" required="">
		<input type="password" Name="Password" placeholder="Mật khẩu" name="txtem" required="">
		<div class="aitssendbuttonw3ls">
			<button type="submit" name="submit" class="btn btn-1" name="login" id="login" style="font-size: 25px;border-radius: 20px;background: url();color: snow;">Đăng nhập</button>
			<P style="color:red"><?php echo $kq; ?></p>
			<a href="#"></a>
			<p style="font-size: 15px"> Bạn chưa có tài khoản? Vui lòng đăng ký. <span>→</span> <a class="w3_play_icon1" href="signup.php"> Tại Đây</a></p>
			<div class="clear"></div>
		</div>
	</form>
</div>
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
	$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
		type: 'inline',
		fixedContentPos: false,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
	});
																	
	});
</script>
</body>
</html>
