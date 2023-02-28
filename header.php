<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="BookStore">
	<?php
$title ="BookStore";
$name ="BS";
// include "Templates.php";
?>
    <title><?php echo $title?></title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"  type="text/css">
    <script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'vi'}
</script>
	<!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- Font Awesome -->
    <!-- daterange picker -->
	<!-- Custom Fonts -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"  type="text/css">
    <link rel="stylesheet" href="fonts/font-slider.css" type="text/css">
	<!-- jQuery and Modernizr-->
	<script src="js/jquery-2.1.1.js"></script>
	<!-- Core JavaScript Files -->  	 
    <script src="js/bootstrap.min.js"></script>
</head>
<header class="container">
		<div class="row" style="margin-right: -150px;margin-left: -150px;">
			<div class="col-md-4" style="margin-bottom:25px">
				<div id="logo"><h5 style="font-family: cursive;font-size: 40px;">BOOK STORE</h5></div>
			</div>
			<div class="col-md-4">
				<form class="form-search" method="GET" action="timkiem.php">  
					<input type="text"  class="input-medium search-query" name="txttimkiem" required style= "margin-top: 13px ; width: 84% ;height: 42px;">  
					<button type="submit" name="tk" class="btn" style="font-size: 20px;padding: 11px 16px;margin-top: -3px;"><span class="glyphicon glyphicon-search"></span></button>  
				</form>
			</div>
			<div class="col-md-4" style="width: 24%;">
				<div id="cart" style="font-size: 28px;margin-top: 24px;"><a class="text" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> (<?php
			//Gio Hang
            $ok=1;
			 if(isset($_SESSION['cart']))
			 {
				 foreach($_SESSION['cart'] as $key => $value)
				 {
					 if(isset($key))
					 {
						$ok=2;
					 }
				 }
			 }
			
			 if($ok == 2)
			 {
				echo count($_SESSION['cart']);
			 }
			else
			{
				echo   "0";
			}
			
			
			?>)</a></div>
			</div>
		    <div class="col-md-4"style="width: 7%;">
				<div id="favorite" style="font-size: 28px;margin-top: 24px;"><a class="text" href="favorite.php"><span class="glyphicon glyphicon-heart"></span> (<?php
			//Yeu Thich
            $ok=1;
			 if(isset($_SESSION['favorite']))
			 {
				 foreach($_SESSION['favorite'] as $key => $value)
				 {
					 if(isset($key))
					 {
						$ok=2;
					 }
				 }
			 }
			
			 if($ok == 2)
			 {
				echo count($_SESSION['favorite']);
			 }
			else
			{
				echo   "0";
			}
			
			
			?>)</a></div>
			</div>
        </div>
	</header>
</html>