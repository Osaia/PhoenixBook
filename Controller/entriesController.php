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
        $userid = $_GET['id'];
        $txt = $_GET['txtfeld'];
        $date = date();
        $bild = "";
//        $likes = 0;


        $entriesModel = new EntrysModel();
        $entriesModel->create($userid, $txt, $date, $bild);
    }

//    public function like() {
//        $entriesModel = new EntrysModel();
//        $entriesModel->like($_GET['id']);
//
//        // Anfrage an die URI /user weiterleiten (HTTP 302)
//        header('Location: /');
//    }
}
