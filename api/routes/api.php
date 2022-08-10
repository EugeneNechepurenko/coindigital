<?php
	
	use App\Http\Controllers\AlbumController;
	use App\Http\Controllers\ArtistController;
	use App\Http\Controllers\ImageController;
	use App\Http\Controllers\LabelController;
	use App\Http\Controllers\PaymentController;
	use App\Http\Controllers\ReleaseController;
	use App\Http\Controllers\ReportsController;
	use App\Http\Controllers\SalesController;
	use App\Http\Controllers\StoreController;
	use App\Http\Controllers\TrackController;
	use App\Http\Controllers\UserController;
	use Illuminate\Support\Facades\Route;
	use App\Http\Controllers\AuthController;
	
	/*
	|--------------------------------------------------------------------------
	| API Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register API routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| is assigned the "api" middleware group. Enjoy building your API!
	|
	*/
	Route::group([
		'middleware' => 'api',
		'prefix' => 'auth'
	], function ($router) {
		Route::group(['middleware' => ['role:admin']], function () {
			// Route::post('/register', [AuthController::class, 'register']);
		});
		Route::post('/login', [AuthController::class, 'login']);
		Route::post('/register', [AuthController::class, 'register']);
		Route::post('/logout', [AuthController::class, 'logout']);
		Route::post('/refresh', [AuthController::class, 'refresh']);
		Route::get('/user-profile', [AuthController::class, 'userProfile']);
		
		Route::prefix('{locale}')->group(function () {
			// For locale routes
		});
	});
	
	
	function crudRoutes(): void
	{
		Route::get('/','list')->name('list');
		Route::post('/create','create')->name('create');
		Route::get('/{id}','get')->name('get');
		Route::post('/{id}/update','update')->name('update');
		Route::get('/{id}/delete','delete')->name('delete');
	}
	
	Route::name('store-')->prefix('/stores')->controller(StoreController::class)->group(function(){
		crudRoutes();
	});
	Route::name('user-')->prefix('/users')->controller(UserController::class)->group(function(){
		crudRoutes();
	});
	Route::name('label-')->prefix('/labels')->controller(LabelController::class)->group(function(){
		crudRoutes();
	});
	Route::name('track-')->prefix('/tracks')->controller(TrackController::class)->group(function(){
		crudRoutes();
	});
	Route::name('release-')->prefix('/releases')->controller(ReleaseController::class)->group(function(){
		crudRoutes();
	});
	Route::name('payment-')->prefix('/payments')->controller(PaymentController::class)->group(function(){
		crudRoutes();
	});
	Route::name('artist-')->prefix('/artists')->controller(ArtistController::class)->group(function(){
		crudRoutes();
	});
	Route::name('image-')->prefix('/images')->controller(ImageController::class)->group(function(){
		crudRoutes();
	});
	Route::name('sales-')->prefix('/sales')->controller(SalesController::class)->group(function(){
//		\App\Http\Controllers\SalesController::chanelRevenue
		
		Route::get('/chanelRevenue','chanelRevenue')->name('list');
		Route::get('/chanelRevenueTotal','chanelRevenueTotal')->name('list');
	});
	
	Route::name('reports-')->prefix('/reports')->controller(ReportsController::class)->group(function(){
		Route::get('/chanel-revenue','chanelRevenue')->name('chanelRevenue');
		Route::get('/chanel-revenue-total','chanelRevenueTotal')->name('chanelRevenueTotal');
		Route::get('/top-tracks','topTracks')->name('topTracks');
		Route::get('/top-tracks-total','topTracksTotal')->name('topTracksTotal');
		Route::get('/total-songs','totalSongs')->name('totalSongs');
		Route::get('/royalty-report','royaltyReport')->name('royaltyReport');
		Route::get('/amount-payable','amountPayable')->name('amountPayable');
		Route::get('/tds-amount','tdsAmount')->name('tdsAmount');
		Route::get('/monthly-expenses','monthlyExpenses')->name('monthlyExpenses');
	});