<?php

namespace App\Services\Nutrition;

use App\Models\Nutrition;
use App\Repositories\NutritionRepository;
use App\Services\AbstractFinder;
use Illuminate\Contracts\Pagination\Paginator;

class NutritionFinder extends AbstractFinder
{
    public function __construct(private NutritionRepository $nutritionRepository)
    {
        parent::__construct($nutritionRepository);
    }

    public function getPaginator(array $conditions): Paginator
    {
        return $this
            ->nutritionRepository
            ->fetchPaginator($conditions);
    }

    public function getOne(array $conditions): ?Nutrition
    {
        return $this
            ->nutritionRepository
            ->fetchOne($conditions);
    }
}
