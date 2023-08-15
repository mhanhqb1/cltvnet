<?php

namespace App\Services\MenuCate;

use App\Exceptions\ServiceException;
use App\Models\MenuCate;
use App\Repositories\MenuCateRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class MenuCateCreator extends AbstractFinder
{
    public function __construct(private MenuCateRepository $menuCateRepository)
    {
        parent::__construct($menuCateRepository);
    }

    public function save(array $params): MenuCate
    {
        try {
            return $this->menuCateRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
