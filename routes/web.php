<?php

use App\Livewire\CardsPage;
use Illuminate\Support\Facades\Route;

Route::redirect('/login', '/admin/login');

Route::get('/', \App\Livewire\Portfolio\Home::class)->name('portfolio.home');
Route::get('/about', \App\Livewire\Portfolio\About::class)->name('portfolio.about');
Route::get('/contact', \App\Livewire\Portfolio\Contact::class)->name('portfolio.contact');
Route::get('/projects', \App\Livewire\Portfolio\Projects::class)->name('portfolio.projects');
