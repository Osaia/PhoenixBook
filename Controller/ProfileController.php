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
            $uName = $_POST['username'];
            $password = $_POST['password'];
        }
        $userModel = new UserModel();

        if ($userModel->find($uName, $password))
        {
            $_SESSION['userid'] = $userModel->getUserIDbyName($uName);
            $_SESSION['username'] = $uName;
            $_SESSION['profilbild'] = $userModel->getProfilpicture($uName);
            header('Location: /entries');
        }else{
            header('Location: /');
        }


    }

    public function logout(){
        session_unset();
        session_destroy();

        header('Location: /');
    }

}