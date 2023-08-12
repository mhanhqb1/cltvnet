<?php

namespace App\Services\FoodVideo;

use App\Exceptions\ServiceException;
use App\Repositories\FoodVideoRepository;
use App\Services\AbstractFinder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class FoodVideoFinder extends AbstractFinder
{
    public function __construct(private FoodVideoRepository $foodVideoRepository)
    {
        parent::__construct($foodVideoRepository);
    }

    public function getAll(array $conditions): Collection
    {
        try {
            return $this->foodVideoRepository->fetchAll($conditions);
        } catch (\Throwable $e) {
            $errorMessage = $e->getMessage();
            Log::error($errorMessage);
            throw new ServiceException($errorMessage);
        }
    }
}
