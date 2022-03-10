<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AjaxController;
//    dd(Request::ip());
//    $ip = Request::ip();

Route::get('/', [CommentController::class,'index'])->name('home.index');
Route::get('/comment', [AjaxController::class,'all']);


//CREATE
Route::post('/comment', [AjaxController::class,'create']);
//READ
Route::get('/comment/{id}',  [AjaxController::class, 'show']);
//UPDATE
//DELETE
Route::delete('/comment/{id}', [AjaxController::class,'delete']);

Route::get('/info', function () {
    return phpinfo();
});

Route::get('/testmodel', [TestController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/ip', function(){
    //on config change, the docker's mysql ip change
    //call this page to see your ip and set it in the .env
    //file DB_HOST=x.x.x.x
    dd(Request::ip());
    $ip = Request::ip();
    echo $ip;
});

Route::get('/contact', function(){
    $data['cards'] = 3;
    return view('home.contact',$data);
});
