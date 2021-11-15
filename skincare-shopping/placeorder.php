<?php
    include "function-cart.php";
    include "confirm-function.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place order</title>
</head>
<body>
<style>
    <?php
    include "style/style-placeorder.css";
    ?>
</style>
<section class="contact" id="contact">
        <h1>CONIAN </h1>
        <h1 class="heading">Hoàn Tất Đơn Hàng</h1>
        <div class="contact-container">
            <div class="form">
                <div>
                    <!--class="contact-btn"-->
                    <h1>Contact Now</h1>
                    <br>
                </div>
                <form action="" method="POST">
                    <div style="float: left; padding-right: 50px">
                        <h1>Thông tin nhận hàng</h1>
                        <table>
                            <tr>
                                <td><input style="width: 300px; height: 50px" type="text" required placeholder="Email" name="email"></td>
                            </tr>
                            <tr>
                                <td><input style="width: 300px; height: 50px" type="text" required placeholder="Họ và tên" name="name_cs"></td>
                            </tr>
                            <tr>
                                <td><input style="width: 300px; height: 50px" type="text" required placeholder="Số điện thoại" name="phone_number"></td>
                            </tr>
                            <tr>
                                <td><input style="width: 300px; height: 50px" type="text" required placeholder="Địa chỉ" name="address"></td>
                            </tr>
                            <tr>
                                <td><textarea style="resize: none; width: 300px; height: 80px" type="" required placeholder="Ghi chú" name="note[]"></textarea></td>
                            </tr>
                        </table>
                    </div>

                    <div style="float: left; padding-right: 50px">
                        <h1>Hình thức thanh toán</h1>
                        <table>
                            <tr>
                                <td><input type="radio" required name="pay" value="2" disabled> Chuyển khoản qua ngân hàng</td>
                            </tr>
                            <tr>
                                <td><input type="radio" required name="pay" value="1" checked> Thanh toán khi nhận hàng</td>
                            </tr>
                        </table>
                    </div>

                    <div style="float: left; padding-right: 50px">
                        <h1>Đơn hàng
                            (<?=count($products)?> sản phẩm)
                        </h1>

                        <?php
                            foreach($products as $row):
                        ?>
                            <table>
                                <img style="width: 30%;" src="http://localhost/skincare-shopping/assets/images/<?=$row['img']?>" alt=<?=$row['name']?>>
                                <div>Tên sản phẩm: <?=$row['name']?></div>
                                <p>Số lượng:<?=$products_in_cart[$row['id_product']]?></p>
                                <p><?=$row['price'] * $products_in_cart[$row['id_product']]?> VND</p>
                                <br>
                            </table>
                        <?php endforeach;?>
                        <p>Tổng tiền cần thanh toán: <?=$subtotal?> VND</p>
                        <button name="confirm" class="btn" type="submit">Hoàn tất thanh toán</button>
                        <a href="index.php?page=home">
                            <input type="button" name="confirm" class="btn" value="Quay về trang chủ">
                        </a>
                    </div>
                    <!-- <div class="form-contact">
                        <div class="name">
                            <input type="text" required placeholder="Họ Tên" name="" class="form-control">
                        </div>
                        <div class="name">
                            <input type="number" required placeholder="Số Điện Thoại" name="" class="form-control">
                        </div>
                        <div class="address">
                            <input type="text" required  placeholder="Địa chỉ" name="" class="form-control">
                        </div>
                        <div class="message">
                           <textarea name="" placeholder="Ghi chú" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
    </section>
</body>
</html>