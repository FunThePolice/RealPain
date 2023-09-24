
<form action="" method="post">
    <label for="name">Username:</label>
    <input name="name" id="name" type="text"/><br/>
    <label for="email">Email:</label>
    <input name="email" id="email" type="text"/><br/>
    <label for="password">Password:</label>
    <input name="password" id="password" type="text"/><br/>
    <button type="submit">Submit</button>
</form>

<?php 
session_start();
require_once 'Database.php';
$test = new Database();
$test->addUser($_POST['name'],$_POST['password'],$_POST['email']);
