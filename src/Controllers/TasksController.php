<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\TaskModel;
use MVC\Models\TaskRepository;

class TasksController extends Controller
{
    private $taskRepository;
    
    public function __construct()
    {
        $this->taskRepository = new TaskRepository();   
    }

    public function index()
    {
        $tasks = new TaskModel();
        $data['tasks'] = $this->taskRepository->getAll($tasks);
        $this->set($data);
        $this->render("index");
    }

    public function create()
    {
        extract($_POST);
        if (isset($_POST["title"]) || isset($_POST["description"])) 
        {
            $task= new TaskModel();
            $task->setTitle($title);
            $task->setDescription($description);
            $task->setCreated_at(date('Y-m-d H:i:s'));
            
            if ($this->taskRepository->add($task)) 
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    public function edit($id)
    {
        extract($_POST);
        $task= new TaskModel();
        $data["task"] = $this->taskRepository->get($id);

        if (isset($title)) {
            $task->setId($id);
            $task->setTitle($title);
            $task->setDescription($description);
            $task->setUpdated_at(date('Y-m-d H:i:s'));

            if ($this->taskRepository->update($task)) 
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->set($data);
        $this->render("edit");
    }

    public function delete($id)
    {
        extract($_POST);
        $task = new TaskModel();
        $task->setId($id);
        
        if ($this->taskRepository->delete($task)) 
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}

?>