<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\FamilyBackgroundController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\EducationalBackgroundController;
use App\Http\Controllers\EligibilityController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\VoluntaryOrganizationController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\OtherInformationController;
use App\Http\Controllers\PdsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/', function () {
    return redirect('/login');
});



Route::get('/personal-info', [PersonalInfoController::class, 'index'])
    ->middleware('auth')
    ->name('personal-info.index');

Route::get('/personal-info/create', [PersonalInfoController::class, 'create']);
Route::post('/personal-info/store', [PersonalInfoController::class, 'storeWeb']);
Route::post('/personal-info', [PersonalInfoController::class, 'store'])->name('personal.store');



Route::get('/pds/{id}/export', [PdsController::class, 'export'])
    ->name('pds.export');


Route::delete('/pds/{id}', [PersonalInfoController::class, 'destroy'])
    ->name('personal-info.destroy');







Route::get(
    '/family-background/create/{personalInfo}',
    [FamilyBackgroundController::class, 'create']
)->name('family_background.create');

Route::post(
    '/family-background/store',
    [FamilyBackgroundController::class, 'store']
)->name('family_background.store');




Route::post('/children', [ChildController::class, 'store'])->name('children.store');

Route::get(
    '/children/create/{familyBackground}',
    [ChildController::class, 'create']
)->name('children.createChild');



Route::get(
    '/educational-background/create/{personalInfo}',
    [EducationalBackgroundController::class, 'create']
)->name('educational_background.create');

Route::post(
    '/educational-background/store',
    [EducationalBackgroundController::class, 'store']
)->name('educational_background.store');





Route::get(
    '/eligibility/create/{personalInfo}',
    [EligibilityController::class, 'create']
)->name('eligibility.create');

Route::post(
    '/eligibility/store',
    [EligibilityController::class, 'store']
)->name('eligibility.store');


Route::get(
    '/work-experience/create/{personalInfo}',
    [WorkExperienceController::class, 'create']
)->name('work_experience.create');

Route::post(
    '/work-experience/store',
    [WorkExperienceController::class, 'store']
)->name('work_experience.store');






Route::get(
    '/voluntary/create/{personalInfo}',
    [VoluntaryOrganizationController::class, 'create']
)->name('voluntary.create');

Route::post(
    '/voluntary/store',
    [VoluntaryOrganizationController::class, 'store']
)->name('voluntary.store');



Route::get(
    '/training/create/{personalInfo}',
    [TrainingController::class, 'create']
)->name('training.create');

Route::post(
    '/training/store',
    [TrainingController::class, 'store']
)->name('training.store');



Route::get(
    '/other-info/create/{personalInfo}',
    [OtherInformationController::class, 'create']
)->name('other-info.create');

Route::post(
    '/other-info/store',
    [OtherInformationController::class, 'store']
)->name('other-info.store');



Route::get(
    '/pds/{personalInfo}/edit',
    [PdsController::class, 'edit']
)->name('pds.edit');

Route::put(
    '/pds/{personalInfo}',
    [PdsController::class, 'update']
)->name('pds.update');

Route::get('/pds/{personalInfo}', [PdsController::class, 'show'])
    ->name('pds.show');







require __DIR__.'/auth.php';


