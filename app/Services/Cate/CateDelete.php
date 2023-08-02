<?php

namespace App\Services\Cate;

use App\Exceptions\ServiceException;
use App\Models\Cate;
use App\Repositories\CateRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class CateDelete extends AbstractFinder
{
    public function __construct(private CateRepository $cateRepository)
    {
        parent::__construct($cateRepository);
    }

    public function destroy(Cate $cate): int
    {
        try {
            return $this->cateRepository->delete($cate->cate_id);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }

    }
}
