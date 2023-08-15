<?php

namespace App\Services\Cala\Transporter;

use App\Models\CalaTransporter;
use App\Services\AbstractService;

class TransporterInitialization extends AbstractService
{
    public function initTransporter(): object
    {
        $newTransporter = new CalaTransporter();

        return $newTransporter;
    }
}
