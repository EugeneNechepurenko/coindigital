<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OpenApi\Attributes as OA;

#[OA\Schema(
	properties: [
		'id' => new OA\Property(property: 'id', type: 'int'),
		'name' => new OA\Property(property: 'name', type: 'string'),
		'artists' => new OA\Property(property: 'artists',type: 'array',items: new OA\Items(ref: '#/components/schemas/Artist')),
		'created_at' => new OA\Property(property: 'created_at', type: 'Carbon'),
		'updated_at' => new OA\Property(property: 'updated_at', type: 'Carbon'),
	]
)]
/**
 * @property int         $id
 * @property string      $name
 * @property Artist      $artists
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 */
class Label extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];
	
	public function artists(): HasMany
	{
		return $this->hasMany(Artist::class);
	}
}