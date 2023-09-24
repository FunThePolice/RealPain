
<?php 
session_start();
require 'Auth.php';
$test = new UserAuth();
$test->UserLogOut();
echo 'You are logged out';

