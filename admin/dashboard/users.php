<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/users.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Uesrs</title>
</head>
<body>
    <div class="container">
        <div class="navigation">
        <ul>
                <li>
                    <a href="#" class="nav">
                        <span class="icon">
                        <img src="../../img/logo2.png" alt="" class="logo">
                        </span>
                        <span class="title">GgStore</span>
                    </a>
                </li>
                <li>

                    <a href="../../index.php" class="nav">

                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Main Page</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav">
                        <span class="icon" >
                            <span class="material-symbols-outlined">
                                monitoring
                            </span>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>


                <li>
                    <a href="users.php" class="nav">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>
                <li>
                    <a href="../category/php admin crud/admin_page.php" class="nav">
                        <span class="icon">
                            <span class="material-symbols-outlined">
                                wallet
                            </span>
                        </span>
                        <span class="title">Category</span>
                    </a>
                </li>

                <li>
                    <a href="../product/php admin crud/admin_page.php" class="nav">
                        <span class="icon">
                            <span class="material-symbols-outlined">
                                cases
                            </span>
                        </span>
                        <span class="title">Product</span>
                    </a>
                </li>
                <li>
                 <form method="POST">
                     <button class="signout nav" name="logout">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">LogOut</span>
                    </button>
                </form>
                    <?php 
                    include_once "../../function/method.php";
                    if(isset($_POST['logout'])){
                        logoutFromAdmin("../../index.php");
                    }
                    ?>
                </li>
            </ul>
        </div>
        <?php 
        session_start(); 
        if($_SESSION['admin'] ==0){
           header ("location:http://localhost/E-commerce/index.php");
        }
        include_once "../../db/registration_db.php";
        $User =new RegistrationDB();
        $showUser =$User->showUser();
        ?>
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="users">
                    <div class="customers">
                        <div class="cardHeader">
                            <h2>Users</h2>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Username</td>
                                    <td>Phone Number</td>
                                    <td>Gender</td>
                                    <td>User type</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($showUser as $element){
                                echo"
                            <tr>
                                    <td>".$element['NAME']."</td>
                                    <td>".$element['EMAIL']."</td>
                                    <td>".$element['username']."</td>
                                    <td>".$element['PhoneNumber']."</td>
                                    <td>".$element['Gender']."</td>";
                                 
                                    if($element['userid']==0){
                                        echo " <td>Customer</td>";
                                    }else{
                                        echo " <td>Admin</td>";
                                    }
                              echo"  </tr>";
                            }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <script src="assets/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>