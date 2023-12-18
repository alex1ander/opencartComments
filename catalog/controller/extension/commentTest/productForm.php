<?php

class ControllerExtensionCommentTestProductForm extends Controller {
	
	public function index() {
		$data['product_id'] = $this->request->get['product_id'];
		
		$data['actionForm'] = $this->url->link('extension/commentTest/takeInfo/takeInfo', '', true);

		return $this->load->view('extension/commentTest/productForm',$data);
	}
}
