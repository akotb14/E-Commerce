<?php
error_reporting(0);
session_start();
 function findUser($namepage){
    if(isset($_SESSION["username"])){
        echo "<li><a href=''>".$_SESSION['username']."</a></li>";
    
    }else{
       echo "<li><a href='Registration/registration.php?page=$namepage'>Login</a></li>";
       
    }
};
function isAdmin(){
    if($_SESSION['admin'] == 1){
        echo '<li><a href="admin/dashboard/index.php">Dashboard</a></li>';
    }
}

function logout(){
    if(isset($_SESSION["username"])){
        echo "<form method='POST' class='logout'>
        <li><button name='logout' style=' background-color: #596d9f;
        border-color: #596d9f;
        font-weight: 600;
        font-size: 16px;
        border-width: inherit;'>Logout</button></li>
   </form>";
   if(isset($_POST['logout'])){
              session_destroy();
              header("LOCATION: index.php");
    }
} 
}
function logoutFromAdmin($usl){
    if($_SESSION['username']){
        session_destroy();
header("LOCATION: $usl");
    }
}
?>

