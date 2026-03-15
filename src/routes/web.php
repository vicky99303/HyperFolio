<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Models\Project;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    $projects = App\Models\Project::latest()->paginate(8);
    return view('home', compact('projects'));
});
Route::get('/about', function () { return view('about'); });
Route::get('/skills', function () { return view('skills'); });

Route::resource('projects', ProjectController::class);

Route::get('/contact', function () { return view('contact'); });
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');