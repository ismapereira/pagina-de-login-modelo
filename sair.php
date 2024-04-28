<?php 

session_start();

session_destroy();

header('location: /ProjetosPHP/Login_AllStar_Sports/login.php');

?>