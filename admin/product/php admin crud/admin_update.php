<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product update</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="../../dashboard/assets/css/style.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
<?php
      session_start(); 
      if($_SESSION['admin'] ==0){
         header ("location:http://localhost/E-commerce/index.php");
      }
      include_once "../../../db/product_db.php";
      include_once "../../../db/categories_db.php";
      $do = $_GET['do'];
      $prod = new ProductDB();
      $cat = new CategoriesDB();
      $selectProd = $prod->showProductWithCondition($do);
      $selectProd = $selectProd->fetch(PDO::FETCH_ASSOC);
      $selectCat = $cat->showCategories();

      $getfile =   "data:"  . ";base64," . base64_encode($selectProd['file']);
      $getfile2 =  "data:" .  ";base64," . base64_encode($selectProd['file2']);
      $getfile3 =  "data:" .  ";base64," . base64_encode($selectProd['file3']);
      $getfile4 =  "data:" .  ";base64," . base64_encode($selectProd['file4']);
ob_start();
      ?>
   <div class="container">
      <div class="navigation">
      <ul>
                <li>
                    <a href="#" class="nav">
                        <span class="icon">
                        <img src="../../../img/logo2.png" alt="" class="logo">
                                            </span>
                        <span class="title">GgStore</span>
                    </a>
                </li>
                <li>

                    <a href="../../../index.php" class="nav">

                       <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Main Page</span>
                    </a>
                </li>
                <li>
                    <a href="../../dashboard/index.php" class="nav">
                        <span class="icon">
                        <span class="material-symbols-outlined">
                                monitoring
                            </span>                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../../dashboard/users.php" class="nav">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Users</span>
                    </a>
                </li>
                <li>
                    <a href="../../category/php admin crud/admin_page.php" class="nav">
                        <span class="icon">
                        <span class="material-symbols-outlined">
                                wallet
                            </span>
                                                </span>
                        <span class="title">Category</span>
                    </a>
                </li>
                <li>
                    <a href="admin_page.php" class="nav">
                        <span class="icon">
                        <span class="material-symbols-outlined">
                                cases
                            </span>                        </span>
                        <span class="title">Product</span>
                    </a>
                </li>

                <li>
                    <form method="POST">
                        <button class="signout nav" name="logout">
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Log Out</span>
                        </button>
                    </form>
                    <?php
                    include_once "../../../function/method.php";
                    if (isset($_POST['logout'])) {
                        logoutFromAdmin("../../../index.php");
                    }
                    ?>
                </li>
            </ul>
      </div>
      <div class="main">
         <div class="topbar">
            <div class="toggle">
               <ion-icon name="menu-outline"></ion-icon>
            </div>
         </div>
         <div class="container1">
            <div class="admin-product-form-container centered">
              

         <form method="POST" enctype="multipart/form-data">
            <h3 class="title">update the product</h3>

            <input type="text" value="<?php echo $selectProd['name'] ?>" name="product_name" class="box">
            <input type="number" value="<?php echo $selectProd['price'] ?>" name="product_price" class="box">
            <input type="text" value="<?php echo $selectProd['detail'] ?>" name="Description" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image1" class="box"> </input>
            <?php echo "<img src='$getfile' width='200'>" ?>
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image2" class="box">
            <?php echo "<img src='$getfile2' width='200'>" ?>

            <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image3" class="box">
            <?php echo "<img src='$getfile3' width='200'>" ?>

            <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image4" class="box">
            <?php echo "<img src='$getfile4' width='200'>" ?>
            <br>
            <select name="catName">
               <?php foreach ($selectCat as $element) {
                  echo '<option value="' . $element['id'] . '">' . $element['name'] . '</option>';
               } ?>
            </select>

            <button name="updateProduct" class="btn">update Product</button>

            <a href="admin_page.php" class="btn">go back!</a>

         </form>
         <?php

         if (isset($_POST['updateProduct'])) {
            $name = $_POST['product_name'];
            $price = $_POST['product_price'];
            $detail = $_POST['Description'];
            $catName = $_POST['catName'];
            if ($_FILES['product_image1']['size'] == 0 ) {
               $file1 = $selectProd['file'];
            }else{
               $file1 = file_get_contents($_FILES['product_image1']['tmp_name']);
            }
            if ($_FILES['product_image2']['size'] == 0) {
               $file2 = $selectProd['file2'];
            }else{
               $file2 = file_get_contents($_FILES['product_image2']['tmp_name']);
            }
            if ($_FILES['product_image3']['size'] == 0 ) {
               $file3 =$selectProd['file3'];
            }else{
               $file3 = file_get_contents($_FILES['product_image3']['tmp_name']);
            }
            if ($_FILES['product_image4']['size'] == 0) {
               $file4 = $selectProd['file4'];
            }else{
               $file4 = file_get_contents($_FILES['product_image4']['tmp_name']);
            }
            $prod->updateProd($do, $name, $price, $detail, $file1, $file2, $file3, $file4, $catName);
         }
         ob_flush();
         ?>
            </div>
         </div>
      </div>
   </div>
   <script src="../../dashboard/assets/js/main.js"></script>
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>