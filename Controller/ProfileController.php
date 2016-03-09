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

        $query_username = mysql_query("SELECT username FROM user WHERE username='".$uName."'");
        $query_pwd = mysql_query("SELECT username FROM user WHERE username='".$uName."'");

        if (mysql_num_rows($query_username) == 0)
        {
            //todo JESSICA: Konvertieren des PWDs und suchen und übereinstimmung finden 

            $query_pwd = mysql_query("SELECT password FROM user where username='".$uName."'");
           if(mysql_num_rows($query_pwd)){

           }
        }else{
            echo "Username already exists";
        }


    }

}