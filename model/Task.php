<?php

class Task {
    private string $description;
    private bool $isDone;
    private int $user_id;

    public function __construct(string $description, int $user_id)
    {
        $this->description = $description;
        $this->user_id = $user_id;
        $this->isDone = false;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isDone(): bool
    {
        return $this->isDone;
    }

    public function getUserId(): string
    {
        return $this->user_id;
    }
}