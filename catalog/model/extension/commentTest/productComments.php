<?php

class ModelExtensionCommentTestProductComments extends Model {
    public function productComments($data) {

        //Создаем SQL-запрос
        $startFrom = $data['startFrom'];
        $commentsPerPage = $data['commentsPerPage'];
        $order = $data['order'];
        $sort = $data['sort'];
        $sql = "SELECT name, commentText, rating, advantages, disadvantages, photoName, date  FROM  " . DB_PREFIX . "commentsTest" . " WHERE product_id = " .
        $data['product_id']  . 
        " ORDER BY " . "`$order`" . " $sort " .
        " LIMIT  $startFrom, $commentsPerPage";
    
        // Выполняем запрос
        $request = $this->db->query($sql);
        return $request->rows;
		
    }

    public function countComments($data){
        $sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . "commentsTest " . "WHERE product_id = " . $data['product_id'];
        $request = $this->db->query($sql);
        
        $total = $request->rows[0]['total']/$data['commentsPerPage'];
        return ceil($total);
    }

}

