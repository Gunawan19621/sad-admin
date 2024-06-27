<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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
    $data = [
        'active' => 'dashboard'
    ];
    return view('pages.admin.index', $data);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Layouts
    //Menu Header
    Route::controller(App\Http\Controllers\MenuHeaderController::class)->group(function () {
        Route::get('menu-header', 'index')->name('menu-header.index');
        Route::put('menu-header/{id}', 'update')->name('menu-header.update');
    });

    //Menu Our Team
    Route::controller(App\Http\Controllers\OurTeamController::class)->group(function () {
        Route::get('our-team', 'index')->name('our-team.index');
        Route::post('our-team/store', 'store')->name('our-team.store');
        Route::put('our-team/{id}', 'update')->name('our-team.update');
        Route::delete('our-team/delete/{id}', 'destroy')->name('our-team.destroy');
    });

    //Menu Our Story
    Route::controller(App\Http\Controllers\OurStoryController::class)->group(function () {
        Route::get('our-story', 'index')->name('our-story.index');
        Route::post('our-story/store', 'store')->name('our-story.store');
        Route::put('our-story/{id}', 'update')->name('our-story.update');
        Route::delete('our-story/delete/{id}', 'destroy')->name('our-story.destroy');
    });

    //Menu Our Vision
    Route::controller(App\Http\Controllers\OurVisionController::class)->group(function () {
        Route::get('our-vision', 'index')->name('our-vision.index');
        Route::put('our-vision/{id}', 'update')->name('our-vision.update');
    });

    //Menu Awards
    Route::controller(App\Http\Controllers\AwardController::class)->group(function () {
        Route::get('award', 'index')->name('award.index');
        Route::post('award/store', 'store')->name('award.store');
        Route::put('award/{id}', 'update')->name('award.update');
        Route::delete('award/delete/{id}', 'destroy')->name('award.destroy');
    });

    //FAQ
    //Menu Category FAQ
    Route::controller(App\Http\Controllers\CategoryFaqController::class)->group(function () {
        Route::get('category-faq', 'index')->name('category-faq.index');
        Route::post('category-faq/store', 'store')->name('category-faq.store');
        Route::put('category-faq/{id}', 'update')->name('category-faq.update');
        Route::delete('category-faq/delete/{id}', 'destroy')->name('category-faq.destroy');
    });

    //Menu FAQ
    Route::controller(App\Http\Controllers\FAQController::class)->group(function () {
        Route::get('faq', 'index')->name('faq.index');
        Route::post('faq/store', 'store')->name('faq.store');
        Route::put('faq/{id}', 'update')->name('faq.update');
        Route::delete('faq/delete/{id}', 'destroy')->name('faq.destroy');
    });

    //Menu Contact Us
    Route::controller(App\Http\Controllers\ContactUsController::class)->group(function () {
        Route::get('contact-us', 'index')->name('contact-us.index');
        Route::put('contact-us/{id}', 'update')->name('contact-us.update');
    });

    //Menu Experience
    Route::controller(App\Http\Controllers\ExperienceController::class)->group(function () {
        Route::get('experience', 'index')->name('experience.index');
        Route::post('experience/store', 'store')->name('experience.store');
        Route::put('experience/{id}', 'update')->name('experience.update');
        Route::delete('experience/delete/{id}', 'destroy')->name('experience.destroy');
    });

    //Menu Image Experience
    Route::controller(App\Http\Controllers\ImageExperienceController::class)->group(function () {
        Route::get('image-experience', 'index')->name('image-experience.index');
        Route::post('image-experience/store', 'store')->name('image-experience.store');
        Route::put('image-experience/{id}', 'update')->name('image-experience.update');
        Route::delete('image-experience/delete/{id}', 'destroy')->name('image-experience.destroy');
    });

    //Menu Experience Price
    Route::controller(App\Http\Controllers\ExperiencePriceController::class)->group(function () {
        Route::get('experience-price', 'index')->name('experience-price.index');
        Route::post('experience-price/store', 'store')->name('experience-price.store');
        Route::put('experience-price/{id}', 'update')->name('experience-price.update');
        Route::delete('experience-price/delete/{id}', 'destroy')->name('experience-price.destroy');
    });

    //Resort
    //Menu Resort
    Route::controller(App\Http\Controllers\ResortController::class)->group(function () {
        Route::get('resort', 'index')->name('resort.index');
        Route::post('resort/store', 'store')->name('resort.store');
        Route::put('resort/{id}', 'update')->name('resort.update');
        Route::delete('resort/delete/{id}', 'destroy')->name('resort.destroy');
    });

    //Menu Resort Image
    Route::controller(App\Http\Controllers\ResortImageController::class)->group(function () {
        Route::get('resort-image', 'index')->name('resort-image.index');
        Route::post('resort-image/store', 'store')->name('resort-image.store');
        Route::put('resort-image/{id}', 'update')->name('resort-image.update');
        Route::delete('resort-image/delete/{id}', 'destroy')->name('resort-image.destroy');
    });

    //Menu Our Distributor
    Route::controller(App\Http\Controllers\OurDistributorController::class)->group(function () {
        Route::get('our-distributor', 'index')->name('our-distributor.index');
        // Route::get('our-distributor/create', 'create')->name('our-distributor.create');
        Route::post('our-distributor/store', 'store')->name('our-distributor.store');
        // Route::get('our-distributor/{id}', 'show')->name('our-distributor.show');
        // Route::get('our-distributor/{id}/edit', 'edit')->name('our-distributor.edit');
        Route::put('our-distributor/{id}', 'update')->name('our-distributor.update');
        Route::delete('our-distributor/delete/{id}', 'destroy')->name('our-distributor.destroy');
    });
});

require __DIR__ . '/auth.php';