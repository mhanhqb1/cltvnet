<?php

namespace App\Services\Cate;

use App\Exceptions\ServiceException;
use App\Models\Cate;
use App\Repositories\CateRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class CateCreator extends AbstractFinder
{
    public function __construct(private CateRepository $cateRepository)
    {
        parent::__construct($cateRepository);
    }

    public function save(array $params): Cate
    {
        try {
            return $this->cateRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
