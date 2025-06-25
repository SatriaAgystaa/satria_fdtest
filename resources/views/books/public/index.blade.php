<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center border-b-2 border-indigo-500 pb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
            </svg>
            <h2 class="text-md font-medium text-gray-800">
                Buku Publik
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-4xl px-4 sm:px-0 py-8">
                <div class="mb-8">
                    <h1 class="text-2xl sm:text-3xl font-bold mb-2 animate-fade-in">
                        @auth
                        Selamat datang, <span class="text-indigo-600 underline-animation">{{ Auth::user()->name }}</span>!
                        @else
                        Selamat datang, <span class="text-indigo-600">Guest</span>!
                        @endauth
                    </h1>
                    
                    <p class="text-gray-700 text-base sm:text-lg mb-4 transition-all duration-300 hover:text-gray-800">
                        Temukan berbagai macam buku menarik dari koleksi kami. Mulai dari karya klasik hingga terbitan terbaru, 
                        semua tersedia untuk Anda jelajahi.
                    </p>
                    
                    <div class="flex items-center gap-3">
                        <p class="text-indigo-600 font-medium flex items-center">
                            <span class="bg-indigo-100 px-3 py-1 rounded-full animate-pulse flex items-center text-sm sm:text-base">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 animate-[swing_2s_ease-in-out_infinite]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                {{ $books->total() }} buku tersedia
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <form method="GET" class="mb-8 px-4 sm:px-0">
                <div class="flex flex-wrap items-center gap-4">
                    <div class="relative w-full sm:flex-grow sm:max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input type="text" name="author" value="{{ request('author') }}" placeholder="Cari penulis..."
                            class="pl-10 w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-600 focus:ring-indigo-600">
                    </div>

                    <div class="relative w-full sm:w-auto">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="date" name="uploaded_at" value="{{ request('uploaded_at') }}" 
                            class="pl-10 w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-600 focus:ring-indigo-600">
                    </div>

                    <select name="rating" class="w-full sm:w-auto border-gray-300 rounded-lg shadow-sm focus:border-indigo-600 focus:ring-indigo-600">
                        <option value="">Semua Rating</option>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>
                                {{ $i }} Bintang
                            </option>
                        @endfor
                    </select>

                    <select name="sort_by" class="w-full sm:w-auto border-gray-300 rounded-lg shadow-sm focus:border-indigo-600 focus:ring-indigo-600">
                        <option value="newest" {{ request('sort_by', 'newest') === 'newest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="oldest" {{ request('sort_by') === 'oldest' ? 'selected' : '' }}>Terlama</option>
                    </select>

                    <div class="flex space-x-3 w-full sm:w-auto">
                        <button type="submit" class="inline-flex items-center justify-center w-full sm:w-auto px-4 py-2 bg-gradient-to-r from-indigo-500 to-indigo-600 border border-transparent rounded-lg text-white hover:from-indigo-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-sm transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Filter
                        </button>
                        <a href="{{ route('books.public.index') }}" class="inline-flex items-center justify-center w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Reset
                        </a>
                    </div>
                </div>
            </form>

            @if($books->isEmpty())
                <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-200 text-center mx-4 sm:mx-0">
                    <p class="text-gray-600">Belum ada buku tersedia.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4 sm:px-0">
                    @foreach ($books as $book)
                    <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-200 flex flex-col h-full">
                        @if($book->thumbnail)
                            <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="{{ $book->title }}" 
                                 class="h-48 w-full object-cover">
                        @else
                            <div class="h-48 bg-gray-100 flex items-center justify-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                        
                        <div class="p-4 sm:p-6 flex flex-col flex-grow">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-2 line-clamp-1">{{ $book->title }}</h3>
                            <p class="text-xs sm:text-sm text-gray-600 mb-3">Penulis: {{ $book->author }}</p>
                            
                            <div class="flex items-center mb-3 -mx-0.5">
                                <div class="text-yellow-400 text-lg">
                                    @php
                                        $fullStars = floor($book->average_rating ?? 0);
                                        $emptyStars = 5 - $fullStars;
                                    @endphp
                                    @for($i = 0; $i < $fullStars; $i++)
                                        <span class="">★</span>
                                    @endfor
                                    @for($i = 0; $i < $emptyStars; $i++)
                                        <span class="">☆</span>
                                    @endfor
                                </div>
                                <span class="text-xs text-gray-500 ml-1">
                                    ({{ number_format($book->average_rating ?? 0, 1) }})
                                </span>
                            </div>
                            
                            <div class="mt-auto space-y-2">
                                <p class="text-xs text-gray-500 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $book->created_at->translatedFormat('d M Y') }}
                                </p>
                                
                                <p class="text-xs text-gray-500 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    {{ Str::limit($book->user->name, 20) }}
                                </p>
                                
                                <a href="{{ route('books.public.show', $book) }}" 
                                   class="block w-full text-center mt-3 inline-flex items-center justify-center px-3 py-2 sm:px-4 sm:py-2 bg-gradient-to-r from-indigo-500 to-indigo-600 border border-transparent rounded-lg font-semibold text-white text-xs hover:from-indigo-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif

            @if($books->hasPages())
                <div class="mt-8 px-4 sm:px-0">
                    <nav class="flex flex-col sm:flex-row items-center justify-between border-t border-gray-200 pt-6 space-y-4 sm:space-y-0">
                        <div class="text-sm text-gray-600">
                            <span class="font-medium">{{ $books->firstItem() }}-{{ $books->lastItem() }}</span> dari <span class="font-medium">{{ $books->total() }}</span> buku
                        </div>
                        
                        <div class="flex items-center space-x-2 sm:space-x-3">
                            @if ($books->onFirstPage())
                                <span class="inline-flex items-center px-2 sm:px-3 py-1 rounded-lg border border-gray-300 bg-gray-100 text-gray-400 cursor-not-allowed">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </span>
                            @else
                                <a href="{{ $books->previousPageUrl() }}" class="inline-flex items-center px-2 sm:px-3 py-1 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </a>
                            @endif

                            @foreach ($books->getUrlRange(max(1, $books->currentPage() - 1), min($books->lastPage(), $books->currentPage() + 1)) as $page => $url)
                                @if ($page == $books->currentPage())
                                    <span class="px-2 sm:px-3 py-1 rounded-lg border border-indigo-500 bg-indigo-50 text-indigo-600 font-medium">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="px-2 sm:px-3 py-1 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach

                            @if ($books->hasMorePages())
                                <a href="{{ $books->nextPageUrl() }}" class="inline-flex items-center px-2 sm:px-3 py-1 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            @else
                                <span class="inline-flex items-center px-2 sm:px-3 py-1 rounded-lg border border-gray-300 bg-gray-100 text-gray-400 cursor-not-allowed">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </span>
                            @endif
                        </div>
                    </nav>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>