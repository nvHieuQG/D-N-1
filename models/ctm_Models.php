<?php
class customers_models extends database{
    protected $table = "customer_info";
    public function renderInfo($user_id){
        $sql = "SELECT * FROM `customer_info` WHERE `customer_info`.`user_id` = '$user_id'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function insert_info_ctm($user_id,$full_name,$email,$phone,$address,$gender,$date_of_birth){
        $sql = "INSERT INTO `customer_info` ( `user_id`, `full_name`,`email`, `phone`, `address`, `gender`, `date_of_birth`,`authen`)
         VALUES ('$user_id', '$full_name','$email', '$phone', '$address', '$gender', '$date_of_birth','Chưa Xác Thực')";
         $this->conn->exec($sql);
    }
    public function update_info_ctm($user_id,$full_name,$email,$phone,$address,$gender,$date_of_birth){
        $sql = "UPDATE `customer_info` SET 
        `full_name` = '$full_name',`email` = '$email', `phone` = '$phone', `address` = '$address', `gender` = '$gender', `date_of_birth` = '$date_of_birth'
         WHERE `customer_info`.`user_id` = '$user_id'";
         $this->conn->exec($sql);
    }
    public function select_phone($phone){
        $sql = "SELECT * FROM customer_info WHERE phone = $phone";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function select_email($email){
        $sql = "SELECT * FROM customer_info WHERE email = '$email'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function authen_mail($user_id){
        $sql = "UPDATE `customer_info` SET `authen` = 'Đã Xác Thực' WHERE `customer_info`.`user_id` = $user_id";
        $this->conn->exec($sql);
    }
    public function delete_info($user_id){
        $sql = "DELETE FROM `customer_info` WHERE `customer_info`.`user_id` = $user_id;";
        $this->conn->exec($sql);
    }
    public function delete_acc($user_id){
        $sql = "DELETE FROM `users` WHERE `users`.`user_id` = $user_id;";
        $this->conn->exec($sql);
    }
}