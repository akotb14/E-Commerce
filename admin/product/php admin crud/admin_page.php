<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../../dashboard/assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>
    <?php
    ob_start(); 
    session_start();
    if ($_SESSION['admin'] == 0) {
        header("location:http://localhost/E-commerce/index.php");
    }
    include_once "../../../db/product_db.php";
    include_once "../../../db/categories_db.php";
   
    $prod = new ProductDB();
    $cat = new CategoriesDB();
    $selectProd = $prod->showProduct();
    $selectCat = $cat->showCategories();


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
                <div class="admin-product-form-container">
                    <form method="POST" enctype="multipart/form-data">
                        <h3>add a new product</h3>
                        <input type="text" placeholder="enter product name" name="product_name" class="box">
                        <input type="text" placeholder="enter product price" name="product_price" class="box">
                        <input type="text" placeholder="enter Description" name="Description" class="box">
                        <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image1" class="box">
                        <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image2" class="box">
                        <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image3" class="box">
                        <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image4" class="box">
                        <select name="catName">
                            <?php foreach ($selectCat as $element) {
                                echo '  <option value="' . $element['id'] . '">' . $element['name'] . '</option>';
                            } ?>

                        </select>
                        <input type="submit" class="btn" name="add_product" value="add product">
                    </form>
                </div>
                <?php
                if (isset($_POST['add_product'])) {
                    $name = $_POST['product_name'];
                    $price = $_POST['product_price'];
                    $detail = $_POST['Description'];
                    $file1 = file_get_contents($_FILES['product_image1']['tmp_name']);
                    $file2 = file_get_contents($_FILES['product_image2']['tmp_name']);
                    $file3 = file_get_contents($_FILES['product_image3']['tmp_name']);
                    $file4 = file_get_contents($_FILES['product_image4']['tmp_name']);
                    $catName = $_POST['catName'];
                    
                    $prod->addProduct($name, $price, $detail, $file1, $file2, $file3, $file4, $catName);
                   
                }

                ?>
                <div class="product-display">
                    <table class="product-display-table">
                        <thead>
                            <tr>
                                <th>product image1</th>
                                <th>product image2</th>
                                <th>product image3</th>
                                <th>product image4</th>
                                <th>product name</th>

                                <th>product price</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <?php
                     
                        foreach ($selectProd as $element) {
                            $selectCatWithCondition =$cat->showCategoriesWithCondition($element["categoriesId"]);
                            $selectCatWithCondition=$selectCatWithCondition->fetch();
                            $getfile =   "data:" . ";base64," . base64_encode($element['file']);
                            $getfile2 =  "data:" . $element['filetype'] .  ";base64," . base64_encode($element['file2']);
                            $getfile3 =  "data:" . $element['filetype'] .  ";base64," . base64_encode($element['file3']);
                            $getfile4 =  "data:" . $element['filetype'] .  ";base64," . base64_encode($element['file4']);

                            echo "<tr>
            <td><img src='" . $getfile . "' height='100' alt=''></td>
            <td><img src='" . $getfile2 . "' height='100' alt=''></td>
            <td><img src='" . $getfile3 . "' height='100' alt=''></td>
            <td><img src='" . $getfile4 . "' height='100' alt=''></td>
            <td >" . $element['name'] . "</td>
            <td>" . $element['price'] . "</td>
            <td>".$selectCatWithCondition['name']."</td>
            <td>
               <a href='admin_update.php?do=" . $element['id'] . "' class='btn'> <i class='fas fa-edit'></i> edit </a>
               <form method='POST'> <button name='deleteProd' class='btn' style='background:red' value='" . $element['id'] . "'>delete</button> </form>
               </td>
         </tr>";
                        }
                        if(isset($_POST['deleteProd'])){
                            $prod->deleteProd($_POST['deleteProd']);
                        }
                        ob_flush();
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="../../dashboard/assets/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>