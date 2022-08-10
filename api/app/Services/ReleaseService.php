<?php

namespace App\Services;

use App\Http\Traits\CRUDService;
use App\Repositories\ReleaseRepository;

/**
 * Class ReleaseService
 *
 * @package App\Services
 */
class ReleaseService
{
	use CRUDService;
	
    /** @var ReleaseRepository */
    private ReleaseRepository $repository;

    public function __construct(ReleaseRepository $repository) {
        $this->repository = $repository;
    }
}
