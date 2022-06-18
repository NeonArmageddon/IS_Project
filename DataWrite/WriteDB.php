<?php
//Config of DB connection.
class Database
{
    private $host = "localhost";
    private $user = "Integracja";
    private $password = "Integracja";
    private $database = "projekt";

    public function getConnection()
    {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Error failed to connect to MySQL: " . $conn->connect_error);
        } else {
            $conn->query("SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE");
            return $conn;
        }
    }
}

class WriteDB
{
    public function write($data)
    {
        $database = new Database();
        $db = $database->getConnection();
        $db->begin_transaction();
        $name = $data["Name"];
        $checkquery = "SELECT 'CountryID' FROM country WHERE Name = '" . $name . "'";
        $result = $db->query($checkquery);
        if ($result->num_rows == 0) {
            $temp2 = "";
            foreach ($data["Data"] as $value) {
                $temp2 = $temp2 . "'" . $value . "', ";
            }

            $sqlData = "INSERT INTO rental_values VALUES ('0', " . substr($temp2, 0, -2) . ");";
            echo "<br/>" . $sqlData;
            echo "<br/>";
            if ($db->query($sqlData) == true) {
                $last_id = $db->insert_id;
                echo "New record created successfully. Last inserted ID is: " . $last_id;
                $sqlCountry = "INSERT INTO country VALUES('0', '" . $name . "', '" . $last_id . "');";
                echo "<br/>" . $sqlCountry . "<br/>";
                if ($db->query($sqlCountry) == true) {
                    echo "New record created successfully.";
                } else {
                    echo "data save to DB failed: " . $db->error;
                }
            } else {
                echo "data save to DB failed: " . $db->error;
            }
        } else {
            echo "Record for country already exists";
        }
        $db->commit();
        $db->close();
    }
}
