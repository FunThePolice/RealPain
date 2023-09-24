<?php 

session_start();

require 'Auth.php';


$check = new UserAuth();
$check->AuthCheck();

var_dump($_POST);

