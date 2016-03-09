<?php

require_once 'lib/Model.php';

/**
 * Das EntrysModel ist zuständig für alle Zugriffe auf die Tabelle "entrys".
 *
 * Die Ausführliche Dokumentation zu Models findest du in der Model Klasse.
 */
class CommentsModel extends Model
{
    /**
     * Diese Variable wird von der Klasse Model verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'comments';

    /**
     * @param $user_id
     * @param $text
     * @param $entry_id
     * @param $date
     * @throws Exception
     */
    public function create($user_id, $text, $entry_id, $date)
    {
        $query = "INSERT INTO $this->tableName (user_id, entry_id, text, date) VALUES (?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param($user_id, $entry_id, $text, $date);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
}
