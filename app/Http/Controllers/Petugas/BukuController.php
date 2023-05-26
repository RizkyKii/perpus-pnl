<?php

namespace App\Http\Controllers\Petugas;

use App\Exports\BukuExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BukuController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('petugas/buku/index');
    }

    public function bukuexcel()
    {
        return Excel::download(new BukuExport, 'data-buku.xlsx');
    }
}
