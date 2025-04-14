<?php

use App\Livewire\CardsPage;
use App\Livewire\Portfolio\Contact;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactMessageController;

Route::redirect('/login', '/admin/login');

Route::get('/', \App\Livewire\Portfolio\Home::class)->name('portfolio.home');
Route::get('/about', \App\Livewire\Portfolio\About::class)->name('portfolio.about');
Route::get('/projects', \App\Livewire\Portfolio\Projects::class)->name('portfolio.projects');

Route::get('/contact', Contact::class)->name('portfolio.contact');
