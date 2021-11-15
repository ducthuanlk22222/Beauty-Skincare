<?php
template_header("CENLIA", "#about", "#testimonial");
// include "config.php";
?>

<style>
    <?php
    include "style/style-home.css";
    ?>
</style>
    <a href="#home" class="back-to-top">
        <i class="bx bxs-to-top ai"></i>
    </a>
    <!-- back to top -->
    
    <!-- Kết thúc -->
    <section id="home" class="fullheight align-items-center bg-imgs bg-img-fixed" style="background-image:url(http://localhost/skincare-shopping/assets/images/banner-chinh-5.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-6 col-xs-12">
                    <div class="slogan">
                        <h1 class="left-to-right play-on-scroll">
                            Cosmetic
                        </h1>
                        <p class="left-to-right play-on-scroll delay-2">
                            Mỹ phẩm cao cấp Cenlia sử dụng nguyên liệu 100% từ thiên nhiên Hàn Quốc, tuyệt đối an toàn và hiệu quả cho làn da người Việt
                        </p>
                        <div class="left-to-right play-on-scroll delay-4">
                            <a href="#menu" >
                                Đặt hàng ngay
                            </a >
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Kết thúc -->
    <div class="fullheight align-items-center" id="about">
        <div class="container">
            <div class="row">
                <div class="col-7 h-xs">
                    <img src="http://localhost/skincare-shopping/assets/images/anh1.jpg" alt="" class="fullwidth left-to-right play-on-scroll">
                </div>
                <div class="col-5 col-xs-12 align-items-center">
                    <div class="about-slogan right-to-left play-on-scroll">
                        <h3><span class="primary-color">CENLIA</span> - Vẻ đẹp <span class="primary-color">vượt ngoài</span> ranh giới</h3>
                        <p>Thương hiệu mỹ phẩm có nguồn gốc từ Hàn Quốc, được các chuyên gia đầu ngành nghiên cứu và cho ra đời dòng sản phẩm đặc biệt phù hợp cho làn da của người Việt</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kết thúc -->
    <section class="align-items-center bg-img bg-img-fixed" id="menu" style="background-image: url(http://localhost/skincare-shopping/assets/images/anh2.jpg)">
        <div class="container">
            <div class="cosmetic-menu">
                <h1><span class="primary-color">Bạn</span> muốn sử dụng <span class="primary-color">mỹ phẩm</span> nào vào hôm nay? </h1>
                <p></p>

                <!-- <div class="cosmetic-category">
                    id="list-catalog"
                    <div class="zoom play-on-scroll">
                        <button class="active" data-cosmetic-type="all">
                            Tất cả sản phẩm
                        </button>
                    </div>
                    <div class="zoom play-on-scroll delay-6">
                        <button data-cosmetic-type="body">
                            Chăm sóc cơ thể
                        </button>
                    </div>
                    <div class="zoom play-on-scroll delay-8">
                        <button data-cosmetic-type="face">
                            Chăm sóc da mặt
                        </button>
                    </div>
                </div> -->

                <div class="cosmetic-item-wrap all" id="list_product">
                    <!--Product on main website-->
                    <?php
                        // include "server/sql_connection.php";

                        // $pdo = pdo_connect_mysql();

                        $stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_created DESC LIMIT 4');
                        $stmt->execute();
                        $recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC)
                        // $sql = sql_connection();

                        //check connection
                        // $query = 'SELECT * FROM products ORDER BY date_created DESC LIMIT 4';

                        // $recently_added_products = mysqli_query($connection, $query);
                    ?>
                        <?php foreach($recently_added_products as $row): ?>
                            <div class="cosmetic-item body-type">
                                <a href="index.php?page=product&id_product=<?=$row['id_product']?>" class="item-wrap botton-up play-on-scroll"></a>
                                    <div class="item-img">
                                        <a href="index.php?page=product&id_product=<?=$row['id_product']?>" class="item-wrap botton-up play-on-scroll">
                                            <div class="img-holder bg-img">
                                                <img src="http://localhost/skincare-shopping/assets/images/<?=$row['img']?>" alt="<?=$row['name']?>">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item-info">
                                        <div>
                                            <a href="index.php?page=product&id_product=<?=$row['id_product']?>" class="item-wrap botton-up play-on-scroll">
                                                <h3><?=$row['name']?></h3>
                                            </a>
                                            <span><?=$row['price']?> VND</span>
                                        </div>
                                    </div>                                    
                                
                            </div>
                        <?php endforeach; ?>
                </div>
                <div class="cosmetic-category">
                    <div class="zoom play-on-scroll delay-6">
                        <!-- <input type="button" onclick="redirect()" value="Xem thêm"> -->
                        <a href="index.php?page=products">
                            <button>Xem thêm</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Kết thúc -->
   
    <script>
        //back to top
        let backToTopBtn = document.querySelector('.back-to-top')

        window.onscroll = () => {
            if(document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                backToTopBtn.style.display = 'flex'
            }else{
                backToTopBtn.style.display = 'none'
            }
        }

        //top nav menu
        let menuItems = document.getElementsByClassName('menu-item');
        Array.from(menuItems).forEach((item,inedx) => {
            item.onclick =(e) => {
                let currMenu = document.querySelector('.menu-item.active');
                currMenu.classList.remove('active');
                item.classList.add('active');
            }
        })

        let searchForm = document.querySelector('.search-form')

        // document.querySelector('#search-btn').onclick = () =>{
        //     searchForm.classList.toggle('active');
        //     navbar.classList.remove('active');
        //     cartItem.classList.remove('active');    
        // }


        //cosmetic item
        let cosmeticMenuList = document.querySelector('.cosmetic-item-wrap')
        let cosmeticCategory = document.querySelector('.cosmetic-category')
        let categories = document.querySelectorAll('button')
        Array.from(categories).forEach((item,index) => {
            item.onclick = (e) => {
                let currCat = cosmeticCategory.querySelector('button.active')
                currCat.classList.remove('active')
                e.target.classList.add('active')
                cosmeticMenuList.classList ='cosmetic-item-wrap '+ e.target.getAttribute('data-cosmetic-type')

            }
        })

        // on scorll animation
        let scroll = window.requestAnimationFrame || function(callback)
            {window.setTimeout(Callback,1000/60)}
        let elToShow = document.querySelectorAll('.play-on-scroll')

        isElInViewPort = (el) => {
            let rect = el.getBoundingClientRect()
            return(
                (rect.top <= 0 && rect.bottom >= 0) ||
                (rect.bottom >= (window.innerHeight || 
                    document.documentElement.clientHeight) && 
                    rect.top <= (window.innerHeight || document.documentElement.clientHeight)) ||
                    (rect.top >= 0 && rect.bottom <= (window.innerHeight || 
                        document.documentElement.clientHeight))
            )
        }
        loop = () => { //arrow function
            elToShow.forEach((item,index) =>{
                if (isElInViewPort(item)){
                    item.classList.add('start')
                }else{
                    item.classList.remove('start')
                }
            })
            scroll(loop)
        }
        loop()

        let body = document.querySelector('body')
        const themeCookieName = 'theme'
        const themeDark = 'dark'
        const themeLight = 'light'

        function setCookie(cname, cvalue,exdays) {
            var d = new Date()
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000))
            var expires ="expires"+d.toUTCString()
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/"
        }

        function getCookie(cname) {
            var name = cname + "="
            var ca = document.cookie.split(';')
            for(var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' '){
                    c = c.substring(1)
                }
                if (c.indexOf(name) == 0){
                    return c.substring(name.length, c.length)
                }
            }
            return ""
        }
        loadTheme()

        function loadTheme() {
            var theme = getCookie(themeCookieName)
            body.classList.add(theme === "" ? themeLight : theme) 
        }

        function switchTheme() {
            if(body.classList.contains(themeLight)){
                body.classList.remove(themeLight)
                body.classList.add(themeDark)
                setCookie(themeCookieName, themeDark)
            }else{
                body.classList.remove(themeDark)
                body.classList.add(themeLight)
                setCookie(themeCookieName, themeLight)
            }
        }
    </script>

</body>

<?php
template_feedBack();
template_footer();?>
</html>