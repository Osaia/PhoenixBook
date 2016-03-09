<?php

/*
 * Die index.php Datei ist der Einstiegspunkt des MVC. Hier werden zuerst alle
 * vom Framework ben�tigten Klassen geladen und danach wird die Anfrage dem
 * Dispatcher weitergegeben.
 *
 * Wie in der .htaccess Datei beschrieben, werden alle Anfragen, welche nicht
 * auf eine bestehende Datei zeigen hierhin umgeleitet.
 */

session_start();

require_once 'lib/Dispatcher.php';
require_once 'lib/View.php';
require_once 'lib/Model.php';

$dispatcher = new Dispatcher();
$dispatcher->dispatch();
