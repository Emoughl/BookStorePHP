<?php
$conn=mysqli_connect("localhost:1207","root","","bookstore");
// Kiem tra ket noi
if ($conn->connect_error)
  {
  echo "ket noi toi MYSQL that bai " . mysqli_connect_error();
  }
  $conn->set_charset("utf8")
?>