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
        Route::get('our-story/create', 'create')->name('our-story.create');
        Route::post('our-story/store', 'store')->name('our-story.store');
        Route::get('our-story/{id}', 'show')->name('our-story.show');
        Route::get('our-story/{id}/edit', 'edit')->name('our-story.edit');
        Route::put('our-story/{id}', 'update')->name('our-story.update');
        Route::delete('our-story/delete/{id}', 'destroy')->name('our-story.destroy');
    });

    //Menu Our Vision
    Route::controller(App\Http\Controllers\OurVisionController::class)->group(function () {
        Route::get('our-vision', 'index')->name('our-vision.index');
        Route::get('our-vision/create', 'create')->name('our-vision.create');
        Route::post('our-vision/store', 'store')->name('our-vision.store');
        Route::get('our-vision/{id}', 'show')->name('our-vision.show');
        Route::get('our-vision/{id}/edit', 'edit')->name('our-vision.edit');
        Route::put('our-vision/{id}', 'update')->name('our-vision.update');
        Route::delete('our-vision/delete/{id}', 'destroy')->name('our-vision.destroy');
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
        Route::get('experience/create', 'create')->name('experience.create');
        Route::post('experience/store', 'store')->name('experience.store');
        Route::get('experience/{id}', 'show')->name('experience.show');
        Route::get('experience/{id}/edit', 'edit')->name('experience.edit');
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
        Route::get('resort/create', 'create')->name('resort.create');
        Route::post('resort/store', 'store')->name('resort.store');
        Route::get('resort/{id}', 'show')->name('resort.show');
        Route::get('resort/{id}/edit', 'edit')->name('resort.edit');
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
        Route::post('our-distributor/store', 'store')->name('our-distributor.store');
        Route::put('our-distributor/{id}', 'update')->name('our-distributor.update');
        Route::delete('our-distributor/delete/{id}', 'destroy')->name('our-distributor.destroy');
    });

    //Product
    //Menu Category Product
    Route::controller(App\Http\Controllers\CategoryProductController::class)->group(function () {
        Route::get('category-product', 'index')->name('category-product.index');
        Route::get('category-product/create', 'create')->name('category-product.create');
        Route::post('category-product/store', 'store')->name('category-product.store');
        Route::get('category-product/{id}', 'show')->name('category-product.show');
        Route::get('category-product/{id}/edit', 'edit')->name('category-product.edit');
        Route::put('category-product/{id}', 'update')->name('category-product.update');
        Route::delete('category-product/delete/{id}', 'destroy')->name('category-product.destroy');
    });

    //Menu Product
    Route::controller(App\Http\Controllers\ProductController::class)->group(function () {
        Route::get('product', 'index')->name('product.index');
        Route::get('product/create', 'create')->name('product.create');
        Route::post('product/store', 'store')->name('product.store');
        Route::get('product/{id}', 'show')->name('product.show');
        Route::get('product/{id}/edit', 'edit')->name('product.edit');
        Route::put('product/{id}', 'update')->name('product.update');
        Route::delete('product/delete/{id}', 'destroy')->name('product.destroy');
    });

    //Menu Partner
    Route::controller(App\Http\Controllers\PartnerController::class)->group(function () {
        Route::get('partner', 'index')->name('partner.index');
        Route::post('partner/store', 'store')->name('partner.store');
        Route::put('partner/{id}', 'update')->name('partner.update');
        Route::delete('partner/delete/{id}', 'destroy')->name('partner.destroy');
    });

    //News & Event
    //Menu category News $ Event
    Route::controller(App\Http\Controllers\CategoryNewsEventController::class)->group(function () {
        Route::get('category-news-event', 'index')->name('category-news-event.index');
        Route::post('category-news-event/store', 'store')->name('category-news-event.store');
        Route::put('category-news-event/{id}', 'update')->name('category-news-event.update');
        Route::delete('category-news-event/delete/{id}', 'destroy')->name('category-news-event.destroy');
    });

    //Menu News & Event
    Route::controller(App\Http\Controllers\NewsEventController::class)->group(function () {
        Route::get('news-event', 'index')->name('news-event.index');
        Route::post('news-event/store', 'store')->name('news-event.store');
        Route::put('news-event/{id}', 'update')->name('news-event.update');
        Route::delete('news-event/delete/{id}', 'destroy')->name('news-event.destroy');
    });

    //Menu Job Applicant
    Route::controller(App\Http\Controllers\JobApplicantController::class)->group(function () {
        Route::get('job-applicant', 'index')->name('job-applicant.index');
        // Route::get('job-applicant/create', 'create')->name('job-applicant.create');
        // Route::post('job-applicant/store', 'store')->name('job-applicant.store');
        Route::get('job-applicant/{id}', 'show')->name('job-applicant.show');
        Route::get('job-applicant/{id}/edit', 'edit')->name('job-applicant.edit');
        Route::put('job-applicant/{id}', 'update')->name('job-applicant.update');
        Route::delete('job-applicant/delete/{id}', 'destroy')->name('job-applicant.destroy');
    });

    //Function CKEditor
    Route::post('ckeditor/upload', [App\Http\Controllers\CKEditorController::class, 'upload'])->name('ckeditor.upload');
});

require __DIR__ . '/auth.php';
