<?php
		include "connect.php";

		$show = mysqli_query($data, "SELECT * FROM `category`");

		if(isset($_GET['id'])){
			$id_edit	= $_GET['id'];
			$category		= mysqli_query($data, "SELECT product.*, category.name AS `name_cate`
									FROM product LEFT JOIN category ON product.idcate = category.id
									WHERE product.id = '$id_edit';");
			$row = mysqli_fetch_array($category);

			$id_product 			= $row['id'];
			$name_category 		= $row['name_cate'];
			$price 						= $row['price'];
			$name_product 		= $row['name'];
			$description			= $row['description'];
			$idcate						= $row['idcate'];
			$image 						= $row['image'];
		}
		if(isset($_POST['sm'])){
		$id_product 			= $_POST['id'];
		$name_category 		= $_POST['nameCa'];
		$price 						= $_POST['price'];
		$name_product 		= $_POST['name_product'];
		$description			= $_POST['description'];
		$image_product 		= $_FILES['image']['name'];
					if($image_product != null)
					{
					$tmp_name = $_FILES['image']['tmp_name'];
					$image_product = $_FILES['image']['name'];

					move_uploaded_file($tmp_name, "../uploads/".$image_product);
					$conn = "UPDATE `product` SET `name`='$name_product', `image` = '$image_product',
										`price`='$price', `description`='$description', `idcate`='$name_category'
										WHERE `id`='$id_product'";
					$run = mysqli_query($data, $conn);
					if($run){
						$message = "Sửa thành công!";
						echo '<script language="javascript">alert("Sửa thành công!");
        		 	window.location.href="http://localhost/cart-shopping/cart-shopping/admin/product.php";</script>';
					}
					else{
						echo '<script language="javascript">alert("Sửa không thành công!");
        					window.location.href="http://localhost/cart-shopping/cart-shopping/admin/product.php";</script>';
					}
					}
				else{
				$sql = "UPDATE `product` SET `name`='$name_product',
								`price`='$price', `description`='$description', `idcate`='$name_category'
								WHERE `id`='$id_product'";
				$run = mysqli_query($data, $sql);
					if($run){
						echo '<script language="javascript">alert("Sửa thành công!");
        		 	window.location.href="http://localhost/cart-shopping/cart-shopping/admin/product.php";</script>';
					}
					else{
						echo '<script language="javascript">alert("Xác nhận không thay đổi!");
        		 window.location.href="http://localhost/cart-shopping/cart-shopping/admin/product.php";</script>';
					}
					mysqli_close($data);
					}
		}
?>
<?php
		// require"header.php";
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <div class="sidebar">
		<ul class="sidebar-nav">
			<li class="sidebar-nav-item">
				<a href="index.php" class="sidebar-nav-link ">
					<div>
						<i class="fas fa-tachometer-alt "></i>
					</div>
					<span>
						Trang chủ
					</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="cate.php" class="sidebar-nav-link active">
					<div>
						<i class='bx bxs-blanket'></i>
					</div>
					<span>
						Danh Mục
					</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="product.php" class="sidebar-nav-link ">
					<div>
						<i class="bx bx-closet"></i>
					</div>
					<span>Sản Phẩm</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="cart.php" class="sidebar-nav-link">
					<div>
						<i class="fas fa-tasks"></i>
					</div>
					<span>Cart</span>
				</a>
			</li>
		</ul>
	</div>

	<div class="wrapper">
        <div class="container">
			<form action="#" method="POST" enctype="multipart/form-data" class="col-8 border border-light p-3 m-auto" >
				<h3 class="text-center"style="color: black;font-weight: bold;">TÙY CHỈNH SẢN PHẨM</h3>
				<div class="form-group">
					<label class="" for="tensp" style="color: black;font-weight: bold;">Tên danh mục</label>
					<select class="form-control" name="nameCa" id="cateid" type="text">
					<option value="" selected ><?= $row['name_cate']  ?></option>
					<?php
							foreach ($show as $value){
								?>
							<option value="<?= $value['id'] ?>">
								<?php
									echo $value['name'];
								?>
							</option>
							<?php }
							?>
					</select>
				</div>
				<div class="form-group">
					<label for="tensp" style="color: black;font-weight: bold;">ID Product</label>
					<input class="form-control" name="id" id="idPro" type="text" value="<?= $id_edit; ?>" >
				</div>
				<div class="form-group">
					<label for="tensp" style="color: black;font-weight: bold;">Tên sản phẩm</label>
					<input class="form-control" name="name_product" id="idDm" type="text" value="<?= $name_product; ?>">
				</div>
				<div class="form-group">
					<label for="giasp" style="color: black;font-weight: bold;">Giá sản phẩm</label>
					<input class="form-control" name="price" id="idDm" type="text" value="<?= $price; ?>">
				</div>
				<div class="form-group">
					<label for="motasp" style="color: black;font-weight: bold;">Mô tả</label>
					<input class="form-control" name="description" id="note"  type="text" value="<?= $description; ?>">
				</div>
				<div class="form-group">
					<label for="hinhsp" style="color: black;font-weight: bold;">Hình sản phẩm</label>
					<input type="file" class="form-control" name="image" id="images" value="<?= $image ;?>">
          <img style="width: 50%; height:50%;" src="../uploads/<?= $row["image"] ?>" alt="">
				</div>
				<div class="form-group mt-3 ">
					<button type="submit" name="sm" class="btn btn-primary py-2 px-4" id="" >Sửa đổi</button>
				</div>
			</form>
			</div>
</div>
    <!--firebase-->
    <script src="https://www.gstatic.com/firebasejs/8.3.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.3/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.3/firebase-database.js"></script>

    <!-- import script -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="index.js"></script>
	<!-- end import script -->
</body>
</html>