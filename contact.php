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
            <?php  findUser("home") ?>
            <li><a href="about.php">About</a></li>
            <li><a  class="active"  href="contact.php">Contact</a></li>
            <?php  logout(); ?>
            <li id="lg-bag"><a href="cart.html"><i class="far fa-shopping-bag"></i></a></li>
            <a href="#" id="close"><i class="far fa-times"></i></a>

            </ul>
        </div>

        <div id="mobile">
          
                <a href="cart.html"><i class="far fa-shopping-bag"></i></a>
                <i id="bar" class="fas fa-outdent"></i>
        </div>

    </section>

    <section id="page-header" class="contact-header">
       
        <h2>#ReachUs</h2>
        
        <p>Faculty Of Computer and Information</p>
       
    </section>


    <section id="contact-details" class="section-p1 section-m1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit Our agency locations or contact us today</h2>
            <h3>Head Office</h3>
            <div>
                    <li>
                    <i class="fal fa-map"></i>
                    <p>Salam 1 ,Suez University,Faculty Of Computer and Information</p>
                    </li>
                    <li>
                        <i class="fal fa-envelope"></i>
                        <p>mcmohand888@gmail.com</p>
                        </li>
                        <li>
                            <i class="fal fa-phone-alt"></i>
                            <p>+20 1283537869 / 1025131288</p>
                            </li>
                            <li>
                                <i class="fal fa-clock"></i>
                                <p>From 10:00 to 12:00 All Week</p>
                                </li>
        </div>
        </div>

<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d863.8337415205267!2d32.50167534231167!3d29.998536800000014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14562f19ec4a750d%3A0x199c3d73dd480bb1!2sFaculty%20of%20computers%20and%20information%20-%20Suez%20University!5e0!3m2!1sen!2seg!4v1647717536998!5m2!1sen!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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