<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Attributes as OA;



#[OA\Schema(
	properties: [
		'id' => new OA\Property(property: 'id', type: 'int'),
		'payment_date' => new OA\Property(property: 'payment_date', type: 'string'),
		'email' => new OA\Property(property: 'email', type: 'string'),
		'account' => new OA\Property(property: 'account', type: 'string'),
		'tds' => new OA\Property(property: 'tds', type: 'string'),
		'tax' => new OA\Property(property: 'tax', type: 'string'),
		'total_amount' => new OA\Property(property: 'total_amount', type: 'string'),
		'reference' => new OA\Property(property: 'reference', type: 'string'),
		'created_at' => new OA\Property(property: 'created_at', type: 'Carbon'),
		'updated_at' => new OA\Property(property: 'updated_at', type: 'Carbon'),
	]
)]
/**
 * @property int         $id
 * @property string      $payment_date
 * @property string      $email
 * @property string      $account
 * @property string      $tds
 * @property string      $tax
 * @property string      $total_amount
 * @property string      $reference
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 */
class Payment extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'payment_date',
        'email',
        'account',
        'tds',
        'tax',
        'total_amount',
        'reference',
    ];
}
