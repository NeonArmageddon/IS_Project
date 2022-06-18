<?php
//Takes nothing, reads from database with config in file WriteDB.php.

class ReadDataDB
{
    public function ReadData()
    {
        $database = new Database();
        $db = $database->getConnection();
        $db->begin_transaction();
        $sql = "SELECT * FROM `country` INNER JOIN `rental_values` ON `country`.`DataID` = `rental_values`.`DataID`;";
        $result = $db->query($sql);
        $db->commit();
        $db->close();
        if ($result->num_rows > 0) {
            $dataRecords = array();
            while ($row = $result->fetch_assoc()) {
                extract($row);
                array_push($dataRecords, $row);
            }
            echo "<br/>";
            $result = array();
            foreach($dataRecords as $dataRow)
            {
                $temp = array_slice($dataRow, 3);
                $temp2 = [
                    "Name" => $dataRow["Name"],
                    "Data" => $temp
                ];
                array_push($result, $temp2);
            }
            http_response_code(200);
            return $result;
        } else {
            http_response_code(404);
            return "error";
        }
    }
}
