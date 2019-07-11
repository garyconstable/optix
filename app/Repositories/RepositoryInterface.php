<?php

namespace App\Repositories;

/**
 * Define Interface to ensure, methods are implemented.
 *
 * Interface RepositoryInterface
 * @package App\Repositories
 */
interface RepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id);
}
