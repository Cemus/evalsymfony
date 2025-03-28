<?php

namespace App\Service;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;

class TaskService
{
    public function __construct(private readonly TaskRepository $taskRepository, private readonly EntityManagerInterface $em)
    {
    }

    public function addTask(Task $task): void
    {


    }

    public function getTasks(): Task
    {

    }
}