<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'skincare-shopping';
    try {
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
        // If there is an error with the connection, stop the script and display the error.
        exit('Failed to connect to database!');
    }
}

function template_header($title, $info, $testimonial) {
    echo <<<EOT
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- icon title-->
        <link rel="icon" href="http://cenlia.vn/wp-content/uploads/2019/09/fa-100x100.png" sizes="32x32" />
        <link rel="icon" href="http://cenlia.vn/wp-content/uploads/2019/09/fa.png" sizes="192x192" />
        <link rel="apple-touch-icon-precomposed" href="http://cenlia.vn/wp-content/uploads/2019/09/fa.png" />
        <title>$title</title>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="main.css">

        <!--firebase-->
        <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-database.js"></script>
        <!-- <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-firestore.js"></script> -->
        <!-- <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-storage.js"></script> -->
    </head>

    <style>
        .row{
            display: flex;
            flex-wrap: wrap;
        }

        .container{
            width: 100%;
            max-width: 1366px;
            margin: 0 auto;
        }

        
        .container{
            width: 100%;
            max-width: 1366px;
            margin: 0 auto;
        }

        .logo{
            font-size: 2rem;
            font-weight: 800;
            color: red;
        }

        .menu{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .menu-item{
            margin-left: 1rem;
            padding: .5rem 1.5rem;
            font-weight: 600;
            /* color:var(--grey); */
            transition: .5s ease-in-out;
            cursor: pointer;
            color: var(--nomain-color);
        }
        .menu-item:hover,.menu-item.active{
            color: var(--white);
            background-color: var(--blue);
            border-radius: 1rem;
        }

        .nav{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 99;
            background-color: var(--main-bg-color);
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }

        .menu-wrap{
            max-width: 1366px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
        }

        .right-menu {
            display: flex 
        }
        
        .products-btn{
            width: 3rem;
            height: 3rem;
            display: flex;
            
            align-items: center;
            justify-content: center;
            color: var(--black);
            font-size: 2rem;
            cursor: pointer;
            transition: .5s ease-in-out;
        }

        .products-btn:hover,.products-btn.active{
            background-color: var(--blue);
            color: var(--main-bg-color);
            border-radius: 1rem;
        }
        
        .right-menu .search-form{
            position: absolute;
            top: 99%;
            right: 15%;
            transform: scale(0);
            transform-origin: top;
            box-shadow: 3px 3px 5px rgb(0 0 0 / 60%);
            margin-top: .5rem;
            background: #fff;
            height: 2.5rem;
            display: flex;
            padding: 3px 10px;
            width: 17rem;
            border-radius: 5px;
        }

        .right-menu .search-form.active{
            transform: scale(1);
            transition: .2s linear;
        }
    </style>

    <body class="light">
    <div class="nav">
        <div class="menu-wrap">
            <a href="index.php?page=home">
                <div class="logo">CONIAN</div>
            </a>
            <div class="menu">
                <a href="index.php?page=home">
                    <div class="menu-item">
                        Trang Ch???
                    </div>
                </a>
                <a href="$info">
                    <div class="menu-item">
                        Th??ng Tin
                    </div>
                </a>
                <a href="index.php?page=products">
                    <div class="menu-item">
                        S???n Ph???m
                    </div>
                </a>
                <a href="$testimonial">
                    <div class="menu-item">
                        Ph???n H???i
                    </div>
                </a>
            </div>
            <div class="right-menu">
                <!-- <div class="products-btn">
                    <i id="search-btn" class='bx bx-search'></i>
                </div> -->
                <div class="search-form">
                    <i id="search-form-icon" class='bx bx-search'></i>
                    <input type="search" placeholder="Search..." name="" id="search-box">
                    <label for="search-box" class="fas fa-search"></label>
                </div>
        
                <div class="products-btn">
                    <a href="index.php?page=check-orders"><i class='bx bxs-receipt'></i></a>
                </div>
                <div class="products-btn">
                    <a href="index.php?page=cart"><i class='bx bxs-cart'></i></a>
                </div>
                <!-- <div class="products-btn">
                    <a href="./login/index.html"><i class='bx bx-user'></i></a>
                </div> -->
            </div>
        </div>
    </div>
    EOT;
}

function template_feedBack() {
    echo<<<EOT
    <section id="testimonial">
        <!-- C???n th??m Feedback header -->
        <div class="container">
        <h1 class="heading">PH???N H???I</h1>
            <div class="row">
                <div class="col-4 col-xs-12">
                    <div class="review-wrap botton-up play-on-scroll delay-2">
                        <div class="review-content">
                            <p>
                                S???n ph???m r???t tuy???t v???i
                            </p>
                            <div class="review-img bg-img" style="background-image: url(http://localhost/skincare-shopping/assets/images/truongquynhanh.jpg)"></div>
                        </div>
                        <div class="review-info">
                            <h3>Tr????ng Qu???nh Anh</h3>
                            <div class="rating">
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-xs-12">
                    <div class="review-wrap active botton-up play-on-scroll">
                        <div class="review-content">
                            <p>
                                ????y ????ng l?? b?? quy???t d?????ng da tr???ng s??ng
                                v?? c??ng m???n hay nh???t m?? m??nh t???ng s??? d???ng
                            </p>
                            <div class="review-img bg-img" style="background-image: url(http://localhost/skincare-shopping/assets/images/phamhuong.jpg)"></div>
                        </div>
                        <div class="review-info">
                            <h3>Ph???m H????ng</h3>
                            <div class="rating">
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-xs-12">
                    <div class="review-wrap botton-up play-on-scroll delay-4">
                        <div class="review-content ">
                            <p>
                                Th???t s??ng su???t khi bi???t ?????n v?? s??? d???ng
                                s???n ph???m c???a CENLIA s???m

                            </p>
                            <div class="review-img bg-img" style="background-image: url(http://localhost/skincare-shopping/assets/images/thaituyettram.jpg)"></div>
                        </div>
                        <div class="review-info">
                            <h3>Th??i Tuy???t Tr??m</h3>
                            <div class="rating">
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    EOT;
}

function template_footer(){
    echo<<<EOT
    <!-- K???t th??c -->
    <section class="footer bg-img" style="background-image: url(images/banner-web-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-6 col-xs-12">
                    <h1> Cosmetic </h1> <br>
                    <p>M??? ph???m cao c???p Cenlia s??? d???ng nguy??n li???u 100% t??? thi??n nhi??n H??n Qu???c,
                        tuy???t ?????i an to??n v?? hi???u qu??? cho l??n da ng?????i Vi???t</p><br>
                    <p>Email: conian2505@gmail.com</p>
                    <p>Phone: 0908773057</p>
                    <!-- <p>Website: cenliangoctrinh.vn</p> -->
                </div>
                <div class="col-2 col-xs-12">
                    <h1>
                        TH??NG TIN
                    </h1><br>
                    <p><a href="#">M??? ph???m</a></p>
                    <p><a href="#">Menu</a></p>
                    <p><a href="#">News</a></p>
                </div>
                <div class="col-4 col-xs-12">
                    <h1>Subcribe & media</h1><br>
                    <p>Thanks you for Subcribe</p>
                    <div class="input-group">
                        <input type="text" placeholder="Enter your email" name="" id="">
                        <button>
                            Subcribe
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    EOT;
}
?>