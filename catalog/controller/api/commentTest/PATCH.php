<?php


class ControllerApiCommentTestPatch extends Controller {
    public function patch() {

        $type = $_GET['route'];
        $params = explode('/',$type);
        $id = $params[4];

        $data = file_get_contents('php://input');
        $data = json_decode($data,true);

        http_response_code(201);
        $this->load->model('extension/commentTest/getComments');
	    $rows = $this->model_extension_commentTest_getComments->patchAPIComments($data,$id);
              
    }

}


/*
http://newsitec/index.php?route=api/CommentTest/patch/patch/$commentID
{
    "product_id":43,
    "name":"valera",
    "rating":"5",
    "email":"patch@email",
    "commentText":"patchComment",
    "advantages": "advantages",
    "disadvantages": "disadvantages"
}

*/