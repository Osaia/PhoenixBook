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



    //        //toDo: Error Handling DB Connection
    //        // Create connection
    //        $conn = new mysqli($servername, $username, $password, $dbname);
    //        // Check connection
    //        if ($conn->connect_error) {
    //            die("Connection failed: " . $conn->connect_error);
    //        }
    public function find($username, $pwd){


        $uQuery = "SELECT username FROM user WHERE username= ?";

        $statement = ConnectionHandler::getConnection()->prepare($uQuery);
        $statement->bind_param('s', $username);

        $result = $statement->execute();

        if($result){
            $pwd = sha1($pwd);
            $pQuery = "SELECT password FROM user WHERE password= ?";

            $statement = ConnectionHandler::getConnection()->prepare($pQuery);
            //fehleer boolean
            $statement->bind_param('s', $pwd);

            $result = $statement->execute();
            if($result){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }

    public function ajaxUserandEmail($un){

        $query = "Select * from $this->tableName where username = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $un);

        $result = $statement->execute();

        if($result){
            return true;
        }
        else{
            return false;
        }
    }
}
