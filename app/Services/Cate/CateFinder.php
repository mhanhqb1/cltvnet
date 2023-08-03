<?php

namespace App\Services\Cate;

use App\Models\Cate;
use App\Repositories\CateRepository;
use App\Services\AbstractFinder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

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

    public function getAll(array $conditions, bool $inputFormat = false): mixed
    {
        $cates = $this
            ->cateRepository
            ->fetchAll($conditions);
        if ($inputFormat) {
            $cates = $this->inputFormat($cates);
        }
        return $cates;
    }

    public function inputFormat(Collection $cates): array
    {
        $data = [];
        foreach ($cates as $cate) {
            $data[$cate->cate_id] = $cate->getName();
        }
        return $data;
    }
}
