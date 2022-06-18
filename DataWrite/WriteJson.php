<?php
//Created files are different than those created by eurostat api, saves them as: "Data*country full name*.Json"
class WriteJson
{
    public function write($data)
    {
        $filePath = "./files/Data.json";
        $filePath2 = "./files/Data.json";
        $file = file_get_contents($filePath) or die("File not found");
        $array = json_decode($file, true);
        if ($array == null) {
            $json = json_encode($data);
            file_put_contents($filePath, $json);
            echo "saved data to JSON";
        } else {
            foreach($data as $dataRow)
            {
                if(in_array($dataRow, $array) != true)
                {
                    array_push($array, $dataRow);
                }
            }
            $json = json_encode($array);
            file_put_contents($filePath2, $json);
            echo "saved data to JSON";
        }
    }
}
