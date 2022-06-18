<?php
include_once './dataRead/ReadDB.php';
include_once './dataRead/ReadJson.php';
include_once './dataRead/ReadXML.php';
include_once './dataRead/ReadAPI.php';
include_once './dataWrite/WriteXML.php';
include_once './dataWrite/WriteJson.php';
include_once './dataWrite/WriteDB.php';

$dbread = new ReadDataDB();
$data4 = $dbread->ReadData();
echo"<br/>Db data<br/>";
var_dump($data4);

$json = new ReadJson();
$data2 = $json -> ReadData();
echo"<br/> data from json <br/>";
var_dump($data2);

$xml = new ReadXML();
$data3 = $xml->ReadData();
echo"<br/> data from xml </br>";
var_dump($data3);

$Wdb = new WriteDB();
$Wdb -> Write($data2[0]);
$db = new ReadDataDB();
$data = $db -> ReadData();
echo "<br/>";
echo "<br/>";
echo "<br/>";
var_dump($data);
echo "<br/>";
echo "<br/>";
echo "<br/>";