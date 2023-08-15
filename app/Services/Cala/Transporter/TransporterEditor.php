<?php

namespace App\Services\Cala\Transporter;

use App\Exceptions\ServiceException;
use App\Models\CalaTransporter;
use App\Repositories\Cala\TransporterRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class TransporterEditor extends AbstractFinder
{
    public function __construct(private TransporterRepository $transporterRepository)
    {
        parent::__construct($transporterRepository);
    }

    public function update(CalaTransporter $transporter, array $params)
    {
        try {
            return $this->transporterRepository->update($transporter->transporter_id, $params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
