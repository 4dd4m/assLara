<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/', function(){
    dd(Request::ip());
    $ip = Request::ip();
    echo $ip;

return view('dashboard');

});
Route::get('/test', [ApiController::class,'index']);

Route::get('/comments', function () {
    //return view('welcome');

    $data['section'] = ['Spelling','Result'];


    $data['comment1'] = [
        "Method, Mathematics and Proper Terminology",
        "The method/methodology has not been justified through presentation of potential alternatives and resulting justification of the selected method on a balanced and well reasoned basis.",
        "The method/methodology is not well reported and there is insufficient detail and description; the reader should be able to follow the reasoning and development and there should be adequate explanation and illustration in relation to the approach adopted.",
        "Important assumptions have not been addressed/stated.",
        "Fundamental flaws in methodology have been noted.",
        "Standard and well accepted approaches have not been adopted, without clear justification for avoiding these.",
        "The presentation of mathematics has clear deficiencies e.g. errors are present; wrong symbols have been used, Greek letters are absent or incorrect, subscripts and/or superscripts are missing; equation layout is flawed.",
        "Important equations/expressions have not been properly numbered in sequence.",
        "Key steps are missing in the development of equations/expressions.",
        "Excessive detail has been included in the development of equations/expressions.",
        "Units or symbols are not consistent with appropriate conventions e.g. such as the SI system of units.",
        "Abbreviations and/or acronyms do not follow normal conventions or have not been explicitly defined at the first mention."];

    $data['comment2'] = [
        "Results and Analysis",
        "Assumptions have not been clearly stated.",
        "There should be some tabular presentation of results.",
        "Graphs or graphical presentation have/has not been used as expected.",
        "The analysis of the results is too trivial in nature and a more detailed analysis was necessary (e.g. no confidence limits have been indicated).",
        "Too much has been read into the results and sweeping conclusions have been made, which are not fully justified.",
        "Statistical analysis aspects are flawed, e.g. they are incorrect, incomplete or inappropriately applied.",
        "There is insufficient discussion of results and it has been wrongly assumed that they speak for themselves.",
        "Anomalies are present in results which have not been properly discussed or commented upon.",
        "Presentation of results involves excessive repetition and an appendix should have been used for the bulk of the material, once the first example(s) had been shown.",
        "Irrelevant material has been included, which does not serve to enhance the presentation of results and/or related analysis.",
    ];

    $data['cards'] = 3;
    return view('home.index', $data);
});

Route::get('/info', function () {
    return phpinfo();
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/contact', function(){
    $data['cards'] = 3;
    return view('home.contact',$data);
});
