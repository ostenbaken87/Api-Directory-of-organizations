<?php

namespace App\Repository\Activity;

interface ActivityRepositoryInterface
{
    public function getAll();
    public function getTree();
    public function getById(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
