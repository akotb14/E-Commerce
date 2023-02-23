<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<?php
session_start();
if ($_SESSION['admin'] == 0) {
    header("location:http://localhost/E-commerce/index.php");
}
include_once "../../db/order_db.php";
$order = new OrderDB();
$showOrder = $order->showorderAtDashboard();
$showSale = $order->showSalesAndEarning();
$showSale = $showSale->fetch(PDO::FETCH_ASSOC);
?>

<body>
    <!-- =============== Navigation ================ -->
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

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <!--    <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>-->
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $showSale['numberOfSales']; ?></div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>



                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $showSale['totalEarning']; ?></div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Product Name</td>
                                <td>Subtotal</td>
                                <td>Quantity</td>
                                <td>City</td>
                                <td>Street name</td>
                                <td>Build name</td>
                                <td>District</td>
                                <td>Phone Number</td>
                                <td>Order Date</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($showOrder as $element) {
                                echo " <tr>
                                <td>" . $element['uName'] . "</td>
                                <td>" . $element['pName'] . "</td>
                                <td>" . $element['oSubtotal'] . "</td>
                                <td>" . $element['oQuantity'] . "</td>
                                <td>" . $element['city'] . "</td>
                                <td>" . $element['streetname'] . "</td>
                                <td>" . $element['buildname'] . "</td>
                                <td>" . $element['district'] . "</td>
                                <td>" . $element['phoneNo'] . "</td>
                                <td>" . $element['date'] . "</td>
                                <td><span class='status delivered'>Delivered</span></td>
                            </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>