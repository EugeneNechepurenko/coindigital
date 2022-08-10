<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Attributes as OA;



#[OA\Schema(
	schema:"UserPersonal",
  properties: [
    'id' => new OA\Property(property: 'id', type: 'int'),
    'firstName' => new OA\Property(property: 'firstName', type: 'string'),
    'lastName' => new OA\Property(property: 'lastName', type: 'string'),
    'email' => new OA\Property(property: 'email', type: 'string'),
    'country' => new OA\Property(property: 'country', type: 'string'),
    'defaultLanguage' => new OA\Property(property: 'defaultLanguage', type: 'string'),
    'city' => new OA\Property(property: 'city', type: 'string'),
    'street' => new OA\Property(property: 'street', type: 'string'),
    'postalCode' => new OA\Property(property: 'postalCode', type: 'string'),
    'contactPhone' => new OA\Property(property: 'contactPhone', type: 'string'),
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
class UserPersonal extends Model
{
  /**
   * @var array
   */
  protected $fillable = [
	  'user_id',
    'firstName',
    'lastName',
    'email',
    'country',
    'defaultLanguage',
    'city',
    'street',
    'postalCode',
    'contactPhone',
  ];
	protected $table = 'users_personal';
}
