<?php

namespace App\Repositories\Cala;

use App\Common\Definition\PaginationDefs;
use App\Models\CalaTransporter;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class TransporterRepository extends BaseRepository
{
    public function __construct(private CalaTransporter $transporter)
    {
        parent::__construct($transporter);
    }

    public function fetchPaginator(array $searchConditions, int $perPage = PaginationDefs::LIMIT_DEFAULT): Paginator
    {
        return $this
            ->transporter
            ->whereMultiConditions($searchConditions)
            ->orderBy('transporter_id', 'desc')
            ->paginate($perPage)
            ->appends($searchConditions);
    }

    public function fetchOne(array $searchConditions): ?CalaTransporter
    {
        return $this
            ->transporter
            ->whereMultiConditions($searchConditions)
            ->firstOrFail();
    }

    public function fetchAll(array $searchConditions): Collection
    {
        return $this
            ->transporter
            ->whereMultiConditions($searchConditions)
            ->get();
    }
}
