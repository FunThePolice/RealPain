
<?php 
session_start();
require 'User.php';
$test = new UserAuth();
$test->UserLogOut();
echo 'You are logged out';

