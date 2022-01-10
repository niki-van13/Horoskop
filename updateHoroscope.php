<?php 

    session_start();

    if(isset($_SERVER["REQUEST_METHOD"])) {

        if($_SERVER["REQUEST_METHOD"] === "POST") {
           
            if (isset($_POST["date"])) {

                if(isset($_SESSION["zodiac"])) {

                require("HoroscopeList.php");

                 $_SESSION["zodiac"] = serialize(countHoroscope($_POST["date"])); 

                echo json_encode(unserialize($_SESSION["zodiac"]));
                }

            } else {
                echo json_encode("No date sett");
            } 
        } else {
                echo json_encode("Not a POST method");
            }
    } else {
        echo json_encode("Error");

    }
        
  

?>