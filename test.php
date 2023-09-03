<?php 

session_start();

if (isset($_SESSION['is_authorized']) && $_SESSION['is_authorized'] === true){
    echo 'Вы внутнри';
 } else {
    echo 'Ошибка';
    }
