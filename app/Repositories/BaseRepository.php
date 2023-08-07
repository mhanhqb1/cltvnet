<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    public function __construct(private Model $model)
    {
    }

    /**
     * @return Model
     * TODO:delelte
     * 何用？
     */
    public function model()
    {
        return $this->model;
    }

    /**
     * @param $id
     * @return Model|null
     */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function select(array $field)
    {
        return $this->model->select($field);
        $this->model->select($field);
        return $this;
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function update(int $id, array $data): Model
    {
        $model = $this->findOrFail($id);
        $model->update($data);

        return $model;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function deleteByConditions(array $conditions): int
    {
        return $this->model->whereMultiConditions($conditions)->delete();
    }

    /**
     * Add a basic where clause to the query.
     *
     * @param  mixed  $column
     * @param  mixed  $operator
     * @param  mixed  $value
     * @param  string  $logic
     * @return Model
     */
    public function where()
    {
        $args = func_get_args();
        $count = count($args);

        switch ($count) {
            case 1:
                if (is_array($args[0])) {
                    foreach ($args[0] as $key => $value) {
                        if (is_array($value)) {
                            $this->where($key, $value[0], $value[1]);
                        } else {
                            $this->model->where($key, '=', $value);
                        }
                    }
                }
                break;
            case 2:
                if (is_array($args[1])) {
                    $this->model->whereIn($args[0], $args[1]);
                } else {
                    $this->model->where($args[0], $args[1]);
                }
                break;
            case 3:
                $this->model->where($args[0], $args[1], $args[2]);
                break;
            case 4:
                if ($args[3] == 'or') {
                    $this->model->orWhere($args[0], $args[1], $args[2]);
                }
                break;
            default:
                break;
        }

        return $this->model;
    }

    public function paginate($perPage = 10)
    {
        return $this->model->paginate($perPage);
    }
}
