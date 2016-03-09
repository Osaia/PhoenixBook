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
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
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
        if ($_POST['send']) {
            $username = $_POST['username'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $profilbild = "-";

            var_dump($_FILES);
            if(isset($_FILES['fileToUpload']))
            {
                $profilbild = "uploads/$username.jpg";
                move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $profilbild);
            }

            $userModel = new UserModel();
            $userModel->create($username, $name, $surname, $email, $password, $profilbild);
            //($username, $name, $surname, $email, $password, $profilbild)
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)

        //todo success or fail message for registration

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

        //todo success or fail message for registration

        //header('Location: /');
    }

    public function delete()
    {
        $userModel = new UserModel();
        $userModel->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /');
    }
}
