<?php

require_once 'lib/Model.php';

/**
 * Das EntrysModel ist zuständig für alle Zugriffe auf die Tabelle "entrys".
 *
 * Die Ausführliche Dokumentation zu Models findest du in der Model Klasse.
 */
class EntrysModel extends Model
{
    /**
     * Diese Variable wird von der Klasse Model verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'entrys';

    /**
     * @param $userid
     * @param $text
     * @param $date
     * @param $bild
     * @param $likes
     * @throws Exception
     */
    public function create($userid, $text, $date, $bild, $likes)
    {
        $query = "INSERT INTO $this->tableName (user_id, text, date, bild, likes) VALUES (?, ?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param($userid, $text, $date, $bild, $likes);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

}
