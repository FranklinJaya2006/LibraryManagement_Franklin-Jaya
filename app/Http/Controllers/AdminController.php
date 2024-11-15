<?php
namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Method untuk menampilkan librarian
    public function showLibrarians()
    {
        // Ambil data librarian
        $librarians = Pengguna::where('role', 'librarian')->get();

        // Cek jika data librarian kosong
        if ($librarians->isEmpty()) {
            return view('admin')->with('error', 'Tidak ada librarian yang terdaftar.');
        }

        return view('admin', compact('librarians'));
    }

    // Method untuk menghapus librarian
    public function deleteLibrarian($id)
    {
        // Cek jika librarian ada
        $librarian = Pengguna::findOrFail($id);
        
        // Hapus librarian
        $librarian->delete();

        return redirect()->route('admin')->with('success', 'Librarian berhasil dihapus');
    }
}
