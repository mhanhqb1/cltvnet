<?php

namespace App\Services\Cala\Transporter;

use App\Models\CalaTransporter;
use App\Repositories\Cala\TransporterRepository;
use App\Services\AbstractFinder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class TransporterFinder extends AbstractFinder
{
    public function __construct(private TransporterRepository $transporterRepository)
    {
        parent::__construct($transporterRepository);
    }

    public function getPaginator(array $conditions): Paginator
    {
        return $this
            ->transporterRepository
            ->fetchPaginator($conditions);
    }

    public function getOne(array $conditions): ?CalaTransporter
    {
        return $this
            ->transporterRepository
            ->fetchOne($conditions);
    }

    public function getAll(array $conditions, bool $inputFormat = false): mixed
    {
        $transporters = $this
            ->transporterRepository
            ->fetchAll($conditions);
        if ($inputFormat) {
            $transporters = $this->inputFormat($transporters);
        }
        return $transporters;
    }

    public function inputFormat(Collection $transporters): array
    {
        $data = [];
        foreach ($transporters as $transporter) {
            $data[$transporter->transporter_id] = $transporter->name;
        }
        return $data;
    }
}
