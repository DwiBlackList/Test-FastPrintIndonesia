<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Status;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        // $query = Produk::query()->where('status_id', 1);
        $query = Produk::query()->whereHas('status', function ($query) {
            $query->where('nama_status', 'bisa dijual');
        });

        if ($request->filled('search')) {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('kategori_filter')) {
            $query->where('kategori_id', $request->kategori_filter);
        }

        $produks = $query->paginate(9);
        $kategoris = Kategori::all();

        return view('welcome', compact('produks', 'kategoris'));
    }
}
