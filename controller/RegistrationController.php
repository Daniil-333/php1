<?php
require_once 'model/UserProvider.php';
require_once 'exceptions/LongLoginException.php';
session_start();

$error = null;
$pdo = require 'db.php';

if (isset($_POST['name'], $_POST['username'], $_POST['password'], $_POST['password_repeat'])) {
    ['name' => $name, 'username' => $username, 'password' => $password, 'password_repeat' => $password_repeat] = $_POST;
    $userProvider = new UserProvider($pdo);

    if (mb_strlen($username, 'UTF-8') > 30) {
//        $error = 'Длина логина не должна быть более 30 символов';
        throw new LongLoginException('Длина логина не должна быть более 30 символов');
    }

    if ($userProvider->getByUsername($username)) {
        $error = 'Логин уже существует';
    }elseif ($password !== $password_repeat) {
        $error = 'Пароли должны совпадать';
    }else {
        $user = new User($username);
        $user->setName($name);
        $userProvider->registerUser($user, $password);
        $user->setId($pdo->lastInsertId());

        $_SESSION['username'] = $user;
        header("Location: index.php");
        die();
    }

}

if(array_key_exists('username', $_SESSION)) {
    header("Location: index.php");
    die();
}

include "view/reg.php";