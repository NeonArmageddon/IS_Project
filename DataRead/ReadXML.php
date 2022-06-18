<?php
//Takes filename with file extension like: "DataItaly.xml"
//!!!Handles only files created by WriteXML.php!!!
class ReadXML
{
    function ReadData()
    {
        $filePath = "./files/Data.xml";
        $xml = simplexml_load_file($filePath);
        $json = json_encode($xml);
        $array = json_decode($json, true);
        return $array;
    }
}
