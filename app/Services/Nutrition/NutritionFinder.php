<?php

namespace App\Services\Nutrition;

use App\Models\Nutrition;
use App\Repositories\NutritionRepository;
use App\Services\AbstractFinder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

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

    public function getAll(array $conditions, bool $inputFormat = false): mixed
    {
        $nutritions = $this
            ->nutritionRepository
            ->fetchAll($conditions);
        if ($inputFormat) {
            $nutritions = $this->inputFormat($nutritions);
        }
        return $nutritions;
    }

    public function inputFormat(Collection $nutritions): array
    {
        $data = [];
        foreach ($nutritions as $nutrition) {
            $data[$nutrition->nutrition_id] = $nutrition->getName();
        }
        return $data;
    }
}
