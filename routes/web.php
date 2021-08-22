<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\CheckpointController;
use App\Http\Controllers\PatientConsentController;
use App\Http\Controllers\TreatmentmoduleController;
use App\Http\Controllers\TreatmenttypeController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\DiagnoseController;
use App\Http\Controllers\HealthinsuranceController;
use App\Http\Controllers\PeoplepresentatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserdataController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\FindingController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\TreatmentcategoryController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\ConsultationController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Auth::routes();
	Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');
	Route::group(['middleware' => 'auth'], function () {
	// Route::get('users-search', [UserController::class, 'searchUser'])->name('searchUser');
	Route::resource('roles', RoleController::class);
	Route::resource('clinics', ClinicController::class);
	Route::resource('checkpoints', CheckpointController::class);
	Route::resource('patientconsents', PatientConsentController::class);
	Route::resource('treatmentmodules', TreatmentmoduleController::class);
	Route::resource('treatmenttypes', TreatmenttypeController::class);
	Route::resource('texts', TextController::class);
	Route::resource('diagnose', DiagnoseController::class);
	Route::resource('healthinsurances', HealthinsuranceController::class);
	Route::resource('peoplepresentat', PeoplepresentatController::class);
	Route::resource('users', UserController::class);
	Route::resource('userdata', UserdataController::class);
	Route::resource('practices', PracticeController::class);
	Route::resource('patients', PatientController::class);
	Route::resource('findings', FindingController::class);
	Route::resource('documents', DocumentController::class);
	Route::resource('images', ImageController::class);
	Route::resource('treatments', TreatmentController::class);
	Route::resource('treatmentcategories', TreatmentcategoryController::class);
	Route::resource('videos', VideoController::class);
	Route::resource('helpers', HelperController::class);
	
	Route::get('consultation', ['as' => 'consultation.dashboard', 'uses' => 'App\Http\Controllers\ConsultationController@index']);

	Route::get('edit', ['as' => 'consultation.edit', 'uses' => 'App\Http\Controllers\ConsultationController@edit']);

	// Route::get('users', [UserController::class, 'searchUser'])->name('searchUser');
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

});

// Route::group(['middleware' => 'auth'], function () {
// 	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
// 	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
// 	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
// 	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
// });

