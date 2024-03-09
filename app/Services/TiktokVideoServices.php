<?php

namespace App\Services;

use App\Common\Definition\PaginationDefs;
use App\Models\TiktokVideo;
use App\Services\AbstractService;
use Illuminate\Http\Request;

class TiktokVideoServices extends AbstractService
{
    public function __construct() {
        parent::__construct();
    }

    public static function get_list(array $params = []) {
        $limit = $params['limit'] ?? PaginationDefs::LIMIT_DEFAULT;
        $data = TiktokVideo::limit($limit);
        $data = $data->orderBy('publish_at', 'desc')
            ->paginate($limit)
            ->withQueryString();
        return $data;
    }
}
