<?php

class ControllerExtensionCommentTestResizePhoto extends Controller {
	
	public function index($data) {
        
        $imgPath = $data['tmp_name'];
        $this->resizeImage($imgPath);  
        $fileExtension = strtolower(pathinfo($data['name'], PATHINFO_EXTENSION));
        // Генерируем уникальное имя файла

        $filename = uniqid() . '.' . $fileExtension;

        // Перемещаем файл в нужную папку (upload)
        move_uploaded_file($data['tmp_name'], DIR_APPLICATION . '../upload/' . $filename);
        
		return $filename;
	}

    function resizeImage($imgPath) {
        
        $maxWidth = 1000;
        $maxHeight = 1000;
        list($width, $height) = getimagesize($imgPath);

        if ($width > $maxWidth || $height > $maxHeight) {
            $ratio = min($maxWidth / $width, $maxHeight / $height);
            $newWidth = $width * $ratio;
            $newHeight = $height * $ratio;

            $imageResized = imagecreatetruecolor($newWidth, $newHeight);
            $imageSource = imagecreatefromjpeg($imgPath); 
            imagecopyresampled($imageResized, $imageSource, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            imagejpeg($imageResized, $imgPath);
        }

    }

	
}



