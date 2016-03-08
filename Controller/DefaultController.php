<?php

/**
 * Der Controller ist der Ort an dem es f�r jede Seite, welche der Benutzer
 * anfordern kann eine Methode gibt, welche die dazugeh�rende Businesslogik
 * beherbergt.
 *
 * Welche Controller und Funktionen muss ich erstellen?
 *   Es macht sinn, zusammengeh�rende Funktionen (z.B: User anzeigen, erstellen,
 *   bearbeiten & l�schen) gemeinsam in einem passend benannten Controller (z.B:
 *   UserController) zu implementieren. Nicht zusammengeh�rende Features sollten
 *   jeweils auf unterschiedliche Controller aufgeteilt werden.
 *
 * Was passiert in einer Controllerfunktion?
 *   Die Anforderungen an die einzelnen Funktionen sind sehr unterschiedlich.
 *   Folgend die g�ngigsten:
 *     - Daf�r sorgen, dass dem Benutzer eine View (HTML, CSS & JavaScript)
 *         gesendet wird.
 *     - Daten von einem Model (Verbindungsst�ck zur Datenbank) anfordern und
 *         der View �bergeben, damit diese Daten dann f�r den Benutzer in HTML
 *         Code umgewandelt werden k�nnen.
 *     - Daten welche z.B. von einem Formular kommen validieren und dem Model
 *         �bergeben, damit sie in der Datenbank persistiert werden k�nnen.
 */
class DefaultController
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
        // In diesem Fall m�chten wir dem Benutzer die View mit dem Namen
        //   "default_index" rendern. Wie das genau funktioniert, ist in der
        //   View Klasse beschrieben.
        $view = new View('default_login');
        $view->title = 'Startseite';
        $view->heading = 'Startseite';
        $view->display();
    }
}
