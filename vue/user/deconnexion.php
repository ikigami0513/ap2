<?php
    session_start();
    if(isset($_SESSION["user"])){ unset($_SESSION["user"]); }
    header("Location:/ap2/vue/index.php");
?>