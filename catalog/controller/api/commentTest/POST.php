<?php


class ControllerApiCommentTestPost extends Controller {
    public function post() {

        print_r($_POST);
        print_r($_FILES);
        // http_response_code(201);
        // $this->load->controller('extension/commentTest/takeinfo/takeInfo');

    }

}

//url http://newsitec/index.php?route=api/CommentTest/Post/post


/*
product_id:44
name:valera
rating:5
email:patch@email
commentText:patchComment
advantages: advantages
disadvantages: disadvantages
*/