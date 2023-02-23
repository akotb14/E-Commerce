<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../../dashboard/assets/css/style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>
    <?php
    session_start();
    include_once "../../../db/categories_db.php";
    $cat = new CategoriesDB();
    $showCat = $cat->showCategories();
    if ($_SESSION['admin'] == 0) {
        header("location:http://localhost/E-commerce/index.php");
    }
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
                            </span>                     
                           </span>
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
                     ob_start();
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
                <div class="admin-Category-form-container">

                    <form method="POST" enctype="multipart/form-data">
                        <h3>add a new Category</h3>
                        <input type="text" placeholder="enter Category name" name="Category_name" class="box">
                        <input type="text" placeholder="enter details" name="Category_details" class="box">
                        <input type="file" accept="image/png, image/jpeg, image/jpg" name="Category_image" class="box">
                        <input type="submit" class="btn" name="add_Category" value="add Category">
                    </form>
                    <?php
                    if (isset($_POST['add_Category'])) {
                        $name = $_POST['Category_name'];
                        $details = $_POST['Category_details'];
                        $filename = $_FILES['Category_image']['name'];
                        $filetype = $_FILES['Category_image']['type'];
                        $filedata = file_get_contents($_FILES['Category_image']['tmp_name']);
                        $cat->addCategory($name, $details, $filedata, $filename, $filetype);
                    }
                    ?>
                </div>


                <div class="Category-display">
                    <table class="Category-display-table">
                        <thead>
                            <tr>
                                <th>Category image</th>
                                <th>Category name</th>
                                <th>Category description</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <?php
                       
                        foreach ($showCat as $element) {
                            $getfile = "data:" . $filetype . ";base64," . base64_encode($element['file']);
                            echo '<tr>
                  <td><img src=' . $getfile . ' height="100" alt=""></td>
                  <td>' . $element['name'] . '</td>
            <td>' . $element['details'] . '</td>
            <td>
               <a href="admin_update.php?do=' . $element['id'] . '" class="btn"> <i class="fas fa-edit"></i> edit </a>
              <form method="POST"> <button name="deleteCat" class="btn" style="background:red" value=' . $element['id'] . '>delete</button> </form>
              
            </td>
            </tr>  ';
                        }


                        if (isset($_POST['deleteCat'])) {
                            $deleteCat = $cat->deleteCat($_POST['deleteCat']);
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