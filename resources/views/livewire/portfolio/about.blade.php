@extends('layouts.app')
@php
    $user = \App\Models\User::first();
@endphp
@section('content')
    <div class="relative min-h-screen overflow-hidden font-mono text-white bg-[#011627]">
        @include('components.navbar')
        <div x-data="{ tab: 'bio' }" class="flex h-screen text-sm text-gray-300 bg-[#0f111a] font-mono">
            <!-- Sidebar -->
            <aside class="w-full md:w-64 bg-[#011627] text-white border-r border-gray-700 p-4 flex flex-col gap-4 text-sm">

                <!-- Personal Info -->
                <div x-data="{ open: true }">
                    <button @click="open = !open" class="flex items-center justify-between w-full font-semibold text-left">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v13h18V7H3zm0-4h18v4H3V3z" />
                            </svg>
                            personal-info
                        </div>
                        <span x-text="open ? '▼' : '►'" class="text-xs"></span>
                    </button>
                    <ul x-show="open" class="mt-2 ml-4 space-y-1">
                        <li class="flex items-center gap-1 text-blue-300"><span>📄</span> bio</li>
                        <li class="flex items-center gap-1 text-green-400"><span>📘</span> interests</li>
                        <li class="flex items-center gap-1 text-indigo-300">
                            <span>🎓</span> education
                            <ul class="mt-1 ml-4 space-y-1 text-indigo-200">
                                <li class="flex items-center gap-1"><span>🏫</span> high-school</li>
                                <li class="flex items-center gap-1"><span>🎓</span> university</li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <!-- Contacts -->
                <div>
                    <p class="mb-2 font-semibold text-gray-400 uppercase">contacts</p>
                    <ul class="ml-2 space-y-1">
                        <li class="flex items-center gap-2 text-gray-200">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M16 4H8a4 4 0 00-4 4v8a4 4 0 004 4h8a4 4 0 004-4V8a4 4 0 00-4-4zM8 8h8"></path>
                            </svg>
                            user@gmail.com
                        </li>
                        <li class="flex items-center gap-2 text-gray-200">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path
                                    d="M3 5h2l3.6 7.59a1 1 0 01-.21 1.11l-2.7 2.7a16 16 0 006.59 6.59l2.7-2.7a1 1 0 011.11-.21L19 19v2a1 1 0 01-1 1A17 17 0 013 6a1 1 0 011-1z" />
                            </svg>
                            +3598246359
                        </li>
                    </ul>
                </div>
            </aside>


            <!-- Main Content -->
            <main class="flex flex-col flex-1">
                <!-- Tabs -->
                <div class="flex items-center border-b border-gray-800 text-gray-400 bg-[#161925] px-4 py-2">
                    <div class="flex items-center space-x-2">
                        <span class="text-xs">personal-info</span>
                        <div class="w-1 h-4 bg-orange-400 rounded-sm"></div>
                    </div>
                </div>

                <div class="flex flex-1 overflow-y-auto">
                    <!-- Editor Section -->
                    <section class="w-1/2 p-6 border-r border-gray-800">
                        <pre class="text-sm leading-snug text-gray-300 whitespace-pre-wrap">
/**
 * About me
 * I have 5 years of experience in web
 * development lorem ipsum dolor sit amet,
 * consectetur adipiscing elit, sed do eiusmod
 * tempor incididunt ut labore et dolore
 * magna aliqua. Ut enim ad minim veniam,
 * quis nostrud exercitation ullamco laboris
 * nisi ut aliquip ex ea commodo consequat.
 * Duis aute irure dolor in reprehenderit in
 *
 * Duis aute irure dolor in reprehenderit in
 * voluptate velit esse cillum dolore eu fugiat
 * nulla pariatur. Excepteur sint occaecat
 * officia deserunt mollit anim id est laborum.
 */
                </pre>
                    </section>

                    <!-- Snippet Section -->
                    <section class="w-1/2 bg-[#0f111a] p-6 overflow-y-auto">
                        <h3 class="mb-4 text-xs text-gray-400">// Code snippet showcase:</h3>

                        <div class="p-4 mb-6 border border-gray-700 rounded-md">
                            <div class="flex items-center justify-between mb-2 text-xs text-gray-500">
                                <span>@username • 5 months ago</span>
                                <span>details • ⭐ 3</span>
                            </div>
                            <pre class="overflow-x-auto text-sm text-blue-100">
<span class="text-purple-400">function</span> initializeModelChunk&lt;T&gt;(chunk: ResolvedModelChunk): T {
  <span class="text-blue-400">const</span> value: T = parseModel(chunk._response, chunk._value);
  <span class="text-blue-400">const</span> initializedChunk: InitializedChunk&lt;T&gt; = (chunk: any);
  initializedChunk._status = INITIALIZED;
  initializedChunk._value = value;
  <span class="text-purple-400">return</span> value;
}
</pre>
                        </div>

                        <div class="p-4 border border-gray-700 rounded-md">
                            <div class="flex items-center justify-between mb-2 text-xs text-gray-500">
                                <span>@username • 9 months ago</span>
                                <span>details • ⭐ 0</span>
                            </div>
                            <pre class="overflow-x-auto text-sm text-blue-100">
<span class="text-orange-400">export function</span> parseModelTuple(
  response: Response,
  value: { [key: string]: JSONValue } | ReadonlyArray&lt;JSONValue&gt;
): any {
  const tuple: [mixed, mixed, mixed, mixed] = (value: any);
}
</pre>
                        </div>
                    </section>
                </div>
            </main>
        </div>


        @include('components.footer')
    </div>
@endsection('content')
