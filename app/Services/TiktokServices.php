<?php

namespace App\Services;

use App\Common\Definition\PaginationDefs;
use App\Models\Tiktok;
use App\Services\AbstractService;

class TiktokServices extends AbstractService
{
    public function __construct() {
        parent::__construct();
    }

    public static function get_list(array $params = []) {
        $limit = $params['limit'] ?? PaginationDefs::LIMIT_DEFAULT;
        $data = Tiktok::limit($limit)
            ->orderBy('id', 'desc')
            ->get();
        return $data;
    }
}
