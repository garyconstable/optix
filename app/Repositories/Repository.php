<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Repository.
 * Pass in Model for example users.
 *
 * @package App\Repositories
 */
class Repository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Repository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Access all records.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Model[]
     */
    public function all()
    {

        return $this->model->all();
    }

    /**
     * Create a new records, using passed params / data.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {

        return $this->model->create($data);
    }

    /**
     * Update a record found By ID.
     *
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    /**
     * Delete a Record Matched By ID.
     *
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Find a Record Matching ID.
     *
     * @param $id
     * @return Model
     */
    public function show($id)
    {
        return $this->model - findOrFail($id);
    }

    /**
     * Retrieve Model
     *
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the Model
     *
     * @param $model
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Find related Models.
     *
     * @param $relations
     * @return \Illuminate\Database\Eloquent\Builder|Model
     */
    public function with($relations)
    {
        return $this->model->with($relations);
    }

    /**
     * Find All Records with SQL In
     *
     * @param string $cols
     * @param array $values
     * @return mixed
     */
    public function findAllWhereIn($cols = "", $values = [])
    {
        return $this->model->whereIn($cols, $values)->get();
    }

    /**
     * Find Paginated Records with SQL In
     *
     * @param string $cols
     * @param array $values
     * @param int $limit
     * @param int $page
     * @return mixed
     */
    public function findSomeWhereIn($cols = "", $values = [], $limit = 5, $page = 1)
    {
        return $this->model->whereIn($cols, $values)->paginate($limit, ['*'], 'page', $page);
    }
}
