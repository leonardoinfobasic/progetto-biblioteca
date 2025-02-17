@extends('layout.app')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
    <h1 class="text-3xl font-bold text-center mb-6">Aggiungi un Nuovo Libro</h1>

    @if ($errors->any())
        <div class="alert alert-error p-4 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="form-control">
            <label class="label font-semibold" for="title">Titolo</label>
            <input type="text" name="title" id="title" class="input input-bordered w-full" required>
        </div>

        <div class="form-control">
            <label class="label font-semibold" for="author">Autore</label>
            <input type="text" name="author" id="author" class="input input-bordered w-full" required>
        </div>

        <div class="form-control">
            <label class="label font-semibold" for="image_url">URL Immagine</label>
            <input type="url" name="image_url" id="image_url" class="input input-bordered w-full">
        </div>

        <div class="form-control">
            <label class="label font-semibold" for="plot">Trama</label>
            <textarea name="plot" id="plot" rows="3" class="textarea textarea-bordered w-full resize-none"></textarea>
        </div>

        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text font-semibold">Disponibile</span> 
                <input type="checkbox" name="available" id="available" class="toggle toggle-primary" checked>
            </label>
        </div>

        <button type="submit" class="btn btn-primary w-full">Salva Libro</button>
    </form>
</div>
@endsection