<?php

namespace App\Repositories;

use App\Models\FoodArticle;
use Illuminate\Database\Eloquent\Collection;

class FoodArticleRepository extends BaseRepository
{
    public function __construct(private FoodArticle $foodArticle)
    {
        parent::__construct($foodArticle);
    }

    public function fetchAll(array $searchConditions): Collection
    {
        return $this
            ->foodArticle
            ->whereMultiConditions($searchConditions)
            ->get();
    }
}
