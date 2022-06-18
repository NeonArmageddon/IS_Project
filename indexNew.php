<?php
include_once './dataRead/ReadDB.php';
include_once './dataRead/ReadJson.php';
include_once './dataRead/ReadXML.php';
include_once './dataRead/ReadAPI.php';
include_once './dataWrite/WriteXML.php';
include_once './dataWrite/WriteJson.php';
include_once './dataWrite/WriteDB.php';


$db =  new ReadDataDB();
$DBData = $db->ReadData();

echo "<span id ='test'> </span></br>";
echo "<span id ='test2'> </span>";
?>
<br />
<?php
$dates = array('2019-03', '2019-04', '2019-05', '2019-06', '2019-07', '2019-08', '2019-09', '2019-10', '2019-11', '2019-12', '2020-01', '2020-02', '2020-03', '2020-04', '2020-05', '2020-06', '2020-07', '2020-08', '2020-09', '2020-10', '2020-11', '2020-12', '2021-01', '2021-02', '2021-03');
foreach ($dates as $key => $value) {
    echo "<input type='button' value='" . $value . "' onclick='(setMonth($key))'/>";
}
echo "<br/>";
foreach ($DBData as $key => $value) {
    echo "Dane dla kraju <span id='country" . ($key) . "'> </span> dla miesiąca <span id='month" . ($key) . "'></span>: <span id='price" . ($key) . "'> </span>";
    echo "<br>";
}

$json = new ReadJson();
$dataJson = $json->ReadData();

?>

<br>
Wczytanie z pliku JSON:
<br>
<?php
echo "<input type='button' value='Wczytaj dane JSON' onclick='LoadJSON()'/>";
?>
<br>
Dane z każdego miesiąca dla państwa <span id="JSONCountryName"></span>

<?php
echo "<br>| ";
foreach ($dates as $key => $value) {
    echo $value . ": <span id='dataJSON" . $key . "'></span> | ";
    if ($value == "2019-12" || $value == "2020-12") {
        echo "<br>| ";
    }
}
?>

<br>
<br>
Wczytanie z API:
<br>
<?php
echo "<input type='button' value='Wczytaj dane z API' onclick='LoadAPI()'/>";
?>
<br>
<?php
$api = new ReadAPI();
$APIData = $api->ReadData("FR");
//var_dump($api->ReadData("FR"));
?>
Dane z każdego miesiąca dla państwa <span id="APICountryName"></span>

<?php
echo "<br>| ";
foreach ($dates as $key => $value) {
    echo $value . ": <span id='dataAPI" . $key . "'></span> | ";
    if ($value == "2019-12" || $value == "2020-12") {
        echo "<br>| ";
    }
}
?>

<br>
<br>
Wczytanie z XML:
<br>
<?php
echo "<input type='button' value='Wczytaj dane z XMLa' onclick='LoadXML()'/>";
?>
<br>
<?php
$xml2 = new ReadXML();
$XMLData = $xml2->ReadData();
//var_dump($xml2->ReadData("DataItaly.xml"));
?>
Dane z każdego miesiąca dla państwa <span id="XMLCountryName"></span>

<?php
echo "<br>| ";
foreach ($dates as $key => $value) {
    echo $value . ": <span id='dataXML" . $key . "'></span> | ";
    if ($value == "2019-12" || $value == "2020-12") {
        echo "<br>| ";
    }
}
?>
<br>
<br>

<?php
 $json2 = new WriteJson();
 $json2->write($APIData[0]);
 ?>
 <br>
 <br>
 Zapis do XML:
 <?php
 $xml = new WriteXML();
 $xml->write($APIData[0]);
 ?>
 <br>
 <br>
 Zapis do bazy danych:
 <?php
 $db2 = new WriteDB();
 $db2->write($APIData[0]);
?>


<script>
    $dbData = <?php echo json_encode($DBData) ?>

    $Months = <?php echo json_encode($dates) ?>

    var dates = ['2019_03', '2019_04', '2019_05', '2019_06', '2019_07', '2019_08', '2019_09', '2019_10', '2019_11', '2019_12', '2020_01', '2020_02', '2020_03', '2020_04', '2020_05', '2020_06', '2020_07', '2020_08', '2020_09', '2020_10', '2020_11', '2020_12', '2021_01', '2021_02', '2021_03'];


    for (var i = 0; i < $dbData.length; i++) {
        document.getElementById('country' + i).innerHTML = $dbData[i]['Name'];
        document.getElementById('price' + i).innerHTML = $dbData[i]['Data']['Date2019_03'];
        document.getElementById('month' + i).innerHTML = $Months[0];
    }

    function setMonth(num) {
        for (var i = 0; i < $dbData.length; i++) {
            document.getElementById("price" + i).innerHTML = $dbData[i]['Data']['Date' + dates[num]];
            document.getElementById("month" + i).innerHTML = $Months[num];
        }
    }

    var JSONData = <?php echo json_encode($dataJson) ?>;

    function LoadJSON() {
        document.getElementById("JSONCountryName").innerHTML = JSONData[0]['Name'];
        for (var i = 0; i < 25; i++) {
            document.getElementById("dataJSON" + i).innerHTML = JSONData[0]['Data']['Date' + dates[i]];
        }
    }

    var APIData = <?php echo json_encode($APIData); ?>;

    function LoadAPI() {
        document.getElementById("APICountryName").innerHTML = APIData[0]['Name'];
        for (var i = 0; i < 25; i++) {
            document.getElementById("dataAPI" + i).innerHTML = APIData[0]['Data']['Date' + dates[i]];
        }
    }

    var XMLData = <?php echo json_encode($XMLData); ?>;

    function LoadXML() {
        document.getElementById("XMLCountryName").innerHTML = XMLData['Name'];
        for (var i = 0; i < 25; i++) {
            document.getElementById("dataXML" + i).innerHTML = XMLData['Data']['Date' + dates[i]];
        }
    }

    document.getElementById('test').innerHTML = XMLData['Data']['Date2019_03'];
    document.getElementById('test2').innerHTML = $Months[1];
</script>