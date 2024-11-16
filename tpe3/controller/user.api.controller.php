<?php

    require_once 'tpe3/apimodel/user.model.php';
    require_once 'tpe3/apiView/apiView.php';
    

    class UserApiController {
        private $model;
        private $view;

        public function __construct() {
            $this->model = new UserModel();
            $this->view = new apiView();
        }

        
    }