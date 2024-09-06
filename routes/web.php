<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\Admin\SliderImageController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\GalleryController;


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
Auth::routes(['register' => false]);

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/about', function () {
//     return view('about');
// });
// Route::get('/contact', function () {
//     return view('contact');
// });

Route::get('/', [App\Http\Controllers\GeneralController::class, 'index'])->name('welcome');
Route::get('/about-us', [App\Http\Controllers\GeneralController::class, 'about'])->name('about');
Route::get('/contact-us', [App\Http\Controllers\GeneralController::class, 'contact'])->name('contact');
Route::get('/donate/now', [App\Http\Controllers\GeneralController::class, 'donate'])->name('donate');
Route::post('/contact/send', [App\Http\Controllers\GeneralController::class, 'send'])->name('contact.send');
Route::get('/our-programs/all', [App\Http\Controllers\GeneralController::class, 'programs'])->name('our.programs');
Route::get('/programs/detail/{id}', [App\Http\Controllers\GeneralController::class, 'program_details'])->name('program.detail');
Route::get('/refresh-captcha', [App\Http\Controllers\GeneralController::class, 'reloadCaptcha']);
Route::post('donate-form', [App\Http\Controllers\GeneralController::class, 'donate_form'])->name('donate.submit');
// Route::post('/submit-form', [GeneralController::class, 'submitForm'])->name('form.submit');

// Route::get('', function () {
//     return response()->json(['captcha' => captcha_img('flat')]);
// });

// Route::get('/reload-captcha', [HomeController::class, '']);

Route::get('/events', [App\Http\Controllers\GeneralController::class, 'events'])->name('ourevents');
Route::get('/events/{slug}', [App\Http\Controllers\GeneralController::class, 'events_details'])->name('oureventsdetails');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('user', 'UserController');

    Route::resource('permission', 'PermissionController');


    Route::get('/profile', 'UserController@profile')->name('user.profile');

    Route::post('/profile', 'UserController@postProfile')->name('user.postProfile');

    Route::get('/password/change', 'UserController@getPassword')->name('userGetPassword');

    Route::post('/password/change', 'UserController@postPassword')->name('userPostPassword');
});


Route::group(['middleware' => ['auth', 'role_or_permission:admin|create role|create permission']], function() {

    Route::resource('role', 'RoleController');


});

Auth::routes();

//////////////////////////////// axios request
Route::group(['middleware' => 'auth'], function() {
Route::get('/getAllPermission', 'PermissionController@getAllPermissions');
Route::post("/postRole", "RoleController@store");
Route::get("/getAllUsers", "UserController@getAll");
Route::get("/getAllRoles", "RoleController@getAll");
Route::get("/getAllPermissions", "PermissionController@getAll");

/////////////axios create user
Route::post('/account/create', 'UserController@store');
Route::put('/account/update/{id}', 'UserController@update');
Route::delete('/delete/user/{id}', 'UserController@delete');
Route::get('/search/user', 'UserController@search');


// CUSTOM ROUTES :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
  // Settings Controller
  Route::prefix('setting')->group(function () {
    Route::get('/website-setting/edit', 'SettingController@edit')->name('website-setting.edit');
    Route::post('/website-setting/update/{id}', 'SettingController@update')->name('website-setting.update');
    // Create Slider
    Route::get('slider/create', [SliderImageController::class, 'create'])->name('slider.create');
    Route::post('slider/store', [SliderImageController::class, 'store'])->name('slider.store');
    Route::resource('events', 'EventController');
    // Route::get('events/index', [EventController::class, 'index'])->name('events.index');
    // Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    // Route::post('events/store', [EventController::class, 'store'])->name('events.store');

    Route::get('sliders', [SliderImageController::class, 'index'])->name('sliders.index');

    // Route to show a single slider
    Route::get('sliders/{slider}', [SliderImageController::class, 'show'])->name('sliders.show');

    // Route to show form for editing an existing slider
    Route::get('sliders/{slider}/edit', [SliderImageController::class, 'edit'])->name('sliders.edit');

    // Route to update an existing slider
    Route::post('sliders/{slider}', [SliderImageController::class, 'update'])->name('sliders.update');

    // Route to delete an existing slider
    Route::delete('sliders/{slider}', [SliderImageController::class, 'destroy'])->name('sliders.destroy');
   
    // Gallery Route Starts here:
    Route::get('galleries', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('gallery', [GalleryController::class, 'create'])->name('gallery.create');
    Route::get('gallery/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::post('gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::post('gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('gallery/destroy/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
   
});

// Company Profiles
Route::get('company_profiles/create', [CompanyProfileController::class, 'create'])->name('company_profiles.create');
Route::post('company_profiles', [CompanyProfileController::class, 'store'])->name('company_profiles.store');
Route::get('company_profiles', [CompanyProfileController::class, 'index'])->name('company_profiles.index');
Route::get('company_profiles/{id}/edit', [CompanyProfileController::class, 'edit'])->name('company_profiles.edit');
Route::put('company_profiles/{id}', [CompanyProfileController::class, 'update'])->name('company_profiles.update');
Route::delete('company_profiles/{id}', [CompanyProfileController::class, 'destroy'])->name('company_profiles.destroy');


// Company Programs
Route::get('/programs', [ProgramsController::class, 'index'])->name('programs.index');
Route::get('programs/create', [ProgramsController::class, 'create'])->name('programs.create');
Route::post('programs/store', [ProgramsController::class, 'store'])->name('programs.store');
Route::get('programs/edit/{id}', [ProgramsController::class, 'edit'])->name('programs.edit');
Route::post('programs/update/{id}', [ProgramsController::class, 'update'])->name('programs.update');
Route::delete('programs/{id}', [ProgramsController::class, 'destroy'])->name('programs.destroy');

});