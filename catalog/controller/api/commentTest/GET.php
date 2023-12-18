<?php

//url http://newsitec/index.php?route=api/CommentTest/get/functionName
class ControllerApiCommentTestGet extends Controller {
    public function comments() {

        $type = $_GET['route'];
        $params = explode('/',$type);
        
        $data['select'] = "*";
        $data['condition'] = '';

        $this->load->model('extension/commentTest/getComments');
	    $rows = $this->model_extension_commentTest_getComments->getAPIComments($data);

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($rows,JSON_PRETTY_PRINT));
       
    }

    public function name() {

        $type = $_GET['route'];
        $params = explode('/',$type);

        $data['select'] = "name";
        $data['condition'] = '';
        $this->load->model('extension/commentTest/getComments');
	    $rows = $this->model_extension_commentTest_getComments->getAPIComments($data);

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($rows,JSON_PRETTY_PRINT));
       
    }

    public function userIP() {

        $type = $_GET['route'];
        $params = explode('/',$type);
        
        $data['select'] = "*";
        $userIP = '"' . $params[4] .'"';
        $data['condition'] = "WHERE userIP = $userIP";

        $this->load->model('extension/commentTest/getComments');
	    $rows = $this->model_extension_commentTest_getComments->getAPIComments($data);
        if(count($rows) === 0){
        
            http_response_code(404);
            $rows = [
                'status' => false,
                'message' => "CHECK IP"
            ];
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($rows,JSON_PRETTY_PRINT ));
       
    }

    public function commentID() {

        $type = $_GET['route'];
        $params = explode('/',$type);
        $data['select'] = "*";
        $commentID = '"' . $params[4] .'"';
        $data['condition'] = "WHERE commentID = $commentID";

        $this->load->model('extension/commentTest/getComments');
	    $rows = $this->model_extension_commentTest_getComments->getAPIComments($data);
        if(count($rows) === 0){
        
            http_response_code(404);
            $rows = [
                'status' => false,
                'message' => "CHECK ID"
            ];
        }

        
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($rows,JSON_PRETTY_PRINT ));
       
    }
}
