<?php

use App\Http\Controllers\TdatasController;
use App\Models\Tdatum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    // request()->validate([
    //     'name' => 'required',
    //     'cr_num' => 'required',
    // ],[
    //     'required' => 'Both name and certificate number are required'
    // ]);
    $data = null;
    if (request()->has('name') && request()->has('cr_num'))
    $data = Tdatum::query()->where('certificate_num',request()->query('cr_num'))->orWhere('name', request()->query('name'))->first();
    // $data = Tdatum::query()->where('name', 'like', '%'.request()->query('name').'%')->where('certificate_num', 'like', '%'.request()->query('cr_num').'%')->first();
    return view('welcome', compact('data'));
});

\Illuminate\Support\Facades\Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home',function () {
    return redirect()->route('tdatas.index');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('tdatas', TdatasController::class);
    Route::get('tdata/excel',[TdatasController::class,'excel'])->name('tdatas.excel');
    Route::post('tdata/excel-upload',[TdatasController::class,'excelUpload'])->name('tdatas.excel.upload');
});