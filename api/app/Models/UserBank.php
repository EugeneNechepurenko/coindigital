<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Attributes as OA;



#[OA\Schema(
	schema:"UserBank",
  properties: [
    'id' => new OA\Property(property: 'id', type: 'int'),
    'accountName' => new OA\Property(property: 'accountName', type: 'string'),
    'accountId' => new OA\Property(property: 'accountId', type: 'string'),
    'isfcCode' => new OA\Property(property: 'isfcCode', type: 'string'),
    'sortCode' => new OA\Property(property: 'sortCode', type: 'string'),
    'swiftCode' => new OA\Property(property: 'swiftCode', type: 'string'),
    'ibanId' => new OA\Property(property: 'ibanId', type: 'string'),
    'countryOfBank' => new OA\Property(property: 'countryOfBank', type: 'string'),
    'bankName' => new OA\Property(property: 'bankName', type: 'string'),
    'created_at' => new OA\Property(property: 'created_at', type: 'Carbon'),
    'updated_at' => new OA\Property(property: 'updated_at', type: 'Carbon'),
  ]
)]
/**
 * @property int         $id
 * @property string      $accountName
 * @property string      $accountId
 * @property string      $isfcCode
 * @property string      $sortCode
 * @property string      $swiftCode
 * @property string      $ibanId
 * @property string      $countryOfBank
 * @property string      $bankName
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 */
class UserBank extends Model
{
  /**
   * @var array
   */
  protected $fillable = [
	  'user_id',
    'accountName',
    'accountId',
    'isfcCode',
    'sortCode',
    'swiftCode',
    'ibanId',
    'countryOfBank',
    'bankName',
  ];
	protected $table = 'users_bank';
}
