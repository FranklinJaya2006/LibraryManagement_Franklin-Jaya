<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Cd;
use App\Models\Jurnal;
use App\Models\Newspaper;
use App\Models\Skripsi;
use Illuminate\View\View;

class Library extends Controller
{
    public function filter(Request $request)
    {
        $kategori = $request->input('kategori');
        $sortOrder = $request->input('sortOrder', 'asc'); // Default sorting

        $items = [];
        $fields = [];
        $message = "Pilih kategori untuk memfilter data";

        // Filter data berdasarkan kategori dan sesuaikan atributnya
        switch ($kategori) {
            case 'book':
                $items = Book::orderBy('title', $sortOrder)->get();
                $fields = ['title', 'description', 'author', 'thn_terbit', 'jml_halaman'];
                $message = "Menampilkan Buku";
                break;
            case 'jurnal':
                $items = Jurnal::orderBy('title', $sortOrder)->get();
                $fields = ['title', 'description', 'author', 'thn_terbit', 'jml_halaman'];
                $message = "Menampilkan Jurnal";
                break;
            case 'cd':
                $items = Cd::orderBy('title', $sortOrder)->get();
                $fields = ['title', 'artist', 'genre', 'thn_terbit'];
                $message = "Menampilkan CD";
                break;
            case 'newspaper':
                $items = Newspaper::orderBy('title', $sortOrder)->get();
                $fields = ['title', 'publisher', 'category', 'thn_terbit'];
                $message = "Menampilkan Surat Kabar";
                break;
            case 'skripsi':
                $items = Skripsi::orderBy('title', $sortOrder)->get();
                $fields = ['title', 'author', 'pages', 'university', 'thn_terbit'];
                $message = "Menampilkan Skripsi";
                break;
        }

        return view('hasil', compact('items', 'message', 'kategori', 'sortOrder', 'fields'));
    }
}
