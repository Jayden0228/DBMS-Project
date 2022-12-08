<?php
    session_start();
    if(isset($_SESSION['material']))
    {
        echo "{$_SESSION['material']}";
    }
    if(isset($_SESSION['type']))
    {
        echo "{$_SESSION['type']}";
    }
?>