@php
    $user = \App\Models\User::first();
@endphp
<footer
    class="absolute bottom-0 flex items-center justify-between w-full px-8 py-4 text-sm text-gray-400 border-t border-gray-700 bg-[#0f111a] flex-auto">
    <div class="flex items-center flex-auto space-x-2">
        <span>Encontre-me em:</span>

        @php
            $social_media = $user->social_media ?? [];
        @endphp

        @if (!empty($social_media['github']))
            <a href="{{ $social_media['github'] }}" target="_blank"
                class="p-1 text-white bg-gray-800 rounded hover:bg-gray-700">
                <i class="fab fa-github"></i>
            </a>
        @endif

        @if (!empty($social_media['linkedin']))
            <a href="{{ $social_media['linkedin'] }}" target="_blank"
                class="p-1 text-white bg-gray-800 rounded hover:bg-gray-700">
                <i class="fab fa-linkedin-in"></i>
            </a>
        @endif

        @if (!empty($social_media['twitter']))
            <a href="{{ $social_media['twitter'] }}" target="_blank"
                class="p-1 text-white bg-gray-800 rounded hover:bg-gray-700">
                <i class="fab fa-twitter"></i>
            </a>
        @endif

        @if (!empty($social_media['instagram']))
            <a href="{{ $social_media['instagram'] }}" target="_blank"
                class="p-1 text-white bg-gray-800 rounded hover:bg-gray-700">
                <i class="fab fa-instagram"></i>
            </a>
        @endif

        @if (!empty($social_media['youtube']))
            <a href="{{ $social_media['youtube'] }}" target="_blank"
                class="p-1 text-white bg-gray-800 rounded hover:bg-gray-700">
                <i class="fab fa-youtube"></i>
            </a>
        @endif
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
