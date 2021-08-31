<?php

namespace MVC\Models;

class TaskRepository
{
    private $taskResourceModel;

    public function __construct()
    {
        $this->taskResourceModel = new TaskResourceModel();
    }

    public function get($id)
    {
        return $this->taskResourceModel->get($id);
    }

    public function getAll()
    {
        return $this->taskResourceModel->getAll();
    }

    public function add($model)
    {
        return $this->taskResourceModel->save($model);
    }

    public function update($model)
    {
        return $this->taskResourceModel->save($model);
    }

    public function delete($model)
    {
        return $this->taskResourceModel->delete($model);
    }
}

?>