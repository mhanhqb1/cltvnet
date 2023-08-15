<?php

namespace App\Services\Cala\Transporter;

use App\Exceptions\ServiceException;
use App\Models\CalaTransporter;
use App\Repositories\Cala\TransporterRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class TransporterDelete extends AbstractFinder
{
    public function __construct(private TransporterRepository $transporterRepository)
    {
        parent::__construct($transporterRepository);
    }

    public function destroy(CalaTransporter $transporter): int
    {
        try {
            return $this->transporterRepository->delete($transporter->transporter_id);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
