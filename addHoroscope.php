<?php 

session_start();
require ("HoroscopeList.php");

    if(isset($_SERVER["REQUEST_METHOD"])) {

        if($_SERVER["REQUEST_METHOD"] === "POST") {
            
            if(!isset($_SESSION["zodiac"])) {

                $_SESSION["zodiac"] = serialize(countHoroscope($_POST["date"]));  
                echo json_encode(true);
                exit;
               
            } else {
                echo json_encode(false."Sign saved");
                exit;
            }

        } else {
                echo json_encode("not Post method");
                exit;
            }
    } else {
        echo json_encode("Error");
        exit;

    }
        
 
?>