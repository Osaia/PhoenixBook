<?php
require_once 'model/UserModel.php';


class ProfileController{

    public function index(){
        //$userModel = new UserModel();

        $view = new View('');
        $view->title = 'Login';
        $view->heading = 'Login';
        //$view->users = $userModel->readAll();
        $view->display();
    }

    public function login(){
        if($_POST['submit']){
            $uName = $_POST['Username'];
            $password = $_POST['Password'];
        }
        $userModel = new UserModel();


        if ($userModel->find($uName, $password))
        {
            header('Location: /entries');
        }else{
            echo "Wrong username";
        }


    }

}