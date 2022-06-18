<?php

//Takes filename with file extension like: "DataItaly.json" or not, when so it reads Data.json.
//Handles Json files created by eurostat when given fielname or by WriteJson.php when not.
class ReadJson
{
    public function ReadData($fileName = null)
    {
        if($fileName === null)
        {
            $filePath = "./files/Data.json";
            $file = file_get_contents($filePath) or die("File not found");
            $array = json_decode($file, true);
            return $array;
        } else {
            $filePath = "./files/".$fileName;
            $file = file_get_contents($filePath) or die("File not found");
            $array = json_decode($file, true);
            $name = array_values([$array["dimension"]["geo"]["category"]["label"]][0])[0];
            $data = array_values($array["value"]);
            $dates = array_values($array["dimension"]["time"]["category"]["label"]);
            $data2 = array();
            for ($i = 0; $i < count($data); $i++){
                $dates[$i] = "Date" . substr($dates[$i],0,4) . "_" . substr($dates[$i],5,7);
                $data2[$dates[$i]] = strval($data[$i]);
            }
            $temp = [
                "Name" => $name,
                "Data" => $data2
            ];
            $output = array($temp);
            return $output;
        }
    }
}
