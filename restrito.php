<?php
    session_start();

    if((!isset($_SESSION["nome"])) and (!isset($_SESSION["email"]))){
            echo "<script language=javascript> 
            alert('ALERTA, VOCÊ NÃO TEM PERMISSÃO!!');
            location.href='../tcc-index/index.php';
        </script>";
    }
?>