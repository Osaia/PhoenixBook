<?php

class ProfileController{

    public function index(){
        //$userModel = new UserModel();

        $view = new View('');
        $view->title = 'Login';
        $view->heading = 'Login';
        //$view->users = $userModel->readAll();
        $view->display();
    }

}