<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $files = Storage::disk('avatars')->files();

    $public_paths = [];

    foreach($files as $file)
        $public_paths[] = Storage::disk('avatars')->url($file);

    return view('welcome', ['files' => $public_paths]);
});
