<?php
require_once 'model/User.php';
require_once 'model/TaskProvider.php';
session_start();

$pdo = require_once 'db.php';

if (!isset($tasks) && !isset($_SESSION['username'])) {
    header("Location: index.php");
    die();
}

$tasksProvider = new TaskProvider($pdo);
$tasks = $tasksProvider->getUndoneList();

if(isset($_POST['task']) && $_POST['task'] !== '') {
    $task = new Task(strip_tags($_POST['task']), (int)$_SESSION['username']->getId());
    $tasksProvider->addTask($task);
    header('Location: ?controller=tasks');
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'done') {
    $key = $_GET['key'];

    $tasksProvider->markIsDone($key);

    header('Location: ?controller=tasks');
    die();
}

include "view/tasks.php";

var_dump($_SESSION);