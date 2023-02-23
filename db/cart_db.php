<?php

include_once "db.php";
class CartDB extends connectdatabase
{
    //show orderitem in cart page
    public function showOrderItemAtCart()
    {
        $select = $this->connectdb()->prepare("SELECT products.*, `order`.`quantity`, `order`.`id` as oid , `order`.`subtotal` 
             FROM `order` INNER JOIN products 
                    ON products.id = `order`.`productId`  and userId = ? and confirm = 0 ");
        $select->execute([$_SESSION['userid']]);
        return $select;
    }
    //delete orderitem
    public function deleteOrderItemAtCart($deleteId, $url)
    {
        if (isset($deleteId)) {
            $delete = $this->connectdb()->prepare("DELETE FROM `order` WHERE id = ?");
            if ($delete->execute([$deleteId])) {
                header("LOCATION: $url");
            }
        }
    }
    //update itemorder ex quantity subtotal
    public function updateOrderItemAtCart($updateId, $url)
    {
        if (isset($updateId)) {
            $do = $_GET['do'];
            $sd = $this->connectdb()->prepare("SELECT products.price FROM `order` 
        INNER JOIN products ON products.id = `order`.`productId`and `order`.`id`= $do ");
            $sd->execute();
            $d = $sd->fetchAll(PDO::FETCH_ASSOC);
            $quantity = $_POST['quantity'];
            $quantity = (int)$quantity;
            $updata = $this->connectdb()->prepare("UPDATE `order`SET quantity = ? , subtotal = ? WHERE id = ?");
            if ($updata->execute([$quantity, ($quantity * $d[0]['price']), $updateId])) {
                header("LOCATION: $url");
            }
        }
    }
    public function getTotalPriceAtCart()
    {
        $total = $this->connectdb()->prepare("SELECT sum(subtotal) as totalprice FROM `order` where userId = ? and confirm = ?");
        $total->execute([$_SESSION['userid'], 0]);
        $total = $total->fetch();
        return $total['totalprice'];
    }
}
