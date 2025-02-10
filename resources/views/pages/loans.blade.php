@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Elenco Prestiti</h1>

    <a href="{{ route('loans.create') }}" class="btn btn-primary mb-3">Registra Prestito</a>

    <table class="table">
        <thead>
            <tr>
                <th>Libro</th>
                <th>Data Prestito</th>
                <th>Data Restituzione</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
            <tr>
                <td>{{ $loan->title }}</td>
                <td>{{ $loan->loan_date }}</td>
                <td>{{ $loan->return_date ?? 'Non ancora restituito' }}</td>
                <td>
                    @if (!$loan->return_date)
                    <form action="{{ route('loans.return', $loan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Restituisci</button>
                    </form>
                    @else
                    <button class="btn btn-secondary" disabled>Restituito</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection