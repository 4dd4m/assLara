<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Ajax;
use Illuminate\Support\Facades\Auth;

Route::get('/', CommentController::class)->name('Home');

Route::controller(Ajax::class)->group(function(){
    Route::prefix('comment')->group( function(){
        Route::post('/', 'create');           //C
        Route::get('/{id}', 'show');         //R
        Route::put('/{id}', 'update');      //U
        Route::delete('/','delete');       //D
        Route::get('/', 'index');         //I
    });
});

//Filter By Category
Route::get('/comment/cat/{id}',  [Ajax::class, 'getCommentsByStructureId']);

Route::get('/lastcomment', [AjaxController::class,'lastComment']);
Route::get('/test', [TestController::class,'test']);


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



Route::get('/isAuth',  [AjaxController::class, 'isAuth']);

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
