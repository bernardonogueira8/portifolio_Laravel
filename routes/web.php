<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Livewire\PublicCards;

Route::redirect('/login', '/admin/login');

Route::redirect('/', '/cards');
Route::get('/cards', PublicCards::class);
