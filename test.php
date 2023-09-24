<?php 

session_start();

require 'Auth.php';
require_once 'Database.php';

$check = new UserAuth();
$check->AuthCheck();

var_dump($_SESSION);



