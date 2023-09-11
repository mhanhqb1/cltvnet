<?php

namespace App\Services\FoodArticle;

use App\Exceptions\ServiceException;
use App\Repositories\FoodArticleRepository;
use App\Services\AbstractFinder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class FoodArticleFinder extends AbstractFinder
{
    public function __construct(private FoodArticleRepository $foodArticleRepository)
    {
        parent::__construct($foodArticleRepository);
    }

    public function getAll(array $conditions): Collection
    {
        try {
            return $this->foodArticleRepository->fetchAll($conditions);
        } catch (\Throwable $e) {
            $errorMessage = $e->getMessage();
            Log::error($errorMessage);
            throw new ServiceException($errorMessage);
        }
    }
}
