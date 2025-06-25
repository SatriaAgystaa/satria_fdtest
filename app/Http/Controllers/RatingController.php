<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request, Book $book)
    {
        $request->validate([
            'value' => 'required|integer|min:1|max:5',
        ]);

        $existing = Rating::where('book_id', $book->id)->where('user_id', Auth::id())->first();
        if ($existing) {
            return back()->with('error', 'Kamu sudah memberikan rating untuk buku ini.');
        }

        Rating::create([
            'book_id' => $book->id,
            'user_id' => Auth::id(),
            'value' => $request->value,
        ]);

        return back()->with('success', 'Rating berhasil dikirim.');
    }
}