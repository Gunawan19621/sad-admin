<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\web_shopcontroller;
use App\Http\Controllers\web_aboutcontroller;
use App\Http\Controllers\web_startcontroller;
use App\Http\Controllers\web_resortcontroller;
use App\Http\Controllers\web_partnerscontroller;
use App\Http\Controllers\web_productscontroller;
use App\Http\Controllers\web_newseventcontroller;
use App\Http\Controllers\Web_activitiescontroller;
use App\Http\Controllers\web_experiencecontroller;
use App\Http\Controllers\web_workwithuscontroller;
use App\Http\Controllers\web_distributorscontroller;

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
    return view('pages.web.index');
});
Route::get('/start', [web_startcontroller::class, 'index'])->name('start');
Route::get('/home', [web_aboutcontroller::class, 'index'])->name('home');
Route::get('/about', [web_aboutcontroller::class, 'about'])->name('about');
Route::get('/about/our-story', [web_aboutcontroller::class, 'our_story'])->name('our_story');
Route::get('/about/our-team', [web_aboutcontroller::class, 'our_team'])->name('our_team');
Route::get('/about/our-vision', [web_aboutcontroller::class, 'our_vision'])->name('our_vision');
Route::get('/about/awards', [web_aboutcontroller::class, 'awards'])->name('awards');
Route::get('/about/faq', [web_aboutcontroller::class, 'faq'])->name('faq');
Route::get('/about/contact-us', [web_aboutcontroller::class, 'contact_us'])->name('contact_us');


Route::get('/experience', [web_experiencecontroller::class, 'index'])->name('experience');
Route::get('/experience/{id}', [web_experiencecontroller::class, 'show'])->name('experience.show');

Route::get('/activities', [Web_activitiescontroller::class, 'index'])->name('activities');
Route::get('/activities/{id}', [Web_activitiescontroller::class, 'show'])->name('activities.show');

Route::get('/resort', [web_resortcontroller::class, 'index'])->name('resort');
Route::get('/resort/{id}', [web_resortcontroller::class, 'show'])->name('resort.show');

Route::get('/products', [web_productscontroller::class, 'index'])->name('products');
Route::get('/products/{id}', [web_productscontroller::class, 'show'])->name('products.show');
Route::get('/products/detail/{id}', [web_productscontroller::class, 'detail'])->name('products.detail');

Route::get('/news-event', [web_newseventcontroller::class, 'index'])->name('news-event');
Route::get('/news-event/{id}', [web_newseventcontroller::class, 'show'])->name('news-event.show');

Route::get('/work-with-us', [web_workwithuscontroller::class, 'index'])->name('work-with-us');

Route::get('/distributors', [web_distributorscontroller::class, 'index'])->name('distributors');
Route::get('/distributors/{id}', [web_distributorscontroller::class, 'show'])->name('distributors.show');

Route::get('/partner', [web_partnerscontroller::class, 'index'])->name('partners');
Route::get('/partner/{id}', [web_partnerscontroller::class, 'show'])->name('partners.show');

Route::get('/shop', [web_shopcontroller::class, 'index'])->name('shop');
Route::get('/shop/{id}', [web_shopcontroller::class, 'show'])->name('shop.show');

/// SUDAE ////
Route::get('/suade', [App\Http\Controllers\suade\HomeController::class, 'index'])->name('suade');

////////////////////////////////// Dashboard //////////////////////////////////

//Menu Dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/updatePassword', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/{id}/updateFoto', [ProfileController::class, 'updateFoto'])->name('profile.updateFoto');
    Route::patch('profile/{id}/reset-foto', [ProfileController::class, 'resetFoto'])->name('profile.resetFoto');

    //Layouts
    //Menu Header
    Route::controller(App\Http\Controllers\MenuHeaderController::class)->group(function () {
        Route::get('menu-header', 'index')->name('menu-header.index');
        Route::put('menu-header/{id}', 'update')->name('menu-header.update');
    });
    //Menu Quick Link
    Route::controller(App\Http\Controllers\QuickLinkController::class)->group(function () {
        Route::get('quick-link', 'index')->name('quick-link.index');
        Route::get('quick-link/{id}', 'show')->name('quick-link.show');
        Route::get('quick-link/{id}/edit', 'edit')->name('quick-link.edit');
        Route::put('quick-link/{id}', 'update')->name('quick-link.update');
    });
    //Menu Stay In Touch
    Route::controller(App\Http\Controllers\StayInTouchCOntroller::class)->group(function () {
        Route::get('stay-in-touch', 'index')->name('stay-in-touch.index');
        Route::delete('stay-in-touch/delete/{id}', 'destroy')->name('stay-in-touch.destroy');
    });


    //Aboute
    //Menu About
    Route::controller(App\Http\Controllers\AboutController::class)->group(function () {
        Route::get('about', 'index')->name('about.index');
        Route::get('about/{id}', 'show')->name('about.show');
        Route::get('about/{id}/edit', 'edit')->name('about.edit');
        Route::put('about/{id}', 'update')->name('about.update');
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

    //Menu Enquiry
    Route::controller(App\Http\Controllers\EnquiryController::class)->group(function () {
        Route::get('enquiry', 'index')->name('enquiry.index');
        Route::get('enquiry/{id}', 'show')->name('enquiry.show');
        Route::put('enquiry/{id}', 'update')->name('enquiry.update');
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

    //Menu Activiti
    Route::controller(App\Http\Controllers\ActivitiController::class)->group(function () {
        Route::get('activiti', 'index')->name('activiti.index');
        Route::get('activiti/create', 'create')->name('activiti.create');
        Route::post('activiti/store', 'store')->name('activiti.store');
        Route::get('activiti/{id}', 'show')->name('activiti.show');
        Route::get('activiti/{id}/edit', 'edit')->name('activiti.edit');
        Route::put('activiti/{id}', 'update')->name('activiti.update');
        Route::delete('activiti/delete/{id}', 'destroy')->name('activiti.destroy');
    });

    //Menu Image Activiti
    Route::controller(App\Http\Controllers\ImageActivitiController::class)->group(function () {
        Route::get('image-activiti', 'index')->name('image-activiti.index');
        Route::post('image-activiti/store', 'store')->name('image-activiti.store');
        Route::put('image-activiti/{id}', 'update')->name('image-activiti.update');
        Route::delete('image-activiti/delete/{id}', 'destroy')->name('image-activiti.destroy');
    });

    //Menu Activiti Price
    Route::controller(App\Http\Controllers\ActivitiPriceController::class)->group(function () {
        Route::get('activiti-price', 'index')->name('activiti-price.index');
        Route::post('activiti-price/store', 'store')->name('activiti-price.store');
        Route::put('activiti-price/{id}', 'update')->name('activiti-price.update');
        Route::delete('activiti-price/delete/{id}', 'destroy')->name('activiti-price.destroy');
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
        Route::post('category-product/store', 'store')->name('category-product.store');
        Route::put('category-product/{id}', 'update')->name('category-product.update');
        Route::delete('category-product/delete/{id}', 'destroy')->name('category-product.destroy');
    });

    //Menu Sub Category Product
    Route::controller(App\Http\Controllers\SubCategoryController::class)->group(function () {
        Route::get('sub-category-product', 'index')->name('sub-category-product.index');
        Route::post('sub-category-product/store', 'store')->name('sub-category-product.store');
        Route::put('sub-category-product/{id}', 'update')->name('sub-category-product.update');
        Route::delete('sub-category-product/delete/{id}', 'destroy')->name('sub-category-product.destroy');
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
        Route::get('news-event/create', 'create')->name('news-event.create');
        Route::post('news-event/store', 'store')->name('news-event.store');
        Route::get('news-event/{id}', 'show')->name('news-event.show');
        Route::get('news-event/{id}/edit', 'edit')->name('news-event.edit');
        Route::put('news-event/{id}', 'update')->name('news-event.update');
        Route::delete('news-event/delete/{id}', 'destroy')->name('news-event.destroy');
    });

    //Menu Job Applicant
    Route::controller(App\Http\Controllers\JobApplicantController::class)->group(function () {
        Route::get('job-applicant', 'index')->name('job-applicant.index');
        Route::get('job-applicant/{id}', 'show')->name('job-applicant.show');
        Route::get('job-applicant/{id}/edit', 'edit')->name('job-applicant.edit');
        Route::put('job-applicant/{id}', 'update')->name('job-applicant.update');
        Route::delete('job-applicant/delete/{id}', 'destroy')->name('job-applicant.destroy');
    });

    //Menu Gallery
    Route::controller(App\Http\Controllers\GalleryController::class)->group(function () {
        Route::get('gallery', 'index')->name('gallery.index');
        Route::post('gallery/store', 'store')->name('gallery.store');
        Route::put('gallery/{id}', 'update')->name('gallery.update');
        Route::delete('gallery/delete/{id}', 'destroy')->name('gallery.destroy');
    });

    //Suade Experience
    //Menu Category Experience
    Route::controller(App\Http\Controllers\ExperienceCategoryController::class)->group(function () {
    Route::get('experience-category', 'index')->name('experience-category.index');
    Route::post('experience-category/store', 'store')->name('experience-category.store');
    Route::put('experience-category/{id}', 'update')->name('experience-category.update');
    Route::delete('experience-category/delete/{id}', 'destroy')->name('experience-category.destroy');
});

//Menu Experience
Route::controller(App\Http\Controllers\SuadeExperienceController::class)->group(function () {
    Route::get('suade-experience', 'index')->name('suade-experience.index');
    Route::get('suade-experience/create', 'create')->name('suade-experience.create');
    Route::post('suade-experience/store', 'store')->name('suade-experience.store');
    Route::post('suade-experience/storeImage', 'storeImage')->name('suade-experience.storeImage');
    Route::get('suade-experience/{id}', 'show')->name('suade-experience.show');
    Route::get('suade-experience/{id}/edit', 'edit')->name('suade-experience.edit');
    Route::put('suade-experience/{id}', 'update')->name('suade-experience.update');
    Route::delete('suade-experience/delete/{id}', 'destroy')->name('suade-experience.destroy');
    Route::delete('suade-experience/delete-image/{id}', 'destroyImage')->name('suade-experience.destroyImage');
});

    // Suade Product
    //Menu Category Product
    Route::controller(App\Http\Controllers\SuadeProductCategoryController::class)->group(function () {
    Route::get('product-category', 'index')->name('product-category.index');
    Route::post('product-category/store', 'store')->name('product-category.store');
    Route::put('product-category/{id}', 'update')->name('product-category.update');
    Route::delete('product-category/delete/{id}', 'destroy')->name('product-category.destroy');
});

//Menu Product Type
Route::controller(App\Http\Controllers\SuadeProductTypeController::class)->group(function () {
    Route::get('product-type', 'index')->name('product-type.index');
    Route::post('product-type/store', 'store')->name('product-type.store');
    Route::put('product-type/{id}', 'update')->name('product-type.update');
    Route::delete('product-type/delete/{id}', 'destroy')->name('product-type.destroy');

    Route::get('product-type/{id}/gallery', 'gallery')->name('product-type.gallery');
    Route::post('product-type/gallery/store', 'galleryStore')->name('product-type.galleryStore');
    Route::delete('product-type/delete/gallery/{id}', 'galleryDestroy')->name('product-type.galleryDestroy');

    Route::get('product-type/{id}/collection', 'collection')->name('product-type.collection');
    Route::post('product-type/collection/store', 'collectionStore')->name('product-type.collectionStore');
    Route::put('product-type/collection/{collectionId}', 'collectionUpdate')->name('product-type.collectionUpdate');
    Route::delete('product-type/delete/collection/{id}', 'collectionDestroy')->name('product-type.collectionDestroy');

    Route::get('product-type/{id}/tour', 'tour')->name('product-type.tour');
    Route::get('product-type/tour/{id}/create', 'tourCreate')->name('product-type.tourCreate');
    Route::post('product-type/tour/store', 'tourStore')->name('product-type.tourStore');
    Route::get('product-type/{id}/tour/{tourId}/edit', 'tourEdit')->name('suade-product.tourEdit');

    Route::get('product-type/{id}/story', 'story')->name('product-type.story');

});

    //Menu Product
    Route::controller(App\Http\Controllers\SuadeProductController::class)->group(function () {
    Route::get('suade-product', 'index')->name('suade-product.index');
    Route::get('suade-product/create', 'create')->name('suade-product.create');
    Route::post('suade-product/store', 'store')->name('suade-product.store');
    Route::get('suade-product/{id}/edit', 'edit')->name('suade-product.edit');
    Route::put('suade-product/{id}', 'update')->name('suade-product.update');
    Route::delete('suade-product/delete/{id}', 'destroy')->name('suade-product.destroy');
});


    //System
    //Menu User Management
    Route::controller(App\Http\Controllers\UserManagementController::class)->group(function () {
        Route::get('user-management', 'index')->name('user-management.index');
        Route::get('user-management/create', 'create')->name('user-management.create');
        Route::post('user-management/store', 'store')->name('user-management.store');
        Route::get('user-management/{id}', 'show')->name('user-management.show');
        Route::get('user-management/{id}/edit', 'edit')->name('user-management.edit');
        Route::put('user-management/{id}', 'update')->name('user-management.update');
        Route::delete('user-management/delete/{id}', 'destroy')->name('user-management.destroy');
    });

    // Menu User Visitor
    Route::controller(App\Http\Controllers\UserVisitorController::class)->group(function () {
    Route::get('user-visitor', 'index')->name('user-visitor.index');
    Route::get('user-visitor/{id}/edit', 'edit')->name('user-visitor.edit');
    Route::put('user-visitor/{id}', 'update')->name('user-visitor.update');
    Route::delete('user-visitor/delete/{id}', 'destroy')->name('user-visitor.destroy');
});



    //Function CKEditor
    Route::post('ckeditor/upload', [App\Http\Controllers\CKEditorController::class, 'upload'])->name('ckeditor.upload');
});

require __DIR__ . '/auth.php';
