<?php

namespace App\Http\Controllers;

use App\Http\Requests\DefaultListRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Resources\ListCollections\UserListCollection;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class UserController extends Controller
{
	/** @var UserService */
	private $userService;
	/** @var UserRepository */
	private $userRepository;
	
	public function __construct(
		UserService $userService,
		UserRepository $userRepository
	) {
		$this->userService = $userService;
		$this->userRepository = $userRepository;
	}
	
	#[OA\Get(
		path: '/api/users',
		tags: ['User'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',),
			new OA\Response(response: 401, description: 'Not allowed'),
		]
	)]
	public function list(DefaultListRequest $request)
	{
		$users = $this->userRepository->list($request->all());
		return response(new UserListCollection($users));
	}
	
	#[OA\Post(
		path: '/api/users/create',
		tags: ['User'],
		responses: [
			new OA\Response(response: 200, description: 'AOK'),
			new OA\Response(response: 401, description: 'Not allowed'),
		]
	)]
	public function create(Request $request)
	{
		$user = $this->userService->create($request->all());
		return response($user);
	}
	
	#[OA\Get(
		path: '/api/users/{id}',
		tags: ['User'],
		responses: [
			new OA\Response(response: 200, description: 'AOK'),
			new OA\Response(response: 401, description: 'Not allowed'),
		]
	)]
	public function get($id)
	{
		$user = $this->userRepository->find($id);
		return response(new UserResource($user));
	}
	
	#[OA\Post(
		path: '/api/users/{id}/update',
		tags: ['User'],
		responses: [
			new OA\Response(response: 200, description: 'AOK'),
			new OA\Response(response: 401, description: 'Not allowed'),
		]
	)]
	public function update($id, Request $request)
	{
		$user = $this->userRepository->find($id);
		$this->userService->update($user, $request->all());
		$user = $this->userRepository->find($id);
		return response(new UserResource($user));
	}
	
	#[OA\Get(
		path: '/api/users/{id}/delete',
		tags: ['User'],
		responses: [
			new OA\Response(response: 200, description: 'AOK'),
			new OA\Response(response: 401, description: 'Not allowed'),
		]
	)]
	public function delete($id)
	{
		$user = $this->userRepository->find($id);
		$this->userRepository->deleteModel($user);
		return response('',200);
	}
}
