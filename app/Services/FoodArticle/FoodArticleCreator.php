<?php

namespace App\Services\FoodArticle;

use App\Exceptions\ServiceException;
use App\Models\FoodArticle;
use App\Repositories\FoodArticleRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class FoodArticleCreator extends AbstractFinder
{
    public function __construct(private FoodArticleRepository $foodArticleRepository)
    {
        parent::__construct($foodArticleRepository);
    }

    public function save(array $params): FoodArticle
    {
        try {
            return $this->foodArticleRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
