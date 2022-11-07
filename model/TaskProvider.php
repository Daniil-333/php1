<?php
require_once 'model/Task.php';

class TaskProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addTask(Task $task): bool {
        $statement = $this->pdo->prepare('INSERT INTO tasks (description, user_id) VALUES (:description, :id)');
        return $statement->execute([
            'description' => $task->getDescription(),
            'id' => $task->getUserId()
        ]);
    }

    public function getUndoneList(): ?array
    {
        $result = [];
        $id = (int)$_SESSION['username']->getId();
        $statement = $this->pdo->prepare('SELECT * FROM tasks WHERE isDone = 0 AND user_id = (:id)');
        $statement->execute(['id' => $_SESSION['username']->getId()]);
        while ($statement && $task = $statement->fetch()) {
            $result[] = $task;
        }
        return $result ?: null;
    }

    public function markIsDone($id): bool
    {
        $statement = $this->pdo->prepare('UPDATE tasks SET isDone = :true WHERE id = :id');
        return $statement->execute(['true' => 1, 'id' => $id]);
    }
}