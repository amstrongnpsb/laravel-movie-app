<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyFilmController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FavoriteFilmController;




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
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});
Route::get('/home', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/data', [FilmController::class, 'index']);
Route::get('detail/{film:slug}', [FilmController::class, 'detail']);

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => "Dashboard",
        'active' => "dashboard",
        'sidebar' => "active"
    ]);
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'create']);
// middleware auth , halaman hanya dapat diakses oleh user yg telah login

Route::get('/dashboard/myfilm/slugGenerate', [MyFilmController::class, 'slugGenerate'])->middleware('auth');
Route::resource('/dashboard/myfilm', MyFilmController::class)->middleware('auth');
Route::resource('/dashboard/favoritefilm', FavoriteFilmController::class)->middleware('auth');

// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('data', [
//         "header" => "Film group by Category: $category->name",
//         "title" => $category->name,
//         "active" => "film",
//         "films" => $category->film->load('category', 'director'),
//         "category" => $category->name

//     ]);
// });
// Route::get('/directors/{director:director_slug}', function (Director $director) {
//     return view('data', [
//         "header" => "Film group by Director: $director->name",
//         "title" => $director->name,
//         "active" => "film",
//         "films" => $director->film->load('category', 'director'), //memanggil fungsi film yg merelasi director dengan film 
//         "director" => $director->name

//     ]);
// });
Route::get('/categories', function () {
    return view('categories', [
        "title" => 'Genre',
        "active" => "genre",
        "categories" => Category::all()

    ]);
});

// Route::get('/categories/{category:slug}', [FilmController::class, 'index']);

// Route::get('detail/{slug}', function ($slug) {
//     return view('detail', [
//         "title" => "Detail",
//         "detail" => Film::getDetailFilm($slug)
//     ]);
// });
