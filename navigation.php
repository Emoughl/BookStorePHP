<nav id="menu" class="navbar" style=" background-color: cadetblue;">
		<div class="container">
			<div class="navbar-header"><span id="heading" class="visible-xs">Nav</span>
			  <button type="text" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav" style="font-size: 20px; font-weight: bold">
					<li><a href="index.php">Trang chủ</a></li>
                    <li><a href="index.php">Giới Thiệu</a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Thể Loại</a>
						<div class="dropdown-menu" style="border-color: black; background-color: black;">
							<div class="dropdown-inner">
								<ul class="list-unstyled">
								<?php
 								 //lay id nha san xuat
  								require 'inc/myconnect.php';
								$laydanhsachtheloai="SELECT ID as Matheloai,Ten from theloai";
								$rstheloai = $conn->query($laydanhsachtheloai);
   								if ($rstheloai->num_rows > 0) {
	  							 // moi cot
	   							while($row = $rstheloai->fetch_assoc()) {
								?>
								<li><a href="kind.php?Matheloai=<?php echo $row["Matheloai"]?>"><?php echo $row["Ten"]?></a></li>
								<?php
								}
								}
					?>
								</ul>
                    <li><a href="contact.php">Liên hệ</a></li>	
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>