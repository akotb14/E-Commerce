<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <section id="header">

        <a href="#"><img src="img/logo2.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
            <?php include_once "function/method.php"; isAdmin()?>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <?php  findUser("categories") ?><li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php  logout(); ?>
                <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
                <a href="#" id="close"><i class="far fa-times"></i></a>

            </ul>
        </div>

        <div id="mobile">

            <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>

    </section>

    <section id="page-header">

        <h2>#stayhome</h2>

        <p>Save more with coupons & up to 70% off!</p>

    </section>


    <section id="product1" class="section-p1">
        <h2>Categories</h2>
        <p>All You Need To Build Powerful Pc</p>
        <div class="pro-container">
            <?php
            
           include "db/categories_db.php";
           $cat = new CategoriesDB();
            $showCategories = $cat->showCategories() ;
            foreach ($showCategories as $element) {
                $getfile = "data:" . $element['filetype'] . ";base64," . base64_encode($element['file']);
                echo "<div class='pro' onclick='window.location.href='products.php''> <img src=$getfile alt=''> 
                <div class='des'> "
                 .'<span>'.$element['details']."</span>" ;
                echo "<h5>" . $element['name']."</h5>";
               echo "<div class='star'>
                    <i class='fas fa-star'>
                    <i class='fas fa-star'>
                    <i class='fas fa-star'>
                     <i class='fas fa-star'></i> </i></i> </i>
                </div>
            </div>
            <a href='products.php?do=".$element['id']."'><i class='fal fa-shopping-cart cart'></i></a>
            
            </div>
            ";
        }
            ?>

        </div>

    </section>










    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="img/logo2.png" alt="">
            <h4>Contact</h4>
            <p> <strong>Adress: </strong> Salam 1,Suez University,Faculty Of Computer And Information </p>
            <p> <strong>Phone: </strong> +20 1283537869/ +20 1025131288 </p>
            <p> <strong>Hours: </strong> 10:00 - 12:00, All Week </p>

            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Delivary Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>
        </div>
        </div>

        <div class="col isntall">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="">
                <img src="img/pay/play.jpg" alt="">
                <div>
                    <p>Secured Payment Gateways</p>
                    <img src="img/pay/pay.png" alt="">
                </div>


                <div class="copy">
                    <p>© 2022, Suez University ,Faculty Of Computer And Information</p>
                </div>

    </footer>

    <script src="script.js"></script>
</body>

</html>