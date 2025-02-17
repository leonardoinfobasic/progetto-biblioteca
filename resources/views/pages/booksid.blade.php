@extends('layout.app')

@section('content')
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row">
            <img src="{{ $book->image_url ?? 'https://via.placeholder.com/150' }}" alt="{{ $book->title }}" class="max-w-sm rounded-lg shadow-2xl">
            <div class="ml-4">
                <h1 class="text-5xl font-bold">{{ $book->title }}</h1>
                <p class="py-6">Autore: {{ $book->author }}</p>
                <p class="py-2">
                    Stato:
                    @if ($book->available)
                        <span class="text-green-500">Disponibile</span>
                    @else
                        <span class="text-red-500">Non disponibile</span>
                    @endif
                </p>
                <p class="py-6">Trama: {{$book->plot}}</p>

                <a href="{{ url('/books') }}" class="btn btn-primary">Torna alla lista</a>

            </div>
        </div>
    </div>
@endsection