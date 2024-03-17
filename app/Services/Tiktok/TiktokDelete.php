<?php

namespace App\Services\Tiktok;

use App\Exceptions\ServiceException;
use App\Models\Tiktok;
use App\Repositories\TiktokRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class TiktokDelete extends AbstractFinder
{
    public function __construct(private TiktokRepository $tiktokRepository)
    {
        parent::__construct($tiktokRepository);
    }

    public function destroy(Tiktok $tiktok): int
    {
        try {
            return $this->tiktokRepository->delete($tiktok->tiktok_id);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
