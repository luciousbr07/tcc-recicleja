<?php
    session_start();
    session_destroy();

    header("Location: tcc-index/index.php");
?>