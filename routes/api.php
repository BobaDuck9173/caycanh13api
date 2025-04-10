<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;

// Add CORS headers to the /sanpham endpoint
Route::get('/sanpham', function (Request $request) {
    // Set CORS headers
    header('Access-Control-Allow-Origin: https://caycanh13-git-main-bobaducks-projects.vercel.app');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');
    
    // Call the original controller method
    return app()->call([new SanPhamController(), 'index']);
});

// Handle OPTIONS preflight requests
Route::options('/sanpham', function() {
    return response('', 200)
        ->header('Access-Control-Allow-Origin', 'https://caycanh13-git-main-bobaducks-projects.vercel.app')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Origin, Authorization');
});