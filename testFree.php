<?php 
session_start();
echo 'Без авторизации';
require_once 'config.php';
require_once 'Database.php';

$test = new Database();
$users = $test->all('users');
echo '<pre>';
            var_dump($users);
            ECHO '</pre>';
            
foreach ($users as $user){
    echo $user['name'];
}

$check = new dbConnect();
$check->dbCheck($db);




