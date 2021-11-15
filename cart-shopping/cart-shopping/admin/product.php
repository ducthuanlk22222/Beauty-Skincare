<?php

		include "connect.php";
		$product	= mysqli_query($data, "SELECT product.*, category.name AS `name_cate`
							FROM `product` JOIN `category` ON product.idcate = category.id;");
?>

<?php
		require "header.php";
?>
		<!-- muc luc -->
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
				<a href="cate.php" class="sidebar-nav-link ">
					<div>
						<i class='bx bxs-blanket'></i>
					</div>
					<span>
						Danh Mục
					</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="product.php" class="sidebar-nav-link active">
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
    <div class="wrappers">
		<div class="container mt-5">
			<h1 class="title">Danh sách sản phẩm</h1>
		 <table class="table">
			 <thead>
			   <tr class="tableth">
				 <th scope="col">ID</th>
				 <th scope="col">Tên danh mục</th>
				 <th scope="col">Tên sản phẩm</th>
				 <th scope="col">Hình ảnh</th>
				 <th scope="col">Giá</th>
				 <th scope="col">Chi tiết</th>
			   </tr>
			 </thead>
			 <tbody >
				 	<?php
				 		foreach ($product as $value): ?>
						<tr>
							<td><?= $value['id'] ?></td>
							<td><?= $value['name_cate'] ?></td>
							<td><?= $value['name'] ?></td>
							<td><img src="../uploads/<?= $value['image']?>" alt="" width="50"></td>
							<td><?= $value['price'] ?> Đồng</td>
							<td><?= $value['description'] ?></td>
							<td>
								<a href="suaSP.php?id=<?= $value['id'] ?>">Sửa</a>
							</td>
							<td>
								<a href="delSp.php?id=<?= $value['id'] ?>" onClick="return confirm('Bạn có thật sự muốn xóa món hàng này?');">Xóa</a>
							</td>
						</tr>
					<?php
						endforeach;
					?>
			 </tbody>
		   </table>
			 <div>
			 <div class="addpro"><a href="addproduct.php">Thêm sản phẩm</a></div>
			 </div>

    <script src="https://www.gstatic.com/firebasejs/8.3.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.3/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.3/firebase-database.js"></script>
    <!-- import script -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="index.js"></script>
	<script src="app.js"></script>
	<!-- end import script -->
</body>
</html>