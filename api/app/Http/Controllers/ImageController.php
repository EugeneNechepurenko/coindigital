<?php

namespace App\Http\Controllers;

use App\Http\Requests\DefaultListRequest;
use App\Http\Requests\Image\CreateImageRequest;
use App\Http\Resources\ListCollections\ImageListCollection;
use App\Http\Resources\ImageResource;
use App\Repositories\ImageRepository;
use App\Services\ImageService;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class ImageController extends Controller
{
	/** @var ImageService */
	private $imageService;
	/** @var ImageRepository */
	private $imageRepository;
	
	public function __construct(
		ImageService $imageService,
		ImageRepository $imageRepository
	) {
		$this->imageService = $imageService;
		$this->imageRepository = $imageRepository;
	}
	
	
	#[OA\Get(
		path: '/api/images',
		tags: ['Image'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				properties: [
					'data' => new OA\Property(
						property: 'data',
						type: 'array',
						items: new OA\Items(
							ref: '#/components/schemas/Image'
						)
					),
				]
			))
		]
	)]
	public function list(DefaultListRequest $request)
	{
		$images = $this->imageRepository->list($request->all());
		return response(new ImageListCollection($images));
	}
	
	#[OA\Post(
		path: '/api/images/create',
		requestBody: new OA\RequestBody(
			content:[
				new OA\MediaType(
					mediaType: 'multipart/form-data',
					schema: new OA\Schema(
						properties: [
							'name' => new OA\Property(property: 'name', type: 'string'),
						]
					)
				)
			]
		),
		tags: ['Image'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Image',
			))
		]
	)]
	public function create(CreateImageRequest $request)
	{
		$image = $this->imageService->create($request->validated());
		return response($image);
	}
	
	#[OA\Get(
		path: '/api/images/{id}',
		tags: ['Image'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Image',
			))
		]
	)]
	public function get($id)
	{
		$image = $this->imageRepository->find($id);
		return response(new ImageResource($image));
	}
	
	#[OA\Post(
		path: '/api/images/{id}/update',
		requestBody: new OA\RequestBody(
			content:[
				new OA\MediaType(
					mediaType: 'multipart/form-data',
					schema: new OA\Schema(
						properties: [
							'name' => new OA\Property(property: 'name', type: 'string'),
						]
					)
				)
			]
		),
		tags: ['Image'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Image',
			))
		]
	)]
	public function update($id, Request $request)
	{
		$image = $this->imageRepository->find($id);
		$this->imageService->update($image, $request->all());
		$image = $this->imageRepository->find($id);
		return response(new ImageResource($image));
	}
	
	
	#[OA\Get(
		path: '/api/images/{id}/delete',
		tags: ['Image'],
		responses: [
			new OA\Response(response: 200, description: 'OK'),
		]
	)]
	public function delete($id)
	{
		$image = $this->imageRepository->find($id);
		$this->imageRepository->deleteModel($image);
		return response('',200);
	}
}
