<?php

namespace App\Http\Controllers;

use App\Http\Requests\DefaultListRequest;
use App\Http\Resources\ListCollections\Reports\royaltyReportListCollection;
use App\Http\Resources\ListCollections\Reports\totalSongsListCollection;
use App\Http\Resources\ListCollections\StoreSalesListCollection;
use App\Http\Resources\ListCollections\TrackSalesListCollection;
use App\Http\Resources\Reports\AmountPayableResource;
use App\Http\Resources\Reports\monthlyExpensesResource;
use App\Http\Resources\Reports\tdsAmountResource;
use App\Http\Resources\Reports\TopSongsResource;
use App\Http\Resources\Reports\totalNetProfitResource;
use App\Models\Store;
use App\Models\Track;
use App\Repositories\PlatformRepository;
use App\Repositories\StoreRepository;
use App\Repositories\TrackRepository;
use App\Services\PlatformService;
use App\Services\StoreService;
use App\Services\TrackService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use \Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class ReportsController extends Controller
{
	/** @var PlatformService */
	private $platformService;
	/** @var PlatformRepository */
	private $platformRepository;
	
	/** @var TrackService */
	private $trackService;
	/** @var TrackRepository */
	private $trackRepository;
	
	/** @var StoreService */
	private $storeService;
	/** @var StoreRepository */
	private $storeRepository;
	
	public function __construct(
		PlatformService $platformService,
		PlatformRepository $platformRepository,
		TrackService $trackService,
		TrackRepository $trackRepository,
		StoreService $storeService,
		StoreRepository $storeRepository
	) {
		$this->trackService = $trackService;
		$this->trackRepository = $trackRepository;
		$this->storeService = $storeService;
		$this->storeRepository = $storeRepository;
	}
	
	/**
	 * @param DefaultListRequest $request
	 * @return Response|Application|ResponseFactory
	 */
	public function chanelRevenue(DefaultListRequest $request): Response|Application|ResponseFactory
	{
		$stores = $this->storeRepository->list($request->all());
		return response(new StoreSalesListCollection($stores));
	}
	
	/**
	 * @param DefaultListRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function chanelRevenueTotal(DefaultListRequest $request): JsonResponse
	{
		$stores = $this->storeRepository->list($request->all());
		$unit_sold = 0;
		$gross = 0;
		$net = 0;
		foreach ($stores as $store){
			/* @var $store Store */
			$unit_sold += $store->totalSold();
			$gross += $store->gross;
			$net += $store->net;
		}

		return response()->json([
			'unit_sold'=>$unit_sold,
			'gross'=>$gross,
			'net'=>$net,
		]);
	}
	
	/**
	 * @param DefaultListRequest $request
	 * @return Response|Application|ResponseFactory
	 */
	public function topTracks(DefaultListRequest $request): Response|Application|ResponseFactory
	{
		$tracks = $this->trackRepository->list($request->all());
		return response(new TrackSalesListCollection($tracks));
	}
	
	/**
	 * @param DefaultListRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function topTracksTotal(DefaultListRequest $request): JsonResponse
	{
		$tracks = $this->trackRepository->list($request->all());
		$unit_sold = 0;
		$gross = 0;
		$net = 0;
		foreach ($tracks as $track){
			/* @var $track Track */
			$unit_sold += $track->sold;
//			$gross += $track->gross;
//			$net += $track->net;
		}
		
		return response()->json([
									'unit_sold'=>$unit_sold,
									'gross'=>$gross,
									'net'=>$net,
								]);
	}
	
	/**
	 * @param DefaultListRequest $request
	 * @return Response|Application|ResponseFactory
	 */
	public function totalSongs(DefaultListRequest $request): Response|Application|ResponseFactory
	{
		$tracks = $this->trackRepository->list($request->all());
		return response(new totalSongsListCollection($tracks));
	}
	
	/**
	 * @param DefaultListRequest $request
	 * @return Response|Application|ResponseFactory
	 */
	public function royaltyReport(DefaultListRequest $request): Response|Application|ResponseFactory
	{
		$platform = $this->platformRepository->list($request->all());
		return response(new royaltyReportListCollection($platform));
	}
	
	/**
	 * @param Request $request
	 * @return Response|Application|ResponseFactory
	 */
	public function amountPayable(Request $request): Response|Application|ResponseFactory
	{
		return response(new amountPayableResource($request));
	}
	
	/**
	 * @param Request $request
	 * @return Response|Application|ResponseFactory
	 */
	public function tdsAmount(Request $request): Response|Application|ResponseFactory
	{
		return response(new tdsAmountResource($request));
	}
	
	/**
	 * @param Request $request
	 * @return Response|Application|ResponseFactory
	 */
	public function monthlyExpenses(Request $request): Response|Application|ResponseFactory
	{
		return response(new monthlyExpensesResource($request));
	}
	
	
	
	public function totalNetProfit(Request $request){
		return response(new totalNetProfitResource($data));
	}
	public function topSongs(Request $request){
		return response(new TopSongsResource($data));
	}
}
