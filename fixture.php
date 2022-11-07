<?php
include "model/User.php";
include "model/UserProvider.php";
$pdo = require 'db.php';

$pdo->exec('CREATE TABLE IF NOT EXISTS users (
id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
name VARCHAR(150),
username VARCHAR(100) NOT NULL UNIQUE,
password VARCHAR(100) NOT NULL
)');

$pdo->exec('CREATE TABLE IF NOT EXISTS tasks (
id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
description VARCHAR(255),
isDone TINYINT DEFAULT 0,
user_id INTEGER NOT NULL
)');

$user = new User('admin');
$user->setName('Василий');

$userProvider = new UserProvider($pdo);
$userProvider->registerUser($user, '123');