<?php

namespace App\Services;

use App\Http\Traits\CRUDService;
use App\Repositories\ImageRepository;

/**
 * Class ImageService
 *
 * @package App\Services
 */
class ImageService
{
	use CRUDService;
	
    /** @var ImageRepository */
    private ImageRepository $repository;

    public function __construct(ImageRepository $repository) {
        $this->repository = $repository;
    }
}
