<?php
require_once "model/EntrysModel.php";

class entriesController
{
    public function index()
    {
        // $userModel = new UserModel();

        $view = new View('entries');
        $view->title = 'Entries';
        $view->heading = 'Entries';
        // $view->users = $userModel->readAll();
        $view->display();
    }

    public function create() {
        $entriesModel = new EntrysModel();
        $userid = $_SESSION['userid'];
        $txt = $_POST['textField'];
        $date = date('Y M d');
        $bildpath = "-";
        $entries = $entriesModel->getCount() + 1;

        $allowed =  array('gif','png' ,'jpg');
        $ext = pathinfo($_FILES['uploadPicture']['name'], PATHINFO_EXTENSION);
        $tmppath = $_FILES['uploadPicture']['tmp_name'];
        var_dump($_FILES['uploadPicture']);

        if(isset($_FILES['uploadPicture']) && in_array($ext,$allowed))
        {
            $bildpath = "./uploads/bild" . $entries . "." .  $ext;
            $test = move_uploaded_file($tmppath, $bildpath);
            echo $test;
        }elseif(!in_array($ext,$allowed)){
            //todo message: not a valid format
        }
//        $likes = 0;


        $entriesModel->create($userid, $txt, $date, $bildpath);
        header('Location: /entries');
    }

    public function delete()
    {
        $id = $_GET['id'];
        $entryModel = new EntrysModel();

        $entryModel->deleteById($id);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /entries');
    }

//    public function like() {
//        $entriesModel = new EntrysModel();
//        $entriesModel->like($_GET['id']);
//
//        // Anfrage an die URI /user weiterleiten (HTTP 302)
//        header('Location: /');
//    }
}
