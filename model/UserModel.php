<?php

require_once 'lib/Model.php';

/**
 * Das UserModel ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Models findest du in der Model Klasse.
 */
class UserModel extends Model
{
    /**
     * Diese Variable wird von der Klasse Model verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'user';

    /**
     * Creates user
     *
     * @param $username
     * @param $name
     * @param $surname
     * @param $email
     * @param $password
     * @param $profilbild
     * @throws Exception
     *
     */
    public function create($username, $name, $surname, $email, $password, $profilbild)
    {
        $password = sha1($password);

        $query = "INSERT INTO $this->tableName (username, name, surname, email, password, profilbild) VALUES (?, ?, ?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssssss', $username, $name, $surname, $email, $password, $profilbild);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

    public function getProfilpicture($username)
    {
        $query = "Select profilbild from user where username = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $username);

        $result = $statement->execute();

        if(!$result)
        {
            throw new Exception($statement->error);
        }

        return $result;
    }
}
