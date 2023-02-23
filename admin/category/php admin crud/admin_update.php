<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category update</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../../dashboard/assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>
    <?php
    session_start();
    if ($_SESSION['admin'] == 0) {
        header("location:http://localhost/E-commerce/index.php");
    }
    include_once "../../../db/categories_db.php";

    $updateCat = new CategoriesDB();
    $do = $_GET['do'];
    $selectCat = $updateCat->showCategoriesWithCondition($do);
    $selectCat = $selectCat->fetch(PDO::FETCH_ASSOC);
    $getfile = "data:" . ";base64," . base64_encode($selectCat['file']);
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
                    <a href="admin_page.php" class="nav">
                        <span class="icon">
                        <span class="material-symbols-outlined">
                                wallet
                            </span>
                                                </span>
                        <span class="title">Category</span>
                    </a>
                </li>
                <li>
                    <a href="../../product/php admin crud/admin_page.php" class="nav">
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
                <div class="admin-Category-form-container centered">
                    <form method="POST" enctype="multipart/form-data">
                        <h3 class="title">update the Category</h3>
                        <input type="text" value="<?php echo $selectCat['name'] ?>" name="updatename" class="box">
                        <input type="text" value="<?php echo $selectCat['details'] ?>" name="updatedetails" class="box">
                        <input type="file" accept="image/png, image/jpeg, image/jpg" name="image" class="box">
                        <?php echo "<img src='$getfile' width='200'>" ?>
                        <button name="updateCategory" class="btn">update Category</button>
                        <a href="admin_page.php" class="btn">go back!</a>
                    </form>
                    <?php


                    if (isset($_POST['updateCategory'])) {
                        $nameUp = $_POST['updatename'];
                        $detailsUp = $_POST['updatedetails'];

                        if ($_FILES['image']['size'] == 0) {
                            $filedata = $selectCat['file'];
                            $filename = $selectCat['filename'];
                            $filetype = $selectCat['filetype'];
                        } else {
                            $filename = $_FILES['image']['name'];
                            $filetype = $_FILES['image']['type'];
                            $filedata = file_get_contents($_FILES['image']['tmp_name']);
                        }
                        $updateCat->updateCat($do, $nameUp, $detailsUp, $filedata, $filename, $filetype);
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