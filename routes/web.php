<?php

use App\Livewire\Portfolio\contact;
use Illuminate\Support\Facades\Route;

Route::redirect('/login', '/admin/login');

Route::get('/', \App\Livewire\Portfolio\Home::class)->name('portfolio.home');
Route::get('/about', \App\Livewire\Portfolio\About::class)->name('portfolio.about');
Route::get('/projects', \App\Livewire\Portfolio\Projects::class)->name('portfolio.projects');

Route::get('/contact', contact::class)->name('portfolio.contact');
