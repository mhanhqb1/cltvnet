<?php

namespace App\Repositories;

use App\Models\FoodVideo;
use Illuminate\Database\Eloquent\Collection;

class FoodVideoRepository extends BaseRepository
{
    public function __construct(private FoodVideo $foodVideo)
    {
        parent::__construct($foodVideo);
    }

    public function fetchAll(array $searchConditions): Collection
    {
        return $this
            ->foodVideo
            ->whereMultiConditions($searchConditions)
            ->get();
    }
}
