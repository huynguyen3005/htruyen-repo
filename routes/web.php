<?php
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ComicController;
use App\Http\Controllers\Admin\SitemapController;
use App\Http\Controllers\Auth\FaceBookController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Client\ComicController as ClientComicController;
use App\Http\Controllers\Client\ChapterController as ClientChapterController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\UserController as ClientUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');

    // Auth controllers
    Route::get('/login', [ClientUserController::class, 'login'])->name('login');
    Route::post('/login', [ProfileController::class, 'login'])->name('loginverify');
    Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');
    Route::get('/signup', [RegisteredUserController::class, 'create'])->name('signup');
    Route::post('/signup', [RegisteredUserController::class, 'store'])->name('signupverify');
    Route::get('/google-auth', [GoogleController::class, 'loginCallback']);
    Route::get('/auth/facebook', [FaceBookController::class, 'getFacebookSignInUrl'])->name('facebookLogin');
    Route::get('/auth/facebook/login', [FaceBookController::class, 'loginCallback']);

    Route::get('/danh-sach/{slug}', function ($slug) {
        return redirect("/truyen-tranh/{$slug}", 301);
    });

    Route::get('/danh-sach', function ($slug) {
        return redirect("/truyen-tranh", 301);
    });

    Route::get('/danh-sach/{comic}/{name}', function ($slug) {
        return redirect("truyen-tranh/{comic}/{name}", 301);
    });
    
    // Client comics page controllers
    Route::get('/truyen-tranh', [ClientComicController::class, 'list'])->name('list-comics');
    Route::get('/truyen-tranh/{slug}', [ClientComicController::class, 'show'])->name('comic');
    Route::get('/truyen-tranh/{comic}/{name}', [ClientChapterController::class, 'show'])->name('chapter');
    Route::post('/comic/update-view', [ClientComicController::class, 'updateView'])->name('comic.update-view');
    Route::get('/search', [ClientComicController::class, 'search'])->name('comic.search');
    Route::get('/lich-su', [ClientComicController::class, 'history'])->name('comic.history');

    // Top comics
    Route::get('/top-ngay', [ClientComicController::class, 'topDay'])->name('comic.topday');
    Route::get('/top-tuan', [ClientComicController::class, 'topWeek'])->name('comic.topweek');
    Route::get('/top-thang', [ClientComicController::class, 'topMonth'])->name('comic.topmonth');
    Route::get('/top-views', [ClientComicController::class, 'topViews'])->name('comic.topviews');
});

// Admin routers
Route::prefix('backend')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');
    Route::get('/fectchAllCatrgories', [CategoryController::class, 'fetchAndStoreCategories'])->name('admin.fetchAndStoreCategories');
    Route::get('/fectchAllComics', [ComicController::class, 'fetchAndStoreStories'])->name('admin.fetchAndStoreStories');
    Route::get('/fectchAllComicsDescription', [ComicController::class, 'fetchStoriesDescription'])->name('admin.fetchStoriesDescription');
    Route::get('/update-metakeywords', [ComicController::class, 'UpdateMetaKeywords'])->name('admin.UdMetaKeywords');

    Route::get('/generate-sitemap', [SitemapController::class, 'generateSitemap'])->name('admin.generateSitemap');

});



Route::fallback(function () {
    return response()->view('404', [], 404);
});

Route::get('/test', function () {
    return "hello";
});
