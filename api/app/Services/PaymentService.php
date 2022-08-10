<?php

namespace App\Services;

use App\Http\Traits\CRUDService;
use App\Repositories\PaymentRepository;

/**
 * Class PaymentService
 *
 * @package App\Services
 */
class PaymentService
{
	use CRUDService;
	
    /** @var PaymentRepository */
    private PaymentRepository $repository;

    public function __construct(PaymentRepository $repository) {
        $this->repository = $repository;
    }
}
