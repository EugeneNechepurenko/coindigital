<?php

namespace App\Repositories;

use App\Models\Payment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\QueryException;

/**
 * Class PaymentRepository
 *
 * @package App\Repositories
 *
 */
class PaymentRepository extends BaseRepository
{
    /**
     * PaymentRepository constructor.
     *
     * @param Payment $payment
     * @internal param Payment $payment
     */
    public function __construct(Payment $payment)
    {
        $this->model = $payment;
    }

    /**
     * @param array $data
     *
     * @return Payment|false
     */
    public function create(array $data)
    {
        $model = $this->model->newInstance();
        $model->payment_date ??= $data['payment_date'] ?? null;
        $model->email ??= $data['email'] ?? null;
        $model->account ??= $data['account'] ?? null;
        $model->tds ??= $data['tds'] ?? null;
        $model->tax ??= $data['tax'] ?? null;
        $model->total_amount ??= $data['total_amount'] ?? null;
        $model->reference ??= $data['reference'] ?? null;

        try {
            $model->save();
        } catch (QueryException $e) {
			throw new \Exception($e->getMessage());
        }
        return $model;
    }

    /**
     * @inheritdoc
     */
    public function list(array $params = [], array $relationships = []): LengthAwarePaginator
    {
        $query = $this->newQuery();
        $query->select([
            'payments.id',
            'payments.payment_date',
            'payments.email',
            'payments.account',
            'payments.tds',
            'payments.tax',
            'payments.total_amount',
            'payments.reference',
        ]);
        return $this->processList($query, $params, $relationships);
    }
}
