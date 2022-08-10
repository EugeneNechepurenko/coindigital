<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Attributes as OA;



#[OA\Schema(
	schema:"UserTds",
  properties: [
    'id' => new OA\Property(property: 'id', type: 'int'),
    'type' => new OA\Property(property: 'type', type: 'string'),
    'value' => new OA\Property(property: 'value', type: 'string'),
    'created_at' => new OA\Property(property: 'created_at', type: 'Carbon'),
    'updated_at' => new OA\Property(property: 'updated_at', type: 'Carbon'),
  ]
)]
/**
 * @property int         $id
 * @property string      $name
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 */
class UserTds extends Model
{
  /**
   * @var array
   */
  protected $fillable = [
	  'user_id',
    'type',
    'value',
  ];
	protected $table = 'users_tds';
}
