<?php

use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CaseStudyController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CertificateController;
use App\Http\Controllers\admin\ClientelController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\IndCategoryController;
use App\Http\Controllers\admin\IndustryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ServiceCategoryController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SparePartController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\superAdminController;
use App\Http\Controllers\usersController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

//Front route

Route::get('/', [dashboardController::class, 'index']);

Route::get('/about-us', [dashboardController::class, 'about'])->name('about');

Route::get('/contact', [dashboardController::class, 'contact'])->name('contact');

Route::post('contact-us-store', [dashboardController::class, 'contactstore'])->name('contact.store');

Route::post('/installationstore', [dashboardController::class, 'installationstore'])->name('installationstore');

Route::post('/headerstore', [dashboardController::class, 'headerstore'])->name('headerstore');

Route::post('/product-enquiry', [dashboardController::class, 'productEnquiryStore'])->name('product.enquiry.store');

Route::post('/industry-enquiry', [dashboardController::class, 'industryEnquiryStore'])->name('industry.enquiry.store');

Route::get('blogs', [dashboardController::class, 'blogs'])->name('blogs');

Route::get('blogs/{url}', [dashboardController::class, 'blogsdetail'])->name('blogdetail');

Route::get('products/{url}', [dashboardController::class, 'product'])->name('productlist');

Route::get('downloads', [dashboardController::class, 'download'])->name('downloads');

Route::get('/faqs', [dashboardController::class, 'faq'])->name('faqs');

Route::get('/installation-and-commissioning', [dashboardController::class, 'installation'])->name('installation');

Route::get('/after-sales-support', [dashboardController::class, 'aftersales'])->name('aftersales');

Route::get('/annual-maintenance-contracts', [dashboardController::class, 'annualmaintenance'])->name('annualmaintenance');

Route::get('/downloads', [dashboardController::class, 'download'])->name('downloads');

Route::get('/machine-upgrades', [dashboardController::class, 'machineupgrades'])->name('machineupgrades');

Route::get('/industries/{url}', [dashboardController::class, 'industry'])->name('industry');

Route::get('spare-parts', [dashboardController::class, 'spareparts'])->name('spareparts');
route::get('whatsaapinquiry', [dashboardController::class, 'whatsaapinquiry'])->name('whatsaapinquiry');

Route::get('/privacy-policy', [dashboardController::class, 'privacypolicy'])->name('privacypolicy');

Route::get('/terms-engineer', [dashboardController::class, 'termsengineer'])->name('termsengineer');

Route::get('/product-details/{url?}', [dashboardController::class, 'productdetials'])->name('productdetials');

// START - DYNAMIC SITEMAP ROUTE
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
// END - DYNAMIC SITEMAP ROUTE

Route::get('/get-cities/{id}', function ($id) {

    $cities = DB::table('cities')

        ->where('state_id', $id)

        ->select('name')

        ->get();

    return response()->json($cities);

});

Route::get('/thank-you', function () {

    return view('front.thankyou');

})->name('thankyou');

Route::get('login', [dashboardController::class, 'login'])->name('login');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/user', [usersController::class, 'user'])->name('user');

    Route::get('/admin/dashboard', [dashboardController::class, 'admin'])->name('/admin/dashboard');

    Route::get('/superAdmin', [superAdminController::class, 'superAdmin'])->name('superAdmin');

    Route::get('/admin/dashboard', [adminController::class, 'admin'])->name('admin/dashboard');

    Route::resource('industry', IndustryController::class);

    Route::resource('category', CategoryController::class);

    Route::get('indcategory/list', [IndCategoryController::class, 'index'])
        ->name('indcategory-index');
    
    Route::resource('indcategory', IndCategoryController::class)
        ->except(['index']);

    Route::resource('product', ProductController::class);

    Route::resource('blog', BlogController::class);

    Route::resource('clientel', ClientelController::class);

    Route::resource('casestudy', CaseStudyController::class);

    Route::resource('certificate', CertificateController::class);

    Route::resource('faq', FaqController::class);

    Route::resource('service', ServiceController::class);

    Route::resource('servicecategory', ServiceCategoryController::class);

    Route::resource('sparepart', SparePartController::class);

    Route::prefix('backend')->group(function () {

        // Route::get('home', [adminController::class, 'index'])->name('home');

    });

});
