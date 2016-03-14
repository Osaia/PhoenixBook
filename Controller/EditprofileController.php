<?php


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
           $view = new View('editProfile');
        $view->title = 'Edit Profile';
        $view->heading = 'Edit Profile';
        $view->display();
    }
}
