<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiContactController;
use App\Http\Controllers\Api\ApiResponseController;
use App\Http\Controllers\Api\ApiVolunteerController;
use App\Http\Controllers\Api\ApiStatisticsController;
use App\Http\Controllers\Api\ApiApplicationController;

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

Route::post('/generate_token/{id}', function (Request $request, $id) {
    $user = User::find($id);
    if ($user) {
        $token = $user->createToken('token-name')->plainTextToken;
        return response()->json(['token' => $token], 200);
    } else {
        return response()->json(['message' => 'User not found.'], 404);
    }
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/blogs', [ApiResponseController::class, 'blogs']);

    Route::get('/videos', [ApiResponseController::class, 'videos'])->name('videos.index');
    Route::get('/partners', [ApiResponseController::class, 'partners']);
    
    Route::post('applications', [ApiApplicationController::class, 'store'])->name('applications.store');
    Route::post('volunteers', [ApiVolunteerController::class, 'store']);
    Route::post('contacts', [ApiContactController::class, 'store']);
    
    Route::put('/applications/archive/{application}', [ApiApplicationController::class, 'archive'])->name('applications.archive');
    
    Route::get('allApplications', [ApiStatisticsController::class, 'allApplications'])->name('api.allApplications');
    Route::get('activeApplications', [ApiStatisticsController::class, 'activeApplications'])->name('api.activeApplications');
    Route::get('completedDonations', [ApiStatisticsController::class, 'completedDonations'])->name('api.completedDonations');
    Route::get('partnersCount', [ApiStatisticsController::class, 'partnersCount'])->name('api.partnersCount');
    
});
