<?php

require_once 'model/UserModel.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        $userModel = new UserModel();

        $view = new View('user_index');
        $view->title = 'User';
        $view->heading = 'User';
        $view->users = $userModel->readAll();
        $view->display();
    }

    public function create()
    {
        $view = new View('user_create');
        $view->title = 'Register';
        $view->heading = 'Register';
        $view->display();
    }

    public function doCreate()
    {
        $result = "";
        if ($_POST['send']) {
            $username = $_POST['username'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $profilbild = "-";

            if(isset($_FILES['fileToUpload']))
            {
                $profilbild = "uploads/$username.jpg";
                move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $profilbild);
            }
            if($this->validate($username, $name, $surname, $email,$password)){

                $userModel = new UserModel();

                $result = $userModel->create($username, $name, $surname, $email, $password, $profilbild);
            }
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /');

    }

    public function validate($un, $n, $sn, $em, $pwd){
        $emailPat = '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/';
        $usernamePat = '/^[a-zA-Z0-9][a-zA-Z0-9_]{3,29}$/';
        $namePat = '/^[a-zA-Z0-9_äÄöÖüÜß]{3,20}$/';
        $pwdPat = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,8}$/';

        if(preg_match($usernamePat, $un)){
            if(preg_match($emailPat, $em)){
                if(preg_match($pwdPat, $pwd)){
                    if(preg_match($namePat, $n) || empty($n)){
                        if(preg_match($namePat, $sn) || empty($sn)){
                            return true;
                        }else{
                            echo 'surname';
                            return false;
                        }
                    }else{
                        echo 'name';
                        return false;
                    }
                }else{
                    echo 'pwd';
                    return false;
                }
            }else{
                echo 'email';
                return false;
            }
        }else{
           // echo 'username';
            echo '<div style="background-color: antiquewhite;height: 500px;width: 500px">Salü</div>';
            return false;
        }

        header('Location: /');
    }

    public function doUpdate()
    {
        if ($_POST['send']) {
            $userModel = new UserModel();

            $id = $_SESSION['userid'];
            $user = $userModel->readbyId($id);
            $username = $user->username;

            $name = (!isset($_POST['name'])) ? $user->name : $_POST['name'];
            $surname = (!isset($_POST['surname'])) ? $user->surname : $_POST['surname'];
            $password = (!isset($_POST['password'])) ? $user->password : sha1($_POST['password']);
            $profilbild = "uploads/$username.jpg";



            if(isset($_FILES['fileToUpload']))
            {
                move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $profilbild);
            }

            $userModel->update($name, $surname, $password, $profilbild);
            //($username, $name, $surname, $email, $password, $profilbild)
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)

        //todo success or fail message

        header('Location: /editProfile');
    }


    public function verify(){
        $userModel = new UserModel();

        $mailoruser = $_POST['type'];

        if($mailoruser == "user"){
            $result = $_POST['username'];
        }else{
            $result = $_POST['email'];
        }


        if($userModel->ajaxUserandEmail($result, $mailoruser)){
            echo "exists";
        }else{
            echo "notexists";
        }

    }

    public function delete()
    {
        $userModel = new UserModel();
        $userModel->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /');
    }
}
