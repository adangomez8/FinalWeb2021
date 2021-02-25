<?php
require_once 'models/model.php';
require_once 'views/view.php';

class PublicController{

    private $model;
    private $view;

    public function __construct() {
        $this->model = new PublicModel();;
        $this->view = new PublicView();
    }
}