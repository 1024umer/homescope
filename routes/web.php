<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\FloorplanController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix' => 'auth'],function($route){
    $route->get('/login',[AuthController::class,'Login'])->name('login');
    $route->post('/validate-login',[AuthController::class,'ValidateLogin'])->name('validate.login');
    $route->get('/register',[AuthController::class,'Register'])->name('register');
    $route->post('/validate-register',[AuthController::class,'ValidateRegister'])->name('validate.register');
    $route->get('/logout',[AuthController::class,'Logout'])->name('logout');
});

Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/contact-us',[HomeController::class,'contact'])->name('contact');
Route::get('/careers',[HomeController::class,'careers'])->name('careers');
Route::post('/application',[HomeController::class,'application'])->name('application');
Route::get('/about-us',[HomeController::class,'about'])->name('about');
Route::get('/privacy-policy',[HomeController::class,'privacypolicy'])->name('privacy.policy');
Route::get('/secondary-properties',[HomeController::class,'secondaryproperty'])->name('secondary.property');
Route::get('/offplan-properties',[HomeController::class,'offplanproperty'])->name('offplan.property');
Route::get('/our-team',[HomeController::class,'Team'])->name('team');
Route::get('/project/{slug}',[HomeController::class,'projectdetails'])->name('project.details');
Route::get('/portal-property/{reference_id}',[HomeController::class,'portalpropertydetails'])->name('portal.property.details');
Route::get('/community/{slug}',[HomeController::class,'projectsbycommunity'])->name('community.projects');
Route::get('/developer/{slug}',[HomeController::class,'projectsbydeveloper'])->name('developer.projects');
Route::get('/download-brochure/{slug}',[HomeController::class,'DownloadBrochure'])->name('brochure');
Route::get('/download-floor-plan/{slug}',[HomeController::class,'Floorplan'])->name('floor.plan');
Route::get('/download-payment-plan/{slug}',[HomeController::class,'Paymentplan'])->name('payment.plan');
Route::get('/store-lead',[HomeController::class,'StoreLeads'])->name('store.lead');

Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('/settings',[AdminController::class,'settings'])->name('settings');
Route::get('/leads',[AdminController::class,'LeadsRecord'])->name('leads');
Route::get('/del-lead/{id}',[AdminController::class,'DelLead'])->name('del.lead');
Route::post('/store-stetting',[AdminController::class,'GeneralSettings'])->name('store.setting');
Route::post('/update-setting',[AdminController::class,'UpdateGeneralSettings'])->name('update.setting');


Route::resource('developers', DeveloperController::class);
Route::resource('communities',CommunityController::class);
Route::resource('projects',ProjectController::class);
Route::resource('amenities',AmenityController::class);
Route::resource('floorplans',FloorplanController::class);
Route::resource('locations',LocationController::class);
Route::resource('images',ImageController::class);
Route::resource('teams', TeamController::class);
Route::get('/update-order',[ProjectController::class,'update_order'])->name('update_order');
Route::get('/update-developer-order',[DeveloperController::class,'update_order'])->name('update_developer_order');
Route::get('/update-team-order',[TeamController::class,'update_order'])->name('update_team_order');