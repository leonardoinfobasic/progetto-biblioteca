@extends('layout.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-6">Registra un Prestito</h1>

    <div class="card bg-base-200 p-6 max-w-lg mx-auto">
        <form action="/loans" method="POST">
            @csrf
            
            <div class="form-control mb-4">
                <label class="label">
                    <span class="label-text">Seleziona il libro</span>
                </label>
                <select name="book_id" class="select select-bordered w-full">
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary w-full">Conferma Prestito</button>
            </div>
        </form>
    </div>
</div>
@endsection