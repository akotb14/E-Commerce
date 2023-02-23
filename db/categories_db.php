<?php
include_once "db.php";
class CategoriesDB extends connectdatabase
{

    public function addCategory($name, $details, $filedata, $filename, $filetype)
    {
        $addCat = $this->connectdb()->prepare("INSERT INTO categories (name , details , file , filename , filetype) VALUES (:name , :details , :file , :filename , :filetype)");
        $addCat->bindParam('name', $name);
        $addCat->bindParam('details', $details);
        $addCat->bindParam('file', $filedata);
        $addCat->bindParam('filename', $filename);
        $addCat->bindParam('filetype', $filetype);
        if (($filetype === "image/png") || ($filetype === "image/jpeg") || ($filetype === "image/gif") || ($filetype === "image/jpg")) {

            if ($addCat->execute()) {
                header("location: admin_page.php ");
            }
        } else {
            echo "failed image";
        }
    }

    public function updateCat($id, $name, $details, $filedata, $filename, $filetype)
    {
        $updateCat = $this->connectdb()->prepare("UPDATE `categories` SET name = ? , details = ? , file = ? , filename = ? ,filetype = ?  WHERE id = ? ");


        if ($updateCat->execute([$name, $details, $filedata, $filename, $filetype, $id])) {
            header("location: admin_page.php");
        } 
    }
    public function deleteCat($id)
    {
        $deleteCat = $this->connectdb()->prepare("DELETE FROM categories WHERE id = ?");
        if ($deleteCat->execute([$id])) {
            header("location: http://localhost/E-commerce/admin/category/php%20admin%20crud/admin_page.php");
        }
    }
    public function showCategories()
    {
        $select = $this->connectdb()->prepare("SELECT * FROM categories");
        $select->execute();
        return $select;
    }
    public function showCategoriesWithCondition($id)
    {

        $selectcat = $this->connectdb()->prepare("SELECT * FROM categories WHERE id = ?");
        $selectcat->execute([$id]);
        return $selectcat;
    }
    public function insertCategorywithTrigger(){
        $addCat = $this->connectdb()->prepare("CREATE or REPLACE TRIGGER numOfCategory AFTER INSERT on categories FOR EACH ROW BEGIN END");
        if($addCat->execute()){
            echo "sucess";
        }else{
            echo "failed";
        }
    }
}
