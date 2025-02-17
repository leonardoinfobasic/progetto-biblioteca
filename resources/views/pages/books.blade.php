@extends('layout.app')

@section('content')
    <div class="hero min-h-screen" style="background-image: url('{{ asset('library-book.png') }}');">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Lista Libri</h1>
                <p class="mb-5">Trova i tuoi libri preferiti!</p>
                <div class="flex justify-center items-center mt-10">
                    <a href="#next-section" class="text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 animate-bounce" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7 7 7-7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Barra di ricerca e bottone per aggiungere un nuovo libro --}}
    <div class="flex justify-between items-center p-6">
        <div class="form-control w-full max-w-xs">
            <div class="relative">
                <input type="text" placeholder="Cerca libri..." class="input input-bordered pl-10 w-full" />
                <i class="fa fa-search absolute left-3 top-1/2 transform -translate-y-1/2"></i>
            </div>
        </div>

        <a href="{{ url('/createbooks') }}" class="btn btn-success">+ Aggiungi Libro</a>
    </div>

    {{-- Lista dei libri --}}
    <div id="next-section" class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        @foreach ($books as $book)
            <div class="hero bg-base-200 w-full p-4 m-auto rounded-lg">
                <div class="hero-content flex flex-col lg:flex-row items-start">
                    <img src="{{ $book->image_url ?? 'https://via.placeholder.com/150' }}" alt="{{ $book->title }}" class="w-40 rounded-lg shadow-2xl" />
                    <div class="flex flex-col ml-4">
                        <h1 class="text-3xl font-bold">{{ $book->title }}</h1>
                        <p class="py-4">Autore: {{ $book->author }}</p>
                        <p class="py-2">
                            Stato:
                            @if ($book->available)
                                <span class="text-green-500">Disponibile</span>
                            @else
                                <span class="text-red-500">Non disponibile</span>
                            @endif
                        </p>
                        <a href="{{ url('/books/'. $book->id) }}" class="btn btn-primary">Vedi Dettagli</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection