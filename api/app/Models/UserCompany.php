<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Attributes as OA;



#[OA\Schema(
	schema:"UserCompany",
  properties: [
    'id' => new OA\Property(property: 'id', type: 'int'),
    'company' => new OA\Property(property: 'company', type: 'string'),
    'companyName' => new OA\Property(property: 'companyName', type: 'string'),
    'fiskalId' => new OA\Property(property: 'fiskalId', type: 'string'),
    'countryPhone' => new OA\Property(property: 'countryPhone', type: 'string'),
    'contactPhone' => new OA\Property(property: 'contactPhone', type: 'string'),
    'panId' => new OA\Property(property: 'panId', type: 'string'),
    'gstId' => new OA\Property(property: 'gstId', type: 'string'),
    'created_at' => new OA\Property(property: 'created_at', type: 'Carbon'),
    'updated_at' => new OA\Property(property: 'updated_at', type: 'Carbon'),
  ]
)]
/**
 * @property int         $id
 * @property string      $company
 * @property string      $companyName
 * @property string      $fiskalId
 * @property string      $countryPhone
 * @property string      $contactPhone
 * @property string      $panId
 * @property string      $gstId
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 */
class UserCompany extends Model
{
  /**
   * @var array
   */
  protected $fillable = [
	  'user_id',
    'company',
    'companyName',
    'fiskalId',
    'countryPhone',
    'contactPhone',
    'panId',
    'gstId',
  ];
	protected $table = 'users_company';
}
