<?php

namespace App\Services\FoodVideo;

use App\Exceptions\ServiceException;
use App\Models\FoodVideo;
use App\Repositories\FoodVideoRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class FoodVideoCreator extends AbstractFinder
{
    public function __construct(private FoodVideoRepository $foodVideoRepository)
    {
        parent::__construct($foodVideoRepository);
    }

    public function save(array $params): FoodVideo
    {
        try {
            return $this->foodVideoRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
