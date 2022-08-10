<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Attributes as OA;



#[OA\Schema(
	schema:"UserPayout",
  properties: [
    'id' => new OA\Property(property: 'id', type: 'int'),
    'stores' => new OA\Property(property: 'stores', type: 'string'),
    'threshold' => new OA\Property(property: 'threshold', type: 'string'),
    'created_at' => new OA\Property(property: 'created_at', type: 'Carbon'),
    'updated_at' => new OA\Property(property: 'updated_at', type: 'Carbon'),
  ]
)]
/**
 * @property int         $id
 * @property string      $stores
 * @property string      $threshold
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 */
class UserPayout extends Model
{
  /**
   * @var array
   */
  protected $fillable = [
	  'user_id',
    'stores',
    'threshold',
  ];
	protected $table = 'users_payout';
}
