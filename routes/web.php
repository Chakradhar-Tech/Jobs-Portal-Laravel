<?php

use App\Http\Controllers\Jobcontroller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;


Route::get('/', function(Job $jobs){
    return view('home',['jobs'=>$jobs]);
});

Route::view('/contact','contact');

Route::get('/jobs',[JobController::class,'index']);

Route::get('/get-jobs',[Jobcontroller::class, 'getJobs']);

Route::get('/jobs/create',[JobController::class,'create'])->middleware('auth');

Route::post('/ajax-create-jobs',[JobController::class,'ajaxstore'])->middleware('auth');

Route::get('/jobs/{job}',[JobController::class,'show']);

Route::get('/jobs/{job}/edit',[JobController::class,'edit'])
->middleware('auth')
->can('edit','job');

Route::patch('/ajax-update/{job}',[JobController::class,'update']);

Route::delete('/ajax-delete/{job}',[JobController::class,'destroy']);


//Auth

Route::get('/register',[RegisterController::class,'create']);
Route::post('/register',[RegisterController::class,'store']);


Route::get('/login',[SessionController::class,'create'])->name('login');
Route::post('/login',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class,'destroy']);
