<?php

namespace App\Services\Tiktok;

use App\Models\Tiktok;
use App\Repositories\TiktokRepository;
use App\Services\AbstractFinder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class TiktokFinder extends AbstractFinder
{
    public function __construct(private TiktokRepository $tiktokRepository)
    {
        parent::__construct($tiktokRepository);
    }

    public function getPaginator(array $conditions): Paginator
    {
        return $this
            ->tiktokRepository
            ->fetchPaginator($conditions);
    }

    public function getOne(array $conditions): ?Tiktok
    {
        return $this
            ->tiktokRepository
            ->fetchOne($conditions);
    }

    public function getAll(array $conditions, bool $inputFormat = false): mixed
    {
        $tiktoks = $this
            ->tiktokRepository
            ->fetchAll($conditions);
        if ($inputFormat) {
            $tiktoks = $this->inputFormat($tiktoks);
        }
        return $tiktoks;
    }

    public function inputFormat(Collection $tiktoks): array
    {
        $data = [];
        foreach ($tiktoks as $tiktok) {
            $data[$tiktok->tiktok_id] = $tiktok->getName();
        }
        return $data;
    }
}
