<?php


session_start();

var_dump($_SESSION['nome']);
var_dump($_SESSION['email']);


session_destroy();


echo 'Esperamos você de volta em breve!!!';