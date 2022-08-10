<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;
use OpenApi\Attributes as OA;
use \Illuminate\Database\Eloquent\Relations\HasOne;


#[OA\Schema(
	properties: [
		'name' => new OA\Property(property: 'name', type: 'string'),
		'email' => new OA\Property(property: 'email', type: 'string'),
		'account' => new OA\Property(property: 'account',type: 'array',items: new OA\Items(ref: '#/components/schemas/UserAccount')),
		'bank' => new OA\Property(property: 'bank',type: 'array',items: new OA\Items(ref: '#/components/schemas/UserBank')),
		'company' => new OA\Property(property: 'company',type: 'array',items: new OA\Items(ref: '#/components/schemas/UserCompany')),
		'meta' => new OA\Property(property: 'meta',type: 'array',items: new OA\Items(ref: '#/components/schemas/UserMeta')),
		'payout' => new OA\Property(property: 'payout',type: 'array',items: new OA\Items(ref: '#/components/schemas/UserPayout')),
		'personal' => new OA\Property(property: 'personal',type: 'array',items: new OA\Items(ref: '#/components/schemas/UserPersonal')),
		'tds' => new OA\Property(property: 'tds',type: 'array',items: new OA\Items(ref: '#/components/schemas/UserTds')),
	]
)]
class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     *
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'account_id',
        'bank_id',
        'company_id',
        'meta_id',
        'payout_id',
        'personal_id',
        'tds_id',
    ];

    /**
     *
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
	
	public function account(): HasOne
	{
		return $this->hasOne(UserAccount::class);
	}
	
	public function bank(): HasOne
	{
		return $this->hasOne(UserBank::class);
	}
	
	public function company(): HasOne
	{
		return $this->hasOne(UserCompany::class);
	}
	
	public function meta(): HasOne
	{
		return $this->hasOne(UserMeta::class);
	}
	
	public function payout(): HasOne
	{
		return $this->hasOne(UserPayout::class);
	}
	
	public function personal(): HasOne
	{
		return $this->hasOne(UserPersonal::class);
	}
	
	public function tds(): HasOne
	{
		return $this->hasOne(UserTds::class);
	}
}
