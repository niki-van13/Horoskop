<?php

sesson_start();

require ("./server/listHoroscope.php");
if ($_SERVER["REQUEST_METHOD"]) {

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset ($_SESSION["zodiac"])) {

$_SESSION ["zodiac"] = serialize (listHoroscope($_POST["date"] ));
echo json_encode(true);
exit;
    } else {  
echo json_encode("ej post method");
exit;
  } 
  
  {else {
    echo json_encode();
    exit;
} catch (exeption $err) {
    error_log($err);
}



}


?>