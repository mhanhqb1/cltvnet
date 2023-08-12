<?php

namespace App\Services\Food;

use App\Models\Food;
use App\Repositories\FoodRepository;
use App\Services\AbstractFinder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

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

    public function getAll(array $conditions, bool $inputFormat = false): Collection|array
    {
        $foods = $this
            ->foodRepository
            ->fetchAll($conditions);
        if ($inputFormat) {
            $foods = $this->inputFormat($foods);
        }
        return $foods;
    }

    public function inputFormat(Collection $foods): array
    {
        $data = [];
        foreach ($foods as $food) {
            $data[$food->food_id] = $food->name;
        }
        return $data;
    }
}
