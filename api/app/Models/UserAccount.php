<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Attributes as OA;



#[OA\Schema(
	schema:"UserAccount",
  properties: [
    'id' => new OA\Property(property: 'id', type: 'int'),
    'firstLogin' => new OA\Property(property: 'firstLogin', type: 'string'),
    'lastLogin' => new OA\Property(property: 'lastLogin', type: 'string'),
    'role' => new OA\Property(property: 'role', type: 'string'),
    'isBlocked' => new OA\Property(property: 'isBlocked', type: 'string'),
    'created_at' => new OA\Property(property: 'created_at', type: 'Carbon'),
    'updated_at' => new OA\Property(property: 'updated_at', type: 'Carbon'),
  ]
)]
/**
 * @property int         $id
 * @property string      $firstLogin
 * @property string      $lastLogin
 * @property string      $role
 * @property string      $isBlocked
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 */
class UserAccount extends Model
{
  /**
   * @var array
   */
  protected $fillable = [
	  'user_id',
    'firstLogin',
    'lastLogin',
    'role',
    'isBlocked',
  ];
  protected $table = 'users_account';
}
