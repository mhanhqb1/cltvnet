<?php

namespace App\Contracts;

interface RepositoryInterface
{
    public function model();

    public function find(int $id);

    public function findOrFail($id);

    public function all();

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete($id);

    public function where();
}
