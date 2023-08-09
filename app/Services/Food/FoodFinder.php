<?php

namespace App\Services\Food;

use App\Models\Food;
use App\Repositories\FoodRepository;
use App\Services\AbstractFinder;
use Illuminate\Contracts\Pagination\Paginator;

class FoodFinder extends AbstractFinder
{
    public function __construct(private FoodRepository $foodRepository)
    {
        parent::__construct($foodRepository);
    }

    public function getPaginator(array $conditions): Paginator
    {
        return $this
            ->foodRepository
            ->fetchPaginator($conditions);
    }

    public function getOne(array $conditions): ?Food
    {
        return $this
            ->foodRepository
            ->fetchOne($conditions);
    }
}
