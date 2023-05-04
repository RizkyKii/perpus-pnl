<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // count display
        $count_buku = Buku::count();
        $count_user = User::role('peminjam')->count();
        $count_belum_dipinjam = Peminjaman::where('status', 1)->count();
        $count_sedang_dipinjam = Peminjaman::where('status', 2)->count();
        $count_selesai_dipinjam = Peminjaman::where('status', 3)->count();

        // display buku baru
        $buku = Buku::limit(5)->latest()->get();
        $user = User::role('peminjam')->limit(5)->latest()->get();
        $belum_dipinjam = Peminjaman::where('status', 1)->limit(5)->latest()->get();
        $sedang_dipinjam = Peminjaman::where('status', 2)->limit(5)->latest()->get();
        $selesai_dipinjam = Peminjaman::where('status', 3)->limit(5)->latest()->get();
        
        return view('petugas/dashboard/index', 
            compact(
                'count_buku', 'count_user', 'count_belum_dipinjam', 'count_sedang_dipinjam', 'count_selesai_dipinjam', 
                'buku', 'user','belum_dipinjam', 'sedang_dipinjam', 'selesai_dipinjam'
        ));
    }
}
