<?php 

require 'Database.php';
class Auth 
{
    public $name;
    public $email;
    public $password;

    public function __construct($name,$password,$email)
    {
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
    }
}
class UserAuth extends Auth  {

    public function __construct()
    {
    }

    public function UserValidate($name,$password,$email)
    {
        $data = new Database();
        if (!empty($data->getUser($name,$password,$email))) {
            $_SESSION['is_authorized'] = true;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            echo "Вы авторизованы";
        } else {
            echo "Неверные данные";
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

    public function AuthCheck()
    {
        if (isset($_SESSION['is_authorized']) && $_SESSION['is_authorized'] === true){
            echo 'Вы внутнри';
        } else {
            echo 'Ошибка';
            }
    }
}