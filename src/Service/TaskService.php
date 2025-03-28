<?php

namespace App\Service;

use App\Entity\Task;
use App\Repository\TaskRepository;

class TaskService
{
    public function __construct(private readonly TaskRepository $taskRepository)
    {
    }

    public function addTask(Task $task): void
    {

    }

    public function getTasks(): Task
    {

    }
}