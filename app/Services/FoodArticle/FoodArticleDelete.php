<?php

namespace App\Services\FoodArticle;

use App\Exceptions\ServiceException;
use App\Repositories\FoodArticleRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class FoodArticleDelete extends AbstractFinder
{
    public function __construct(private FoodArticleRepository $foodArticleRepository)
    {
        parent::__construct($foodArticleRepository);
    }

    public function deleteByConditions(array $conditions): int
    {
        try {
            return $this->foodArticleRepository->deleteByConditions($conditions);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
