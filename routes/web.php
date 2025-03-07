<?php
use App\Http\Controllers\AdopsiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CentralizedprofileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ForumpostsController;
use App\Http\Controllers\ForumUserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
// login-logout
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('guest');
Route::get('/blog-guest/{id}', [HomeController::class, 'index_blog'])->name('index-blog')->middleware('auth');
Route::get('/signin', [AuthController::class, 'showSigninPage'])->name('signin')->middleware('guest');
Route::post('/signin', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/signup', [AuthController::class, 'showSignupPage'])->name('signup')->middleware('guest');
Route::post('/signup', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// Route::get('/', [BlogController::class, 'index'])->name('home')->middleware('guest');
// Route::get('/{id}', [BlogController::class, 'index_blog'])->name('index-blog')->middleware('guest');

// contact user
Route::post('/contact',[ContactController::class, 'create_contact'])->name('indext-create-contact')->middleware('guest');
// contact admin
Route::get('/Home', [ContactController::class, 'show_contacts'])->name('show-contacts')->middleware(['auth','admin']);
Route::post('/Home/{id}', [ContactController::class, 'delete_contact'])
    ->name('delete-contact')
    ->middleware(['auth', 'admin']);


// blogs customer
Route::get('/blogs', [BlogController::class, 'search'])->name('show-blogs')->middleware(['auth', 'customer']);


// blogs admin
Route::get('/create-blog', [BlogController::class, 'createshowblog'])->name('show-create-blog')->middleware(['auth', 'admin']);
Route::post('/create-blog', [BlogController::class, 'CreateBlog'])->name('create-blog')->middleware(['auth', 'admin']);
Route::get('/crud-blogs',[BlogController::class, 'showupdate'])->name('crud-blog')->middleware(['auth', 'admin']);
Route::get('/blogs/edit/{id}',[BlogController::class, 'updateblog'])->name('update-blog')->middleware(['auth', 'admin']);
Route::put('/blogs/update/{id}', [BlogController::class, 'update'])->name('blogs.update')->middleware(['auth', 'admin']);
Route::get('/blogs/delete/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy')->middleware(['auth', 'admin']);

// adopsi
Route::get('/adopsi', [AdopsiController::class,'makeadoption'])->name('adopsi')->middleware('auth');
Route::get('/Form_Adopsi/{i}', [AdopsiController::class,'viewformuliradopsi'])->middleware('auth');
Route::post('/adopsi',[AdopsiController::class,'search'])->middleware('auth');
Route::post('/buatadopsi',[AdopsiController::class,'createadopsi'])->middleware('auth');
Route::get('/buatadopsi',function(){
    return view('buatadopsi');
})->middleware('auth');

Route::post('/profiladopsi',[CentralizedprofileController::class,'profileAdopt'])->middleware('auth');
Route::get('/profile',[CentralizedprofileController::class,'viewProfile'])->name('profile')->middleware('auth');
Route::get('/deleteforum/{i}',[ForumController::class,'DeleteForum'])->middleware('auth');
Route::get('/deleteadopsi/{i}',[AdopsiController::class,'delete'])->middleware('auth');
// routes/web.php
Route::get('/editadopsi/{id}', [AdopsiController::class, 'showEdit'])
    ->middleware('auth')
    ->name('adopsi.edit');
Route::post('/editadopsi/{id}', [AdopsiController::class, 'update'])->middleware('auth');

// forums
Route::get('/forums', [ForumController::class,'generalforumview'])->name('forum')->middleware('auth');
Route::post('/forumpost/{i}',[ForumpostsController::class,'InputHandler'])->middleware('auth');
Route::post('/createforum',[ForumController::class,'inputhandler'])->middleware('auth');
Route::get('/createforum',function(){
    return view('newforum');
})->name('newforum')->middleware('auth');
Route::get('/forumpost/{i}',[ForumpostsController::class,'ReturnView'])->middleware('auth');
Route::post('/forums',[ForumController::class,'search'])->middleware('auth');
Route::get('/deleteforum/{i}',[ForumController::class,'DeleteForum'])->middleware('auth');

