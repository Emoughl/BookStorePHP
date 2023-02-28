<?php
require 'myconnect.php';
//lay danh sach khuyen mai
$sql="SELECT * FROM sanpham  where khuyenmai = '1' ORDER BY Ten  limit 4 ";
$result = $conn->query($sql);
//lay danh sach san pham moi nhat
?>