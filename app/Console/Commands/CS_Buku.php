<?php

namespace App\Console\Commands;

use App\Imports\BukuImport;
use App\Models\Buku;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Console\Command;

class CS_Buku extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importDataBuku';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Buku::truncate();  
        Excel::import(new BukuImport, public_path('/file_import/DATA_BUKU.xlsx'));
    }
}
