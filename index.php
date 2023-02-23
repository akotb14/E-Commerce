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
            <li><a href="contact.php" >Contact</a></li>
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

    <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <button>Shop Now</button>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/features/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f2.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f4.png" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f5.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f6.png" alt="">
            <h6>F24/7 Support</h6>
        </div>
        
    </section>

    <section id="product1" class="section-p1">
        <h2>Categories</h2>
        <p>All You Need To Build Powerful Pc</p>
        <div class="pro-container">
            <div class="pro">
                <img src="img/products/biulds2.jpg" alt="">
                <div class="des">
                    <span>Buy Full Build of PC</span>
                    <h5>Full Builds</h5>
                    <div class="star">
                        <i class="fas fa-star">
                        <i class="fas fa-star">
                        <i class="fas fa-star">
                         <i class="fas fa-star"></i> </i></i> </i>
                    </div>
                    
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="img/products/screens.jpg" alt="">
                <div class="des">
                    <span>Get Best Screen For Best Performence</span>
                    <h5>Screens</h5>
                    <div class="star">
                        <i class="fas fa-star">
                        <i class="fas fa-star">
                        <i class="fas fa-star">
                         <i class="fas fa-star"></i> </i></i> </i>
                    </div>
                    
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="img/products/ram2.jpg" alt="">
                <div class="des">
                    <span>Large Ram Large Bounty</span>
                    <h5>Ram</h5>
                    <div class="star">
                        <i class="fas fa-star">
                        <i class="fas fa-star">
                        <i class="fas fa-star">
                         <i class="fas fa-star"></i> </i></i> </i>
                    </div>
                    
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="img/products/gpu2.jpg" alt="">
                <div class="des">
                    <span>Get the Most Powerful Gpu's To Play All Games</span>
                    <h5>Graphic Card</h5>
                    <div class="star">
                        <i class="fas fa-star">
                        <i class="fas fa-star">
                        <i class="fas fa-star">
                         <i class="fas fa-star"></i> </i></i> </i>
                    </div>
                   
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="img/products/cpu2.jpg" alt="">
                <div class="des">
                    <span>New Tech of Cpu's</span>
                    <h5>Cpu</h5>
                    <div class="star">
                        <i class="fas fa-star">
                        <i class="fas fa-star">
                        <i class="fas fa-star">
                         <i class="fas fa-star"></i> </i></i> </i>
                    </div>
                    
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="img/products/cases2.jpg" alt="">
                <div class="des">
                    <span>Most Modern Cases</span>
                    <h5>Cases</h5>
                    <div class="star">
                        <i class="fas fa-star">
                        <i class="fas fa-star">
                        <i class="fas fa-star">
                         <i class="fas fa-star"></i> </i></i> </i>
                    </div>
                    
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="img/products/mb2.jpg" alt="">
                <div class="des">
                    <span>Get New MotherBoard To Suppurt New Cpu's</span>
                    <h5>MotherBoard</h5>
                    <div class="star">
                        <i class="fas fa-star">
                        <i class="fas fa-star">
                        <i class="fas fa-star">
                         <i class="fas fa-star"></i> </i></i> </i>
                    </div>
                    
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="img/products/acs.jpg" alt="">
                <div class="des">
                    <span>Get All Gaming Accessories</span>
                    <h5>Accessories</h5>
                    <div class="star">
                        <i class="fas fa-star">
                        <i class="fas fa-star">
                        <i class="fas fa-star">
                         <i class="fas fa-star"></i> </i></i> </i>
                    </div>
                    
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>

        </div>

    </section>


    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>70% off</span> - all Hardware & Accessories</h2>
        <button class="normal">Explore More</button>
    </section>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>crazy deals</h4>
            <h2>Get All You Need</h2>
            <span>The best Hardware</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>GG</h4>
            <h2>Become Pro Gamer</h2>
            <span>The best Hardware</span>
            <button class="white">Collection</button>
        </div>
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>We Will Help You</h2>
            <h3>Be</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>Gain More FPS</h2>
            <h3>A</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>Gain Discounts</h2>
            <h3>Pro</h3>
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