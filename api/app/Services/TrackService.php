<?php

namespace App\Services;

use App\Http\Traits\CRUDService;
use App\Repositories\TrackRepository;

/**
 * Class TrackService
 *
 * @package App\Services
 */
class TrackService
{
	use CRUDService;
	
    /** @var TrackRepository */
    private TrackRepository $repository;

    public function __construct(TrackRepository $repository) {
        $this->repository = $repository;
    }
}
