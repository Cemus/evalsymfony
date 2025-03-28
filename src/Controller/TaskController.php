<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Service\TaskService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class TaskController extends AbstractController
{
    public function __construct(private readonly TaskService $taskService)
    {
    }

    #[Route('/', name: 'app_tasks')]
    public function getTasks()
    {
        $tasks = $this->taskService->getTasks();

        if (count($tasks) == 0) {
            $this->addFlash('warning', 'Aucune tâche trouvée..');
        }

        return $this->render('task/get.html.twig', [
            'tasks' => $tasks
        ]);
    }

    #[Route('/add', name: 'app_task_new')]
    public function addTask(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($this->taskService->addTask($task) == false) {
                $this->addFlash('danger', 'Erreur lors de l\'ajout de la tâche');
            }
            ;
        }


        return $this->render('task/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
