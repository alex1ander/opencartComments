<?php


class ControllerApiCommentTestPost extends Controller {
    public function post() {

        http_response_code(201);
        $this->load->controller('extension/commentTest/takeinfo/takeInfo');

    }

}
