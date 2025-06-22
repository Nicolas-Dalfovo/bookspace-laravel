<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalCategories = Category::count();
        $booksRead = Book::where('status', 'read')->count();
        $currentlyReading = Book::where('status', 'reading')->with('category')->latest()->take(5)->get();
        $recentBooks = Book::with('category')->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalBooks',
            'totalCategories', 
            'booksRead',
            'currentlyReading',
            'recentBooks'
        ));
    }
}
