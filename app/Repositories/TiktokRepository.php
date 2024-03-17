<?php

namespace App\Repositories;

use App\Common\Definition\PaginationDefs;
use App\Models\Tiktok;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class TiktokRepository extends BaseRepository
{
    public function __construct(private Tiktok $tiktok)
    {
        parent::__construct($tiktok);
    }

    public function fetchPaginator(array $searchConditions, int $perPage = PaginationDefs::LIMIT_DEFAULT): Paginator
    {
        return $this
            ->tiktok
            ->whereMultiConditions($searchConditions)
            ->orderBy('id', 'desc')
            ->paginate($perPage)
            ->appends($searchConditions);
    }

    public function fetchOne(array $searchConditions): ?Tiktok
    {
        return $this
            ->tiktok
            ->whereMultiConditions($searchConditions)
            ->firstOrFail();
    }

    public function fetchAll(array $searchConditions): Collection
    {
        return $this
            ->tiktok
            ->whereMultiConditions($searchConditions)
            ->get();
    }
}
