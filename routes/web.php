<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ClientController;

// ---------------------- DASHBOARD ----------------------
// Route::get('/', fn() => safe_view('pages.admin.login'));

Route::get('/', function () {
    return redirect('/admin/login');
});

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// protected admin routes
Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('pages.admin.dashboard'); // create this view if not present
    })->name('admin.dashboard');

    // Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});
// new client
Route::get('/admin/new', function () {
    return view('pages.admin.newclient');
});

Route::get('/debtors/debtor-form', function () {
    return view('pages.admin.debtorForm');
});

Route::get('/agent/agent-form', function () {
    return view('pages.admin.agentform');
});


// new client table
Route::get('/clients/create', [ClientController::class,'create']);
Route::post('/clients/store', [ClientController::class,'store'])->name('clients.store');

// ---------------------- HELPER FUNCTION ----------------------
// if (!function_exists('safe_view')) {
//     function safe_view($viewPath) {
//         if (View::exists($viewPath)) {
//             return view($viewPath);
//         }
//         return view('pages.error-pages.error-404');
//     }
// }

// ---------------------- BASIC UI ----------------------
// Route::prefix('basic-ui')->group(function () {
//     $pages = ['accordions','buttons','badges','breadcrumbs','dropdowns','modals','progress-bar','pagination','tabs','typography','tooltips'];
//     foreach($pages as $page){
//         Route::get($page, fn() => safe_view("pages.basic-ui.$page"));
//     }
// });

// ---------------------- ADVANCED UI ----------------------
// Route::prefix('advanced-ui')->group(function () {
//     $pages = ['dragula','clipboard','context-menu','popups','sliders','carousel','loaders','tree-view'];
//     foreach($pages as $page){
//         Route::get($page, fn() => safe_view("pages.advanced-ui.$page"));
//     }
// });

// ---------------------- FORMS ----------------------
// Route::prefix('forms')->group(function () {
//     $pages = ['basic-elements','advanced-elements','dropify','form-validation','step-wizard','wizard'];
//     foreach($pages as $page){
//         Route::get($page, fn() => safe_view("pages.forms.$page"));
//     }
// });

// ---------------------- EDITORS ----------------------
// Route::prefix('editors')->group(function () {
//     $pages = ['text-editor','code-editor'];
//     foreach($pages as $page){
//         Route::get($page, fn() => safe_view("pages.editors.$page"));
//     }
// });

// ---------------------- CHARTS ----------------------
// Route::prefix('charts')->group(function () {
//     $pages = ['chartjs','morris','flot','google-charts','sparklinejs','c3-charts','chartist','justgage'];
//     foreach($pages as $page){
//         Route::get($page, fn() => safe_view("pages.charts.$page"));
//     }
// });

// ---------------------- TABLES ----------------------
// Route::prefix('tables')->group(function () {
//     $pages = ['basic-table','data-table','js-grid','sortable-table'];
//     foreach($pages as $page){
//         Route::get($page, fn() => safe_view("pages.tables.$page"));
//     }
// });

// ---------------------- NOTIFICATIONS ----------------------
Route::get('notifications', fn() => safe_view('pages.notifications.index'));

// ---------------------- ICONS ----------------------
Route::prefix('icons')->group(function () {
    $pages = ['material','flag-icons','font-awesome','simple-line-icons','themify'];
    foreach($pages as $page){
        Route::get($page, fn() => safe_view("pages.icons.$page"));
    }
});

// ---------------------- MAPS ----------------------
// Route::prefix('maps')->group(function () {
//     $pages = ['vector-map','mapael','google-maps'];
//     foreach($pages as $page){
//         Route::get($page, fn() => safe_view("pages.maps.$page"));
//     }
// });

// ---------------------- USER PAGES ----------------------
// Route::prefix('user-pages')->group(function () {
//     $pages = ['login','login-2','multi-step-login','register','register-2','lock-screen'];
//     foreach($pages as $page){
//         Route::get($page, fn() => safe_view("pages.user-pages.$page"));
//     }
// });

// ---------------------- ERROR PAGES ----------------------
// Route::prefix('error-pages')->group(function () {
//     $pages = ['error-404','error-500'];
//     foreach($pages as $page){
//         Route::get($page, fn() => safe_view("pages.error-pages.$page"));
//     }
// });

// ---------------------- GENERAL PAGES ----------------------
// Route::prefix('general-pages')->group(function () {
//     $pages = ['blank-page','landing-page','profile','email-templates','faq','faq-2','news-grid','timeline','search-results','portfolio','user-listing'];
//     foreach($pages as $page){
//         Route::get($page, fn() => safe_view("pages.general-pages.$page"));
//     }
// });

// ---------------------- ECOMMERCE ----------------------
// Route::prefix('ecommerce')->group(function () {
//     $pages = ['invoice','invoice-2','pricing','product-catalogue','project-list','orders'];
//     foreach($pages as $page){
//         Route::get($page, fn() => safe_view("pages.ecommerce.$page"));
//     }
// });

// ---------------------- CLEAR CACHE ----------------------
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// ---------------------- CATCH-ALL ROUTE ----------------------
// Route::any('/{page?}', fn($page = null) => safe_view("pages.$page"))
//     ->where('page', '.*');
