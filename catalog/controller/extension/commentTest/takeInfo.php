<?php
class ControllerExtensionCommentTestTakeInfo extends Controller {
    public function takeInfo(){
        
        $this->validation();
        
        $photoName = $this->checkTypeFile();
        
        $data = [
            'product_id' => $_POST['product_id'],
            'rating' => $_POST['rating'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'commentText' => $_POST['commentText'],
            'advantages' => $_POST['advantages'],
            'disadvantages' => $_POST['disadvantages'],
            'photoName' => $photoName
        ];
        //отправка данных
        $this->load->model('extension/commentTest/sendToDB');
        $this->model_extension_commentTest_sendToDB->sendComment($data);
        if(array_key_exists('HTTP_REFERER',$_SERVER)) header("Location: ". $_SERVER['HTTP_REFERER']);
        die();
    }

    public function validation(){
        //валидация данных

        $_POST['product_id'] ? '' : die();
        $_POST['rating'] ? '' : die();
        $_POST['name'] ? '' : die();
        $_POST['email'] ? '' : die();
        $_POST['commentText'] ? '' : die();
        if(strlen($_POST['advantages']) < 10) $_POST['advantages'] = '';
        if(strlen($_POST['disadvantages']) < 10) $_POST['disadvantages'] = '';
    }
    public function checkTypeFile(){
        if(empty($_FILES)) return 'empty';
        $availableImageTypes = ['image/jpeg', 'image/gif', 'image/png'];
        $availableTextTypes = ['text/plain'];

        if(in_array($_FILES['file']['type'],$availableImageTypes)){
            return $this->loadPhoto();
        } else if (in_array($_FILES['file']['type'],$availableTextTypes)){
            return $this->loadTxt();
        } else {
            return 'empty';
        }
    }

    public function loadPhoto(){
        //загрузка фото
        $data = $_FILES['file'];
        $photoName = $this->load->controller('extension/commentTest/resizePhoto',$data);
        return $photoName;
    }

    public function loadTxt(){
        echo 111;
    }
}