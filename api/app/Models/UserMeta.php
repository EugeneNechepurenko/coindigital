<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Attributes as OA;



#[OA\Schema(
	schema:"UserMeta",
  properties: [
    'id' => new OA\Property(property: 'id', type: 'int'),
    'monthlyRevenue' => new OA\Property(property: 'monthlyRevenue', type: 'string'),
    'totalSongsCount' => new OA\Property(property: 'totalSongsCount', type: 'string'),
    'totalRevenue' => new OA\Property(property: 'totalRevenue', type: 'string'),
    'created_at' => new OA\Property(property: 'created_at', type: 'Carbon'),
    'updated_at' => new OA\Property(property: 'updated_at', type: 'Carbon'),
  ]
)]
/**
 * @property int         $id
 * @property string      $monthlyRevenue
 * @property string      $totalSongsCount
 * @property string      $totalRevenue
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 */
class UserMeta extends Model
{
  /**
   * @var array
   */
  protected $fillable = [
	  'user_id',
    'monthlyRevenue',
    'totalSongsCount',
    'totalRevenue',
  ];
	protected $table = 'users_meta';
}
