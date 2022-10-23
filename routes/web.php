<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CategoryController;




Route::get('/',[FrontendController::class,'welcome']);
Route::get('about', [FrontendController::class, 'about'])->name('about');
Route::get('contact',[FrontendController::class,'contact']);
Route::post('contact/insert',[FrontendController::class,'contactinsert'])->name('contact.insert');
Route::get('contact/delete/{id}',[FrontendController::class,'contactdelete'])->name('contact.delete');
Route::get('contact/Forcedelete/{id}',[FrontendController::class,'Force_contactdelete'])->name('contact.Forcedelete');
Route::get('contact/restore/{id}',[FrontendController::class,'restore'])->name('contact.restore');
Route::get('contact/details/{id}',[FrontendController::class,'details'])->name('contact.details');

//Category
Route::get('category',[CategoryController::class,'category'])->name('category');


// Route::get('about',function(){
    // $about_page= "About";
    // $students =["srity","nure","sharmin","orne"];
    // return view('about',[
    //     'about_page'=>$about_page,
    //     'students'=>$students
    // ]);
// });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
