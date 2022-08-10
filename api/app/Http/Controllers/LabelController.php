<?php

namespace App\Http\Controllers;

use App\Http\Requests\DefaultListRequest;
use App\Http\Requests\Label\CreateTrackRequest;
use App\Http\Resources\ListCollections\LabelListCollection;
use App\Http\Resources\LabelResource;
use App\Repositories\LabelRepository;
use App\Services\LabelService;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class LabelController extends Controller
{
	/** @var LabelService */
	private $labelService;
	/** @var LabelRepository */
	private $labelRepository;
	
	public function __construct(
		LabelService $labelService,
		LabelRepository $labelRepository
	) {
		$this->labelService = $labelService;
		$this->labelRepository = $labelRepository;
	}
	
	
	#[OA\Get(
		path: '/api/labels',
		tags: ['Label'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				properties: [
					'data' => new OA\Property(
						property: 'data',
						type: 'array',
						items: new OA\Items(
							ref: '#/components/schemas/Label'
						)
					),
				]
			))
		]
	)]
	public function list(DefaultListRequest $request)
	{
		$labels = $this->labelRepository->list($request->all());
		return response(new LabelListCollection($labels));
	}
	
	#[OA\Post(
		path: '/api/labels/create',
		requestBody: new OA\RequestBody(
			content:[
						new OA\MediaType(
							mediaType: 'multipart/form-data',
							schema: new OA\Schema(
										   properties: [
														   'name' => new OA\Property(property: 'name', type: 'string'),
														   'logo' => new OA\Property(property: 'logo', type: 'string'),
														   'platform' => new OA\Property(property: 'platform', type: 'string'),
														   'period_start' => new OA\Property(property: 'period_start', type: 'string'),
														   'period_end' => new OA\Property(property: 'period_end', type: 'string'),
													   ]
									   )
						)
					]
		),
		tags: ['Label'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Label',
			))
		]
	)]
	public function create(CreateTrackRequest $request)
	{
		$label = $this->labelService->create($request->validated());
		return response($label);
	}
	
	#[OA\Get(
		path: '/api/labels/{id}',
		tags: ['Label'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Label',
			))
		]
	)]
	public function get($id)
	{
		$label = $this->labelRepository->find($id);
		return response(new LabelResource($label));
	}
	
	#[OA\Post(
		path: '/api/labels/{id}/update',
		requestBody: new OA\RequestBody(
			content:[
						new OA\MediaType(
							mediaType: 'multipart/form-data',
							schema: new OA\Schema(
										   properties: [
														   'name' => new OA\Property(property: 'name', type: 'string'),
														   'logo' => new OA\Property(property: 'logo', type: 'string'),
														   'platform' => new OA\Property(property: 'platform', type: 'string'),
														   'period_start' => new OA\Property(property: 'period_start', type: 'string'),
														   'period_end' => new OA\Property(property: 'period_end', type: 'string'),
													   ]
									   )
						)
					]
		),
		tags: ['Label'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Label',
			))
		]
	)]
	public function update($id, Request $request)
	{
		$label = $this->labelRepository->find($id);
		$this->labelService->update($label, $request->all());
		$label = $this->labelRepository->find($id);
		return response(new LabelResource($label));
	}
	
	
	#[OA\Get(
		path: '/api/labels/{id}/delete',
		tags: ['Label'],
		responses: [
			new OA\Response(response: 200, description: 'OK'),
		]
	)]
	public function delete($id)
	{
		$label = $this->labelRepository->find($id);
		$this->labelRepository->deleteModel($label);
		return response('',200);
	}
}
