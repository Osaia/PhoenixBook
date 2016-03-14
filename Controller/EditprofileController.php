<?php

require_once 'model/UserModel.php';

class EditprofileController
{
    /**
     * Die index Funktion des DefaultControllers sollte in jedem Projekt
     * existieren, da diese ausgef�hrt wird, falls die URI des Requests leer
     * ist. (z.B. http://mvc.local/). Weshalb das so ist, ist und wann welchr
     * Controller und welche Methode aufgerufen wird, ist im Dispatcher
     * beschrieben.
     */
    public function index()
    {
        $_SESSION['userid'] = 14;
        if(isset($_SESSION['userid'])) {
            $userModel = new UserModel();
            $names = $userModel->getNameAndSurnameByID($_SESSION['userid']);

            $view = new View('editProfile');
            $view->title = 'Edit Profile';
            $view->heading = 'Edit Profile';
            $view->name = $names->name;
            $view->surname = $names->surname;
            $view->display();
       }else{
            header('Location: /');
       }
    }
}
