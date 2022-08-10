<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Attributes as OA;



#[OA\Schema(
	properties: [
		'id' => new OA\Property(property: 'id', type: 'int'),
		'name' => new OA\Property(property: 'payment_date', type: 'string'),
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
class Image extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
