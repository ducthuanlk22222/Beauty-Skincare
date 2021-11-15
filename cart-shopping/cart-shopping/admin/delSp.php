<?php
  include "connect.php";

  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  $sql = "DELETE FROM `product` WHERE `id`='$id'";

  if (mysqli_query($data, $sql)) {
    header("Location:http://localhost/cart-shopping/cart-shopping/admin/product.php");

  } else {
      echo "Lỗi delete: " . mysqli_error($data);
  }
  mysqli_close($data);
?>