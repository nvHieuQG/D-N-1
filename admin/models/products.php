<?php

class product extends database {
    protected $table = "products";
    public function render_prd($comment,$litmit,$offset){
        $sql = "SELECT products.*, categories.name AS category, COUNT(product_variants.product_id) AS variant_count FROM 
        products LEFT JOIN product_variants ON products.product_id = product_variants.product_id AND product_variants.status = '1' 
        JOIN categories ON products.category_id = categories.category_id WHERE products.comment = '$comment'
         GROUP BY products.product_id, categories.name ORDER BY products.ngaynhap DESC LIMIT $litmit OFFSET $offset;";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function delete_prd($id){
        $sql =  "UPDATE `products` SET `comment` = '0' WHERE `products`.`product_id` = $id";
        $this->conn->exec($sql);
    }
    public function presently($id){
        $sql =  "UPDATE `products` SET `comment` = '1' WHERE `products`.`product_id` = $id";
        $this->conn->exec($sql);
    }
    public function add_products($name,$category_id,$price,$gianhap,$stock_quantity,$status,$comment,$image,$Quantity_sold,$mota){
        $sql = "INSERT INTO `products` ( `name`, `category_id`, `price`, `gianhap`, `stock_quantity`, `status`, `comment`, `image`, `Quantity_sold`, `mota`,`ngaynhap`,`views`)
         VALUES ('$name', '$category_id', '$price', '$gianhap', '$stock_quantity', '$status', '$comment', '$image', '$Quantity_sold', '$mota',CURRENT_TIMESTAMP,0)";
         
         $this->conn->exec($sql);

    }
    public function select_products_by_id($id){
        $sql = "SELECT products.*,categories.name as category FROM products JOIN categories
         ON products.category_id = categories.category_id WHERE products.product_id = $id";
         $stmt = $this->conn->query($sql);
         $stmt->execute();
         return $stmt->fetch();
    }
    public function update_products($name,$category_id,$price,$gianhap,$stock_quantity,$status,$comment,$image,$Quantity_sold,$mota,$products_id){
        $sql = "UPDATE `products` SET `name` = '$name', `category_id` = '$category_id', `price` = '$price', `gianhap` = '$gianhap', `stock_quantity` = '$stock_quantity', `status` = '$status', `comment` = '$comment', 
        `image` = '$image', `Quantity_sold` = '$Quantity_sold', `mota` = '$mota' WHERE `products`.`product_id` = $products_id";
        // echo $sql;
        // die;
        $this->conn->exec($sql);
        
    }
    public function select_where_products_name($name){
        $sql = "SELECT * FROM products where `name` = '$name'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
  
    
    
    
}