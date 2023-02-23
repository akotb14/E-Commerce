<?php
include_once "db.php";
include_once "product_db.php";
include_once "method.php";

class OrderDB extends connectdatabase
{
    private function checkOrder()
    {
        $do = $_GET['do'];

        $checkorder = $this->connectdb()->prepare("SELECT * FROM `order` WHERE productId = ? and userId = ? and confirm = ?");
        $checkorder->execute([$do, $_SESSION['userid'], 0]);
        return $checkorder->rowCount() === 0;
    }
    public function addOrderAtCart()
    {
        $prod =new ProductDB();
        
        $add = "";
        if ($this->checkOrder()) {

            if (isset($_POST['add'])) {
                if (isset($_SESSION["username"])) {
                    $do = $_GET['do'];
                    $id = (int)$do;
                    $quantity = $_POST['quantity'];
                    $priceProd =$prod->showProductWithCondition($do);
                    $priceProd =$priceProd->fetch(PDO::FETCH_ASSOC); 
                    $quantity = (int)$quantity;
                    $subtotal = (int)$priceProd['price'] * $quantity;
                    $addorder = $this->connectdb()->prepare("INSERT INTO `order`(quantity,productId ,subtotal ,userId)VALUES (?,?, ? ,?)");
                    if ($addorder->execute([$quantity, $id, $subtotal, $_SESSION['userid']])) {
                        $add = "added it";
                       
                    }
                } else {
                    $do = $_GET['do'];
                    header("location: Registration/registration.php?page=orderItem&id=$do");
                }
            }
        } else {
            $add = "you are already added it in cart";
        }
        return $add;
    }
    public function updateOrder()
    {
        $update = $this->connectdb()->prepare("UPDATE `order` SET confirm = ? where userId = ?");
        $update->execute([1, $_SESSION["userid"]]);
    }
    public function showorderAtDashboard(){
        $select = $this->connectdb()->prepare("SELECT products.name as pName,users.NAME as uName,`order`.`quantity`as oQuantity,
                                         `order`.`subtotal`as oSubtotal ,infouser.*
        FROM `order` INNER JOIN users 
                      ON `order`.`userId` = users.id 
                 INNER JOIN products 
                      ON `order`.`productId` =products.id
                      INNER JOIN infouser ON infouser.orderId = `order`.`id`
                           WHERE confirm = 1
                                 ORDER BY infouser.id DESC");
                           $select->execute();
       return $select;
    }
    public function showSalesAndEarning(){
        $select= $this->connectdb()->prepare("SELECT COUNT(id) as numberOfSales ,SUM(subtotal) as totalEarning FROM `order`
         WHERE confirm =1");
         $select->execute();

         return $select;
    }
}
