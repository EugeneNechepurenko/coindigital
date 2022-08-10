<?php

namespace App\Services;

use App\Http\Traits\CRUDService;
use App\Repositories\LabelRepository;

/**
 * Class LabelService
 *
 * @package App\Services
 */
class LabelService
{
	use CRUDService;
	
    /** @var LabelRepository */
    private LabelRepository $repository;

    public function __construct(LabelRepository $repository) {
        $this->repository = $repository;
    }
}
