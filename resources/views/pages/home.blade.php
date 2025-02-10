@extends('layout.app')

@section('content')
    <div class="hero min-h-screen" style="background-image: url('{{ asset('library-hero.png') }}');">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Benvenut* nella tua libreria</h1>
                <p class="mb-5">
                    Trova i tuoi libri preferiti e tieni traccia di quelli che hai!
                    I tuoi sogni a portata di mano!
                </p>
                <button class="btn btn-primary"><a href="/books">I tuoi libri</a></button>
            </div>
        </div>
    </div>
@endsection
