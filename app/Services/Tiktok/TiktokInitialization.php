<?php

namespace App\Services\Tiktok;

use App\Models\Tiktok;
use App\Services\AbstractService;

class TiktokInitialization extends AbstractService
{
    public function initTiktok(): object
    {
        $newTiktok = new Tiktok();

        return $newTiktok;
    }
}
