<?php

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
}
