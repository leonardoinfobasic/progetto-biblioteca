<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/books', function () {
    $books = DB::table('books')->join('authors', 'books.author_id', '=', 'authors.id')
        ->select('books.id', 'books.title', 'authors.name as author', 'books.available', 'books.image_url')
        ->get();
    
    return view('pages.books', ['books' => $books]);
});

Route::get('/books/{id}', function ($id) {
    $book = DB::table('books')
        ->join('authors', 'books.author_id', '=', 'authors.id')
        ->where('books.id', $id)
        ->select('books.id', 'books.title', 'authors.name as author', 'books.available', 'books.image_url', 'books.plot')
        ->first();

    if (!$book) {
        abort(404);
    }

    return view('pages.booksid', ['book' => $book]);
});

Route::get('/authors', function () {
    $authors = DB::table('authors')->get();
    
    return view('pages.authors.index', ['authors' => $authors]);
});

Route::get('/loans', function () {
    $loans = DB::table('loans')
        ->join('books', 'loans.book_id', '=', 'books.id')
        ->select('loans.id', 'books.title', 'loans.loan_date', 'loans.return_date')
        ->get();

    return view('pages.loans', ['loans' => $loans]);
});

Route::get('/loans/create', function () {
    $books = DB::table('books')->where('available', true)->get();
    return view('pages.create', ['books' => $books]);
})->name('loans.create');

Route::post('/loans', function (Request $request) {
    DB::table('loans')->insert([
        'book_id' => $request->book_id,
        'loan_date' => now(),
        'return_date' => null,
    ]);

    // Segna il libro come non disponibile
    DB::table('books')->where('id', $request->book_id)->update(['available' => false]);

    return redirect('/loans');
});

Route::put('/loans/{id}/return', function ($id) {
    DB::table('loans')->where('id', $id)->update(['return_date' => now()]);

    // Rendi il libro disponibile di nuovo
    $bookId = DB::table('loans')->where('id', $id)->value('book_id');
    DB::table('books')->where('id', $bookId)->update(['available' => true]);

    return redirect('/loans');
})->name('loans.return');
