@extends('layouts.app')
@php
    $user = \App\Models\User::first();
@endphp
@section('content')
    <div class="relative h-screen overflow-hidden font-mono text-white bg-[#0f111a]">

        @include('components.navbar')
        @include('livewire.project-list')
        @include('components.footer')
    </div>
@endsection('content')
