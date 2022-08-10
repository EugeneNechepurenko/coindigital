<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserAccount;
use App\Models\UserBank;
use App\Models\UserCompany;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 *
 * @package App\Repositories
 *
 */
class UserRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     *
     * @param User $user
     * @internal param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @param array $data
     *
     * @return User|false
     */
    public function create(array $data)
    {
        $model = $this->model->newInstance();
        $model->name ??= $data['name'] ?? null;
        $model->email ??= $data['email'] ?? null;
        $model->password = Hash::make('password');
//        $model->password = Hash::make($this->generateRandomString());
	
        try {
            $model->save();
			if(isset($data['account'])){
				try {
					$model->account()->save(new UserAccount($data['account']));
				} catch (QueryException $e) {
					throw new \Exception($e->getMessage());
				}
			}
			if(isset($data['bank'])){
				try {
					$model->bank()->save(new UserBank($data['bank']));
				} catch (QueryException $e) {
					throw new \Exception($e->getMessage());
				}
			}
			if(isset($data['company'])){
				for($i=0;$i< sizeof($data['company']);$i++){
					try {
						$model->company()->save(new UserCompany($data['company']));
					} catch (QueryException $e) {
						throw new \Exception($e->getMessage());
					}
				}
			}
			if(isset($data['meta'])){
				for($i=0;$i< sizeof($data['meta']);$i++){
					try {
						$model->meta()->attach($data['meta'][$i]);
					} catch (QueryException $e) {
						throw new \Exception($e->getMessage());
					}
				}
			}
			if(isset($data['payout'])){
				for($i=0;$i< sizeof($data['payout']);$i++){
					try {
						$model->payout()->attach($data['payout'][$i]);
					} catch (QueryException $e) {
						throw new \Exception($e->getMessage());
					}
				}
			}
			if(isset($data['personal'])){
				for($i=0;$i< sizeof($data['personal']);$i++){
					try {
						$model->personal()->attach($data['personal'][$i]);
					} catch (QueryException $e) {
						throw new \Exception($e->getMessage());
					}
				}
			}
			if(isset($data['tds'])){
				for($i=0;$i< sizeof($data['tds']);$i++){
					try {
						$model->tds()->attach($data['tds'][$i]);
					} catch (QueryException $e) {
						throw new \Exception($e->getMessage());
					}
				}
			}
        } catch (QueryException $e) {
            return var_dump($e->getMessage());
        }
        return $model;
    }
	
	public function update($id, array $data)
	{
		/* @var $model User */
		$model = $this->find($id);
		$model->name = isset($data['name']) ? $data['name'] : $model->name;
		$model->email = isset($data['email']) ? $data['email'] : $model->avatar;
		$model->password = isset($data['password']) ? Hash::make($data['password']) : $model->password;
		$model->update($data);
		if(isset($data['licenses']) && is_array($data['licenses'])){
			$model->licenses()->detach();
			for($i=0;$i< sizeof($data['licenses']);$i++){
				try {
					$model->licenses()->attach($data['licenses'][$i]);
				} catch (QueryException $e) {
					throw new \Exception($e->getMessage());
				}
			}
		}
		if(isset($data['account'])){
			try {
				$rel_model = $this->findBy('user_id',$model->id);
				if($rel_model) {
					$rel_model->update($data['account']);
				}
			} catch (QueryException $e) {
				throw new \Exception($e->getMessage());
			}
		}
		if(isset($data['bank'])){
			try {
				$rel_model = $this->findBy('user_id',$model->id);
				if($rel_model) {
					$rel_model->update($data['bank']);
				}
			} catch (QueryException $e) {
				throw new \Exception($e->getMessage());
			}
		}
		if(isset($data['company'])){
			try {
				$rel_model = $this->findBy('user_id',$model->id);
				if($rel_model) {
					$rel_model->update($data['company']);
				}
			} catch (QueryException $e) {
				throw new \Exception($e->getMessage());
			}
		}
		if(isset($data['meta'])){
			try {
				$rel_model = $this->findBy('user_id',$model->id);
				if($rel_model) {
					$rel_model->update($data['meta']);
				}
			} catch (QueryException $e) {
				throw new \Exception($e->getMessage());
			}
		}
		if(isset($data['payout'])){
			try {
				$rel_model = $this->findBy('user_id',$model->id);
				if($rel_model) {
					$rel_model->update($data['payout']);
				}
			} catch (QueryException $e) {
				throw new \Exception($e->getMessage());
			}
		}
		if(isset($data['personal'])){
			try {
				$rel_model = $this->findBy('user_id',$model->id);
				if($rel_model) {
					$rel_model->update($data['personal']);
				}
			} catch (QueryException $e) {
				throw new \Exception($e->getMessage());
			}
		}
		if(isset($data['tds'])){
			try {
				$rel_model = $this->findBy('user_id',$model->id);
				if($rel_model) {
					$rel_model->update($data['tds']);
				}
			} catch (QueryException $e) {
				throw new \Exception($e->getMessage());
			}
		}
		
		return $model;
	}

    /**
     * @inheritdoc
     */
    public function list(array $params = [], array $relationships = []): LengthAwarePaginator
    {
        $query = $this->newQuery();
        $query->select([
            'users.id',
            'users.name',
            'users.email',
            'users.password',
        ]);
		$relationships[] = 'account';
		$relationships[] = 'bank';
		$relationships[] = 'company';
		$relationships[] = 'meta';
		$relationships[] = 'payout';
		$relationships[] = 'personal';
		$relationships[] = 'tds';
        return $this->processList($query, $params, $relationships);
    }
	
	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}
