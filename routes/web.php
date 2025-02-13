<?php

use App\Livewire\CardsPage;
use Illuminate\Support\Facades\Route;

Route::redirect('/login', '/admin/login');
Route::redirect('/', '/cards');

Route::get('cards', CardsPage::class);
