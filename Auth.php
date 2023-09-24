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
        $user = $data->getUser($name,$password,$email);
        if (!empty($user)) {
            $_SESSION['is_authorized'] = true;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $id = $user['id'];
            $_SESSION['id'] = $id;
            echo "Вы авторизованы";
        } else {
            echo "Неверные данные";
        }
    }
    
    public function UserUpdate($name,$password,$email,$id)
    {
        $data = new Database();
        if ($data->updateUser($name,$password,$email,$id)){
            $_SESSION['is_authorized'] = true;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $id;
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