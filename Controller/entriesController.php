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



        if(isset($_FILES['fileToUpload']))
        {
            $bildpath = "/uploads/bild" . $entries . ".jpg";
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $bildpath);
        }
//        $likes = 0;


        $entriesModel->create($userid, $txt, $date, $bildpath);
    }

    public function find($userid){

    }

//    public function like() {
//        $entriesModel = new EntrysModel();
//        $entriesModel->like($_GET['id']);
//
//        // Anfrage an die URI /user weiterleiten (HTTP 302)
//        header('Location: /');
//    }
}
