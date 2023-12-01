<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::GET('api/posts', [PostController::class,'index']); /// la ruta debe quedar: GET api/posts
// Route::post('api/posts/create', [PostController::class,'store']);//              : POST api/posts 
// Route::put('api/posts/{post}', [PostController::class,'update']);//              : PUT api/posts/{post}
// Route::get('api/posts/{post}', [PostController::class,'show']);//                : GET api/posts/{post}
// Route::delete('api/posts/{post}', [PostController::class,'destroy']);//          : DELETE api/posts/{post}

Route::apiResource('posts', PostController::class);


// Route::get('categories', [CategoryController::class,'index']);
// Route::post('categories/create', [CategoryController::class,'store']);
// Route::put('categories/{category}', [CategoryController::class,'update']);
// Route::get('categories/{category}', [CategoryController::class,'show']);
// Route::delete('categories/{category}', [CategoryController::class,'destroy']);

Route::apiResource('categories', CategoryController::class);

// ApiResource crea este directorio de rutas
// GET|HEAD        api/posts ...................... posts.index › Api\PostController@index
// POST            api/posts ...................... posts.store › Api\PostController@store
// GET|HEAD        api/posts/{post} ................. posts.show › Api\PostController@show
// PUT|PATCH       api/posts/{post} ............. posts.update › Api\PostController@update
// DELETE          api/posts/{post} ........... posts.destroy › Api\PostController@destroy
