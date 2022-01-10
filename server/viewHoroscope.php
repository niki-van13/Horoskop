<?php 

session_start();


if(isset($_SERVER["REQUEST_METHOD"])) {

    if($_SERVER["REQUEST_METHOD"] === "GET") {

        if(isset($_SESSION["zodiac"])) {

            $zodiac = json_encode(unserialize($_SESSION["zodiac"]));
            echo $zodiac;
            exit;
            
        } else {
            echo json_encode(false);
            exit;
        } 
        
    } else {
        echo json_encode(false);
        exit;
    }

} else {
    echo json_encode("Error");
    exit;
}



        

    




?>