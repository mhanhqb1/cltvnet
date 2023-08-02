<?php

namespace App\Services\Cate;

use App\Models\Cate;
use App\Repositories\CateRepository;
use App\Services\AbstractFinder;
use Illuminate\Contracts\Pagination\Paginator;

class CateFinder extends AbstractFinder
{
    public function __construct(private CateRepository $cateRepository)
    {
        parent::__construct($cateRepository);
    }

    public function getPaginator(array $conditions): Paginator
    {
        return $this
            ->cateRepository
            ->fetchPaginator($conditions);
    }

    public function getOne(array $conditions): ?Cate
    {
        return $this
            ->cateRepository
            ->fetchOne($conditions);
    }
}
