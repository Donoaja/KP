<?php

use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminSaranController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Produk;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/about', function(){
    $about = \App\Models\About::first();
    return view('home.about.index', compact('about'));
});

Route::get('/produk', function(){
    $produks = Produk::latest()->paginate(12);
    return view('home.produk.index', compact('produks'));
});

Route::get('/produk/{id}', function($id){
    $produk = \App\Models\Produk::findOrFail($id);
    return view('home.produk.show', compact('produk'));
});

Route::get('/blog', function(){
    $blogs = \App\Models\Blog::latest()->paginate(6);
    return view('home.blog.index', compact('blogs'));
});

Route::get('/blog/{id}', function($id){
    $blog = \App\Models\Blog::findOrFail($id);
    return view('home.blog.show', compact('blog'));
});

Route::get('/galeri', function(){
    $galeris = \App\Models\Galeri::latest()->paginate(12);
    return view('home.galeri.index', compact('galeris'));
});

Route::get('/galeri/{id}', function($id){
    $galeri = \App\Models\Galeri::findOrFail($id);
    return view('home.galeri.show', compact('galeri'));
});

Route::get('/contact', function(){
    return view('home.contact.index');
});
Route::post('/contact', [App\Http\Controllers\HomeController::class, 'submitContact'])->name('contact.submit');

// Route login manual
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended('/admin/dashboard');
    }
    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->withInput();
})->middleware('guest');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// =======ADMIN=======
Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    });

    Route::resource('/user', AdminUserController::class);
    Route::resource('/blog', App\Http\Controllers\AdminBlogController::class);
    Route::resource('/galeri', App\Http\Controllers\AdminGaleriController::class);
    Route::resource('/banner', App\Http\Controllers\AdminBannerController::class);
    Route::resource('/testimoni', App\Http\Controllers\AdminTestimoniController::class);
    Route::resource('/pesan', App\Http\Controllers\AdminPesanController::class);
    Route::resource('/produk', App\Http\Controllers\AdminProdukController::class);
    Route::resource('/about', App\Http\Controllers\AdminAboutController::class);
});

Route::get('/home', function () {
    return redirect('/admin/dashboard');
});





