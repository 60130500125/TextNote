<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/textnote', 'TextNoteController@storeTextNote'); //สร้าง TextNote
Route::post('/textnote/delete', 'TextNoteController@deleteTextNote');// ลบ TextNote
Route::get('/textnote', 'TextNoteController@indexAllTextNote'); // ดู TextNote ทั้งหมด
Route::get('/textnote/{id}', 'TextNoteController@indexTextNote'); // ดู TexNote ตาม Id

Route::post('/user', 'UserManagementController@storeUser'); //สร้าง User
Route::post('/university', 'UserManagementController@storeUniversity'); //สร้าง university
Route::get('/university', 'UserManagementController@indexUniversity'); // ดู unviersity ทั้งหมด
Route::get('/user', 'UserManagementController@indexAllUser'); //ดู User ทั้งหมด
Route::post('/login', 'UserManagementController@login'); //Login

//test
Route::post('/attachment','TextNoteController@storeAttachment');