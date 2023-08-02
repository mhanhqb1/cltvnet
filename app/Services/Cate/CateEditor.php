<?php

namespace App\Services\Cate;

use App\Exceptions\ServiceException;
use App\Models\Cate;
use App\Repositories\CateRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class CateEditor extends AbstractFinder
{
    public function __construct(private CateRepository $cateRepository)
    {
        parent::__construct($cateRepository);
    }

    public function update(Cate $cate, array $params)
    {
        try {
            return $this->cateRepository->update($cate->cate_id, $params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
