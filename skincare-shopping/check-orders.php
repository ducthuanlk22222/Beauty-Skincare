<?php
    template_header("CHECK ORDER", "index.php?page=home#about", "index.php?page=home#testimonial");
    // include "result.php";
?>

<style>
    <?php
        include "style/style-cart.css";
    ?>
</style>

<br>
<br>
<br>
<br>
<br>
<hr>

<div class="container">
    <h1>Kiểm tra đơn hàng</h1>
    <form action="index.php?page=results" method="POST">
        <div>
            Số điện thoại:
            <input name="phone-txt" type="text" required>
            <button name="check_order" type="submit">Kiểm tra</button>
        </div>
    </form>
</div>

<br>
<br>
<br>
<br>
<hr>

<?php
    template_footer();
?>