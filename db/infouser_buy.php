<?php

include_once "db.php";
include_once "order_db.php";
class InformationDB extends connectdatabase
{
    public function buyOrder($fullname, $city, $buildname, $district, $phoneNo, $streetname)
    {
        $update = new OrderDB();
        $checkorder = $this->connectdb()->prepare("SELECT * FROM `order` WHERE userId = ? and confirm = ?");
        $checkorder->execute([$_SESSION['userid'], 0]);
        $order = $checkorder->fetchAll();

        foreach ($order as $element) {
            $addinfo = $this->connectdb()->prepare('INSERT INTO infouser (fullname ,city ,buildname, district ,phoneNo,streetname , date ,userId  , orderId)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
            if ($addinfo->execute([$fullname, $city, $buildname, $district, $phoneNo, $streetname, date('d-m-Y'), $_SESSION['userid'], $element['id']])) {
                $update->updateOrder();
            }
        }
    }
    public function getInformation()
    {
        $select = $this->connectdb()->prepare("SELECT * from infouser where userid = " . $_SESSION['userid'] . "");
        $select->execute();
        return $select;
    }
}
