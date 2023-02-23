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
            <?php include_once "function/method.php"; isAdmin() ;  $do = $_GET['do']; ?>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <?php  findUser("orderItem&id=$do") ?><li><a href="about.php">About</a></li>
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

    <section id="prodetails" class="section-p1">

        <?php
        include_once "db/order_db.php";
        include_once "db/product_db.php";
        $productObject = new ProductDB();
        $orderObject = new OrderDB();
       
        $selectproduct = $productObject->showProductWithCondition($do);
        
        foreach ($selectproduct as $element) {
            $getfile =   "data:" . $element['filetype'] . ";base64," . base64_encode($element['file']);
            $getfile2 =  "data:" . $element['filetype'] .  ";base64," . base64_encode($element['file2']);
            $getfile3 =  "data:" . $element['filetype'] .  ";base64," . base64_encode($element['file3']);
            $getfile4 =  "data:" . $element['filetype'] .  ";base64," . base64_encode($element['file4']);
            echo
            '<div class="single-pro-image">
    <img src="' . $getfile . '" width="100%" id="MainImg" alt="">
    <div class="small-img-group">
        <div class="small-img-col">
            <img src="' . $getfile . '" width="100%" class="small-img" alt="">
        </div>
        <div class="small-img-col">
            <img src="' . $getfile2 . '" width="100%" class="small-img" alt="">
        </div>
        <div class="small-img-col">
            <img src="' . $getfile4 . '" width="100%" class="small-img" alt="">
        </div>
        <div class="small-img-col">
            <img src="' . $getfile3 . '" width="100%" class="small-img" alt="">
        </div>
    </div>
</div>
       <div class="single-pro-details">
            <h2>'.$_SESSION['name'].'</h2>
            <h4>'.$element['name'].'</h4>
            <h2>' . $element['price'].' LE</h2>
            <form method="POST" class="order">
            <input type="number" value="1" name="quantity">
            <button class="normal" name="add">Add To Cart</button>
            <h4 class="add">'.$orderObject->addOrderAtCart().' </h4>
            </form>
            <h4>Details</h4>
            <span> ' . $element['detail'] . '</span>
        </div>
    ';
        }


        ?>
        
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

    <script>
        var MainImg = document.getElementById("MainImg");
        var smallimg = document.getElementsByClassName("small-img");

        smallimg[0].onclick = function() {
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function() {
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function() {
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function() {
            MainImg.src = smallimg[3].src;
        }
    </script>

    <script src="script.js"></script>
</body>

</html>