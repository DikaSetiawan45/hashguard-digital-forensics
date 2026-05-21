<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseFile;
use App\Models\Evidence;

class ReportController extends Controller
{
    /**
     * Menampilkan halaman laporan global.
     */
    public function index()
    {
        // Hitung statistik global
        $totalCases = CaseFile::count();
        $totalEvidences = Evidence::count();
        $validEvidences = Evidence::where('integrity_status', 'valid')->count();
        $modifiedEvidences = Evidence::where('integrity_status', 'modified')->count();
        
        $stats = [
            'total_cases' => $totalCases,
            'total_evidences' => $totalEvidences,
            'valid_evidences' => $validEvidences,
            'modified_evidences' => $modifiedEvidences,
        ];

        // Ambil daftar kasus beserta evidencenya untuk tabel laporan
        // Disertakan pagination jika jumlah kasusnya banyak
        $cases = CaseFile::with('evidences', 'user')->latest()->paginate(15);

        return view('reports.index', compact('stats', 'cases'));
    }
}
