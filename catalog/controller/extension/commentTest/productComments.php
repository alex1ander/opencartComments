<?php

class ControllerExtensionCommentTestProductComments extends Controller {
	
	public function index() {
		//переменные
		$data['dir_upload'] = "/upload/";
		$data['url'] = $_SERVER['REQUEST_URI'];
		$data['product_id'] = $this->request->get['product_id'];
		//пагинация
		$pagination = $this->pagination();
		$data = array_merge($data, $pagination);
		//фильтра
		$filters = $this->filters();
		$data = array_merge($data, $filters);		

        $this->load->model('extension/commentTest/productComments');
    	$data['comments'] = $this->model_extension_commentTest_productComments->productComments($data);
		$data['total'] = $this->model_extension_commentTest_productComments->countComments($data);
	
		return $this->load->view('extension/commentTest/productComments', $data);
	}

	public function pagination(){
		
		//количество комментариев на странице
		$data['commentsPerPage'] = 5; 
		 
		//установка значений пагинаций
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }

        $data['startFrom'] = ($currentPage - 1) * $data['commentsPerPage'];

		return $data;
	}

	public function filters(){
		
		if (isset($_GET['order'])) {
			if($_GET['order'] === 'date' || $_GET['order'] === 'rating') {
            	$order = $_GET['order'];
			}
        } else {
           		$order = 'date';
        }

		if (isset($_GET['sort'])) {
			if($_GET['sort'] === 'asc') {
            	$sort = $_GET['sort'];
			} else {
				$sort = 'desc';
	 	}
        } else {
           		$sort = 'desc';
        }
		
		$data['order'] = $order;
		$data['sort'] = $sort;

		return $data;
	}

}
