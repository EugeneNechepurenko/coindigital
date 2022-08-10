<?php

namespace App\Services;

use App\Http\Traits\CRUDService;
use App\Repositories\ArtistRepository;

/**
 * Class ArtistService
 *
 * @package App\Services
 */
class ArtistService
{
	use CRUDService;
	
    /** @var ArtistRepository */
    private ArtistRepository $repository;

    public function __construct(ArtistRepository $repository) {
        $this->repository = $repository;
    }
}
