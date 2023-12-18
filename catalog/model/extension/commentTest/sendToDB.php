<?php
class ModelExtensionCommentTestSendToDB extends Model {
    public function sendComment($data) {


        // Создаем SQL-запрос
        $sql = "INSERT INTO " . DB_PREFIX . "commentsTest 
                (product_id, UserAgent, userIP, Email, name, commentText, rating,advantages, disadvantages, photoName, date)
            VALUES 
                ('" . 
				$this->db->escape($data['product_id']) . "', '" . 
				$this->db->escape($_SERVER['HTTP_USER_AGENT']) . "', '" . 
				$this->db->escape($_SERVER['REMOTE_ADDR']) . "', '" . 
				$this->db->escape($data['email']) . "', '" . 
				$this->db->escape($data['name']) . "', '" . 
				$this->db->escape($data['commentText']) . "', '" . 
				$this->db->escape($data['rating']) . "', '" .
                $this->db->escape($data['advantages']) . "', '" .
                $this->db->escape($data['disadvantages']) . "', '" .
                $this->db->escape($data['photoName']) . "', '" .
				$this->db->escape(date('Y-m-d')) . ",
				')";

        // Выполняем запрос
        $this->db->query($sql);
    }
}