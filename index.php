
<form action="" method="post">
    <label for="name">Username:</label>
    <input name="name" id="name" type="text"/><br/>
    <label for="password">Password:</label>
    <input name="password" id="password" type="text"/><br/>
    <button type="submit">Submit</button>
</form>

<?php 

session_start();
require 'User.php';
$name = $_POST['name'];
$password = $_POST['password'];

$test = new UserAuth();
$test->UserValidate($name,$password);


