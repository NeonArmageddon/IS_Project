<?php
//Saves files as: "Data*country full name*.xml".
class WriteXML
{
    function getXMLFromObjectsList($array, $rootElement = null, $xml = null)
    {
        $_xml = $xml;

        if ($_xml === null) {
            $_xml = new SimpleXMLElement($rootElement !== null ? $rootElement : "<Countries/>");
        }
        foreach ($array as $k => $v) {
            if(is_numeric($k))
            {
                $k = "Country";
            }
            if (is_array($v)) {
                (new WriteXML)->getXMLFromObjectsList($v, $k, $_xml->addChild($k));
            } else {
                $_xml->addChild($k, $v);
            }
        }
        return $_xml->asXML();
    }
    function write($data)
    {
        $filePath = "./files/Data.xml";

        if ($data != null) {
            $xml = (new WriteXML)->getXMLFromObjectsList($data, "<Countries/>");
            file_put_contents($filePath, $xml);
            echo "saved data to XML";
        }
    }
}
