<?php

namespace App\Services\Tiktok;

use App\Exceptions\ServiceException;
use App\Models\Tiktok;
use App\Repositories\TiktokRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class TiktokCreator extends AbstractFinder
{
    public function __construct(private TiktokRepository $tiktokRepository)
    {
        parent::__construct($tiktokRepository);
    }

    public function save(array $params): Tiktok
    {
        try {
            return $this->tiktokRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
