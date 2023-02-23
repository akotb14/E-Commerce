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
            <?php  findUser("cart") ?>
            <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php  logout(); ?>
                <li id="lg-bag"><a class="active" href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
                <a href="#" id="close"><i class="far fa-times"></i></a>

            </ul>
        </div>

        <div id="mobile">
          
                <a href="cart.html"><i class="far fa-shopping-bag"></i></a>
                <i id="bar" class="fas fa-outdent"></i>
        </div>

    </section>

    <section id="page-header" class="cart-header">
       
        <h2>#Cart</h2>
        
        <p>Faculty Of Computer and Information</p>
       
    </section>


   <section id="cart" class="section-p1">
       <table width="100%">
           <thead>
               <tr>
                   <td>Action</td>
                   <td>Image</td>
                   <td>Product</td>
                   <td>Price</td>
                   <td>Quantity</td>
                   <td>Subtotal</td>
               </tr>
               <tbody>
               <?php
                include_once "db/cart_db.php";
                ob_start();
                      $cartObject = new CartDB();
                      $cartObject->updateOrderItemAtCart($_POST["update"] ,"cart.php");
                      $cartObject->deleteOrderItemAtCart($_POST["delete"],"cart.php");
                $s = $cartObject->showOrderItemAtCart()->fetchAll(PDO::FETCH_ASSOC);
              

                for ($i = 0; $i < count($s); $i++) {
                    $getfile =   "data:" . $s[$i]['filetype'] . ";base64," . base64_encode($s[$i]['file']);
                    $_SESSION['pr'] = (int)$s[$i]['price'] * $quantity;
                    echo '
                <tr>
                  <td>
                  <form method="POST" action=cart.php?do=' . $s[$i]['oid'] . '>
                  <button name="update" value="' . $s[$i]['oid'] . '"  style="background-color: #27AE60;  border: 1px;border-radius: 2px;
                  border-style: solid; font-size: 14px; padding: 5px; margin-right: 5px;">
                  EDIT
                 
                  <button name="delete" value="' . $s[$i]['oid'] . '" style="background-color: #DC143C;  border: 1px;border-radius: 2px;
                  border-style: solid; font-size: 14px; padding: 5px;">
                  DELETE
                  </button>
                  
                 
                 </td>
                  <td><img src="' . $getfile . '" alt=""></td>
                  <td style="overflow: hidden;">' . $s[$i]['name'] . '</td>
                  <td name="price">' . $s[$i]['price'] . '</td>
                  
                 <td> <input type="number" value="' . $s[$i]['quantity'] . '" name="quantity"> </td> </form> 
                 <td >' . $s[$i]['subtotal'] . '</td>
                 </tr>';
                }
               
                ?>
               </tbody>
           </thead>
       </table>
   </section>
   
   <section id="cart-add" class="section-p1">
       <div id="subtotal">
           <h3>Cart Totals</h3>
           <table>
               <tr>
                   <td>Cart Total</td>
                   <td><?php
                       
                       echo $cartObject->getTotalPriceAtCart();
                       
                       
                       ?></td>
               </tr>
               <tr>
                   <td>Shipping</td>
                   <td><?php echo "50"; ?></td>
               </tr>
               <tr>
                   <td><strong>Total</strong></td>
                   <td><strong><?php echo ($cartObject->getTotalPriceAtCart()+50); ?></strong></td>
               </tr>
           </table>

<!--<button class="normal">
    <a href="#popup" >Checkout</a>
</button>-->
<form method="POST" >
                <button class="normal" name="check">
                    Proceed to Checkout
                </button>

            </form> <?php if(isset($_POST["check"])){
        if($cartObject->showOrderItemAtCart()->rowCount() >0){
                   header("location: #popup");
        }else{
            echo "no order please add order";
        }
        
        }?>
       </div>
   </section>



   <div class="signup-box" id="popup">
    
    
        <div class="wrapper">
            <h2>Enter your shipping address</h2>
            
            <a href="#" class="close">&times;</a>
       <div class="content">
           <div class="container">
           <form method="POST">
            <label>Full Name</label>
            <input type="text" name="fullname" required>
            <br>
            <label>City</label>
            <select name="City" class="city">
                <option value="Suez">Suez</option>
                <option value="Cairo">Cairo</option>
                <option value="Giza">Giza</option>
                <option value="Alex">Alex</option>
            </select>
            <br>
            <label>Street Name</label>
            <input type="Street Name" name="StreetName" required>
            <label>Building name/no., floor, Apt. or villa no.</label>
            <input type="Building name/no., floor, Apt. or villa no." name="Building" required>
            <label>District</label>
            <input type="District" name="District" required>
            <label>Phone number</label>
            <input type="text" name="phone_number" required>

            <br>
            <span style="font-weight: 600;"></span>
            <br>
            <input type="submit" value="Buy" name="buy">

        </form>
        <?php
            include_once "db/infouser_buy.php";
            $oinfo = new InformationDB();

            if (isset($_POST['buy'])) {
                $oinfo->buyOrder($_POST['fullname'], $_POST['City'], $_POST['Building'], $_POST['District'], $_POST['phone_number'], $_POST['StreetName']);
                header("location: http://localhost/E-commerce/index.php");
            } 


            ?>
           </div>
       </div>
    </div>
        
       
    
</div>


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