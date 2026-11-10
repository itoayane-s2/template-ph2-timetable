<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimetableController;


//授業の一覧ページ
Route::get('/timetable', [TimetableController::class, 'index']);

// 授業の詳細ページ
Route::get('/timetable/{id}', [TimetableController::class, 'show']);