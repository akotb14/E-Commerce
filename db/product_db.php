<?php
include_once "db.php";
class ProductDB extends connectdatabase
{
    public function addProduct($name, $price, $detail, $file, $file2, $file3, $file4, $catId)
    {
        $addProduct = $this->connectdb()->prepare("INSERT INTO products (name , price , detail , file ,file2 , file3  , file4   , categoriesId) 
        VALUE(? , ? , ? ,? ,? ,? ,? ,?)");
       if( $addProduct->execute([$name, $price, $detail, $file, $file2, $file3, $file4, $catId])){
           header("location: http://localhost/E-commerce/admin/product/php%20admin%20crud/admin_page.php");
       }
    }

    public function deleteProd($id)
    {
        $deleteProd = $this->connectdb()->prepare("DELETE FROM products WHERE id = ?");
        if ($deleteProd->execute([$id])) {
            header("location: http://localhost/E-commerce/admin/product/php%20admin%20crud/admin_page.php");
        }
    }
    public function updateProd($id, $name, $price, $detail, $filedata, $filedata2, $filedata3, $filedata4, $catId)
    {
        $updateProd = $this->connectdb()->prepare("UPDATE `products` SET name = ? , price = ? , detail = ? , file = ? , file2 = ? ,file3 = ? ,file4 = ? , categoriesId = ?  WHERE id = ? ");


        if ($updateProd->execute([$name, $price, $detail, $filedata, $filedata2, $filedata3, $filedata4, $catId, $id])) {
            header("location: admin_page.php");
        } else {
            echo "failed";
        }
    }
    public function showProduct()
    {
        $select = $this->connectdb()->prepare("SELECT * FROM products");
        $select->execute();
        return $select;
    }
    public function showProductWithCondition($do)
    {

        $selectproduct = $this->connectdb()->prepare("SELECT * FROM products WHERE id = ?");
        $selectproduct->execute([$do]);
        return $selectproduct;
    }
    public function showProductWithCategories()
    {
        $do = $_GET['do'];
        $select = $this->connectdb()->prepare(
            "SELECT products.*,categories.details 
          FROM products INNER JOIN categories 
           ON  
             categories.id = products.categoriesId  
                AND 
              products.categoriesId = $do"
        );
        $select->execute();
        return $select;
    }
}
