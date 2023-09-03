<?php 

class User 
{
    public $name;
    public $password;

    public function __construct($name,$password)
    {
        $this->name = $name;
        $this->password = $password;
    }
}
class UserAuth extends User {

    public function __construct()
    {
    }

    public function UserValidate($name,$password)
    {
        if ($password === '9999'){
            $_SESSION['is_authorized'] = true;
            $_SESSION['name'] = $name;

        }
    }

    public function UserLogOut()
    {
        if ($_SESSION['is_authorized'] = true){
            session_destroy();
        } else {
            echo 'Вы уже не авторизованы';
        }
    }
}