<?php

namespace App\Services;

use App\Http\Traits\CRUDService;
use App\Repositories\PlatformRepository;

/**
 * Class PlatformService
 *
 * @package App\Services
 */
class PlatformService
{
	use CRUDService;
	
    /** @var PlatformRepository */
    private PlatformRepository $repository;

    public function __construct(PlatformRepository $repository) {
        $this->repository = $repository;
    }
}
