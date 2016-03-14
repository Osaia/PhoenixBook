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
    public function create($userid, $text, $date, $bild)
    {
        $query = "INSERT INTO $this->tableName (user_id, text, date, bild) VALUES (?, ?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('isss',$userid, $text, $date, $bild);

        $result = $statement->execute();

        if ($result) {
            throw new Exception($statement->error);
        }
    }

    public function show($max){
        //$uQuery = "SELECT username FROM user WHERE username='".$username."'";
        $query = "SELECT * FROM entrys LIMIT 0, $max";

        $statement = ConnectionHandler::getConnection()->prepare($query);

        $statement->execute();
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_array()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function readEntryByID($id){
        $query = "SELECT * FROM entrys WHERE user_id=?";

        $statement = ConnectionHandler::getConnection()->prepare($query);

        $statement->bind_param('i', $id);
        $result = $statement->execute();
    }

    public function find($userid){
        $uQuery = "SELECT username, profilbild FROM user WHERE id='$userid'";

        $statement = ConnectionHandler::getConnection()->prepare($uQuery);
        $statement->bind_param('s', $userid);

        $result = $statement->execute();
        $statement->close();
    }


}
















