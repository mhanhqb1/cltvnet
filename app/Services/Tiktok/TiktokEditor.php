<?php

namespace App\Services\Tiktok;

use App\Exceptions\ServiceException;
use App\Models\Tiktok;
use App\Repositories\TiktokRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class TiktokEditor extends AbstractFinder
{
    public function __construct(private TiktokRepository $tiktokRepository)
    {
        parent::__construct($tiktokRepository);
    }

    public function update(Tiktok $tiktok, array $params)
    {
        try {
            return $this->tiktokRepository->update($tiktok->id, $params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
