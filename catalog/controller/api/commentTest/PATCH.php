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
