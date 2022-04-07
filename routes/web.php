<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [CommentController::class,'index'])->name('Home');

//CRUD RELATED----------------------------------------
//CREATE
Route::post('/comment', [AjaxController::class,'create']);
//READ 1
Route::get('/comment/{id}',  [AjaxController::class, 'show']);
//READ SOME
Route::get('/comment/cat/{id}',  [AjaxController::class, 'getCommentsByStructureId']);
//READ ALL
Route::get('/comment', [AjaxController::class,'all']);
//UPDATE
Route::patch('/comment/{id}',  [AjaxController::class, 'update']);
//DELETE
Route::delete('/comment/{id}', [AjaxController::class,'delete']);
//CRUD RELATED----------------------------------------
//

Route::get('/lastcomment', [AjaxController::class,'lastComment']);


Route::post('/toggleApprove', [AjaxController::class,'toggleApprove']);

Route::get('/ip', function(){
    //on config change, the docker's mysql ip change
    //call this page to see your ip and set it in the .env
    //file DB_HOST=x.x.x.x
    dd(Request::ip());
});

Route::get('/contact', function(){
    $data['cards'] = 3;
    return view('home.contact',$data);
});

require __DIR__.'/auth.php';


Route::get('/isAuth',  [CommentController::class, 'isAuth']);

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth'])->name('dashboard');
