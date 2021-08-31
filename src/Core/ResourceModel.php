<?php

namespace MVC\Core;

use MVC\Config\Database;
use MVC\Core\ResourceModelInterface;

class ResourceModel implements ResourceModelInterface 
{
    private $table;
    private $id;
    private $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function get($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->id} = $id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    public function save($model)
    {
        $arrayModel = $this->model->getProperties($model);

        if ($model->getId() == null) {
            unset($arrayModel['id']);
            $col = implode(', ', array_keys($arrayModel));
            $val = implode(', :', array_keys($arrayModel));
            $sql = "INSERT INTO {$this->table} (" . $col . ") VALUE (:" . $val . ")";
        } else {
            unset($arrayModel['created_at']);
            $cols = [];

            foreach (array_keys($arrayModel) as $key =>$value) {
                if ($value != 'id') {
                    $cols[] = $value . ' = :' . $value;
                }
            }

            $col = implode(', ', $cols);
            $sql = "UPDATE {$this->table} SET " . $col . " WHERE id = :id";
        }

        $req = Database::getBdd()->prepare($sql);
        return $req->execute($arrayModel);
    }

    public function delete($model)
    {
        $sql = "DELETE FROM {$this->table} WHERE {$this->id} = {$model->getId()}";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute();
    }
}

?>