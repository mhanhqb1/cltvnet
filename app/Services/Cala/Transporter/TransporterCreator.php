<?php

namespace App\Services\Cala\Transporter;

use App\Exceptions\ServiceException;
use App\Models\CalaTransporter;
use App\Repositories\Cala\TransporterRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class TransporterCreator extends AbstractFinder
{
    public function __construct(private TransporterRepository $transporterRepository)
    {
        parent::__construct($transporterRepository);
    }

    public function save(array $params): CalaTransporter
    {
        try {
            return $this->transporterRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
