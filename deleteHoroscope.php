<?php
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == 'DELETE') {
    if (isset($_SESSION["zodiac"])) {
        unset($_SESSION["zodiac"]);
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
  }
?>