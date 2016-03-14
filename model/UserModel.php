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
     * @param $username
     * @param $name
     * @param $surname
     * @param $email
     * @param $password
     * @param $profilbild
     * @return bool
     * @throws Exception
     */
    public function create($username, $name, $surname, $email, $password, $profilbild)
    {
        $password = sha1($password);
        $result = "";

        $query = "INSERT INTO $this->tableName (username, name, surname, email, password, profilbild) VALUES (?, ?, ?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssssss', $username, $name, $surname, $email, $password, $profilbild);

        if (!$statement->execute()) {
            $result = $statement->error;
            //throw new Exception($statement->error);
        }

        return $result;
    }

    public function update($username, $name, $surname, $password, $profilbild)
    {
        $password = sha1($password);

        $query = "UPDATE $this->tableName SET name = ?, surname = ?, password = ?, profilbild = ? WHERE username = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sssss', $name, $surname, $password, $profilbild, $username);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

    public function getProfilpicture($username)
    {
        $query = "Select profilbild from $this->tableName where username = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $username);

        $result = $statement->execute();

        if(!$result)
        {
            throw new Exception($statement->error);
        }

        return $result;
    }

    public function getUserIDbyName($un){
        $query = "Select id from $this->tableName where username = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $un);

        $result = $statement->execute();

        $result = $statement->get_result();

        $statement->close();

        // Ersten Datensatz aus dem Reultat holen
        $row = $result->fetch_object();

        if(!$result)
        {
            throw new Exception($statement->error);
        }

        return $row->id;
    }


    public function find($username, $pwd){
        $uQuery = "SELECT username FROM user WHERE username= ?";

        $statement = ConnectionHandler::getConnection()->prepare($uQuery);
        $statement->bind_param('s', $username);

        $result = $statement->execute();
        $statement->close();
        if($result){
            $pQuery = "SELECT * FROM $this->tableName WHERE username= ?";
            $statement = ConnectionHandler::getConnection()->prepare($pQuery);

            $statement->bind_param('s', $username);
            $statement->execute();

            $result = $statement->get_result();

            $statement->close();

            // Ersten Datensatz aus dem Reultat holen
            $row = $result->fetch_object();

            if($row->password ==  sha1($pwd)){
                echo reset($result);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }

    public function getNameAndSurnameByID($id){

        $query = "SELECT name, surname FROM $this->tableName WHERE id= ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);

        $statement->bind_param('i', $id);
        $statement->execute();

        $result = $statement->get_result();

        $statement->close();

        // Ersten Datensatz aus dem Reultat holen
        $row = $result->fetch_object();

        return $row;
    }

    public function ajaxUserandEmail($searchterm, $mailoruser){

        if($mailoruser == "user"){
            $query = "Select * from $this->tableName where username = ?";
        }else{
            $query = "Select * from $this->tableName where email = ?";
        }


        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $searchterm);

        $ok = $statement->execute();
        $result = $statement->get_result();

        $user = $result->fetch_object();

        if($user != false){
            return true;
        }
        else{
            return false;
        }
    }
}
