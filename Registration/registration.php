<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="stylelogin.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="#" class="sign-in-form" method="POST"> <!--the begainning of the form-->
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <input type="submit" class="btn solid" value="Login" name="login"> <!-- login-->
                    </form>
                   
                   <?php
                    include "/php/htdocs/E-Commerce/db/registration_db.php";
                    $user =new RegistrationDB();
$do = $_GET['id'];
if(isset($_POST['login'])){
        $selectuser = $user->checkuser();
    if(($selectuser->rowCount() > 0)){
           $selectuser =$selectuser->fetch();
           
           session_start();
           $_SESSION['userid'] = $selectuser['id'];
           $_SESSION['username'] = $selectuser['NAME'];
           $_SESSION['admin'] = $selectuser['userid'];
         if($selectuser['userid'] == 1){
             header("location: http://localhost/E-commerce/admin/dashboard/");
         }else{
           $page =$_GET['page'];
           if($page == "home"){
            header ("location:http://localhost/E-commerce/index.php");
           }elseif($page == "products"){
            header ("location:http://localhost/E-commerce/products.php");
           }elseif($page == "categories"){
            header ("location:http://localhost/E-commerce/shop.php"); 
           }elseif($page == "orderItem"){
            header ("location:http://localhost/E-commerce/sproduct.php?do=".$do."");
           }elseif($page == "cart"){
            header ("location:http://localhost/E-commerce/cart.php");
           }
         }
        
    }
     else{
     
        echo '<div class="alert alert-danger" role="alert">
        the email is not found please create one_الحساب او كلمة المرور غير موجوده الرجاء انشاء واحدا
        </div>';
    }

}

?>
             
            </div>
            <div class="signup-signup"> <!--واحد جديد-->
                <form action="#" class="sign-up-form" method="POST">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Name" name="name" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Confirm password" name="confirm_password" required name>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="number" placeholder="Phone number" name="phone_number" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-calendar"></i>
                        <input type="text" placeholder="Date of birth" onfocus="(this.type='date')" onblur="(this.type='text')" name="DOB">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <select name="gender"  > 
                            <option value=""  class="placeholder" disabled selected hidden>Gender</option>
                            <option  value="male" >male</option>
                            <option value="female">female</option>
                        </select>
                    </div>
                    <input type="submit" class="btn solid" value="Signup" name="SignUp" >
                </form>
                <?php 
 if(isset($_POST['SignUp'])){
$user->adduser();
}
?>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New Here?</h3>
                    <p>sign up here </p>
                    <button class="btn transparent" id="sign-up-button">Sign up</button>
                </div>
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Already have an account?</h3>
                    <p>Login here</p>
                    <button class="btn transparent" id="sign-in-button">Sign In</button>
     
                </div>
            </div>
        </div>
    </div>
    <script src="app.js"></script>
    
</body>
</html>

