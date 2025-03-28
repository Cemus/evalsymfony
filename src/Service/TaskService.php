<?php

namespace App\Service;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;

class TaskService
{
    public function __construct(private readonly TaskRepository $taskRepository, private readonly EntityManagerInterface $em)
    {
    }

    public function addTask(Task $task): bool
    {

        if ($task->getCreatedAt() > $task->getExpiredAt()) {
            return false;
        }

        $this->em->persist($task);
        $this->em->flush();

        return true;
    }

    public function getTasks(): array
    {
        return $this->taskRepository->findAll();
    }
}