<?php

namespace App\Services;

use App\Common\Definition\PaginationDefs;
use App\Contracts\RepositoryInterface;

abstract class AbstractFinder extends AbstractService
{
    /** @var RepositoryInterface */
    protected $repository;

    /** @var \Illuminate\Database\Eloquent\Model */
    protected $model;

    /**
     * @var \Illuminate\Pagination\AbstractPaginator | null
     */
    protected $paginator = null;

    public function __construct(RepositoryInterface $repository)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->model = $this->repository->model();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function model()
    {
        return $this->model;
    }

    /**
     * @return int
     */
    public function total()
    {
        return $this->model()->count();
    }

    /**
     * @param  array  $conditions
     * @return $this
     */
    public function applyConditions(array $conditions)
    {
        $this->model = $this->repository->where($conditions);

        return $this;
    }

    /**
     * @param  int  $perPage
     * @return $this
     */
    public function applyPagination($perPage = PaginationDefs::LIMIT_DEFAULT)
    {
        $this->paginator = $this->model()->paginate($perPage);

        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection|mixed
     */
    public function fetch()
    {
        if (! empty($this->paginator)) {
            return $this->paginator->getCollection();
        }

        return $this->model()->get();
    }

    /**
     * @return \Illuminate\Pagination\AbstractPaginator
     */
    public function paginator()
    {
        return $this->paginator;
    }

    public function getAttributeNames()
    {
        return $this->model->getAttributeNames();
    }

    public function getAttributeInputTypes()
    {
        return $this->model->getAttributeInputTypes();
    }
}
