<?php

namespace App\Services;

use App\Http\Traits\CRUDService;
use App\Repositories\StoreRepository;

/**
 * Class StoreService
 *
 * @package App\Services
 */
class StoreService
{
	use CRUDService;
	
    /** @var StoreRepository */
    private StoreRepository $repository;

    public function __construct(StoreRepository $repository) {
        $this->repository = $repository;
    }
}
