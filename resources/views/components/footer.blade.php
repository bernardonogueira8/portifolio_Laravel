@php
    $user = \App\Models\User::first();
@endphp
<footer
    class="absolute bottom-0 flex items-center justify-between w-full px-8 py-4 text-sm text-gray-400 border-t border-gray-700 bg-[#0f111a]">
    <div class="space-x-2">
        <span>Encontre-me em:</span>
        <button class="p-1 bg-gray-800 rounded hover:bg-gray-700"><i class="fab fa-twitter"></i></button>
        <button class="p-1 bg-gray-800 rounded hover:bg-gray-700"><i class="fab fa-facebook-f"></i></button>
    </div>
    <div>
        <a href="{{ $user->social_media['github'] ?? '' }}" class="flex items-center space-x-1">
            <span>{{ $user->username }}</span>
            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                <path d="..." />
            </svg>
        </a>
    </div>

</footer>
