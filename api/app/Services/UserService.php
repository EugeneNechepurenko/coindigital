<?php

namespace App\Services;

use App\Http\Traits\CRUDService;
use App\Repositories\UserRepository;

/**
 * Class UserService
 *
 * @package App\Services
 */
class UserService
{
	use CRUDService;
	
    /** @var UserRepository */
    private UserRepository $repository;

    public function __construct(UserRepository $repository) {
        $this->repository = $repository;
    }
}
