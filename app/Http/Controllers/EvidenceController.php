<?php

namespace App\Http\Controllers;

use App\Models\Evidence;
use Illuminate\Http\Request;

class EvidenceController extends Controller
{
    public function index(Request $request)
    {
        $query = Evidence::with('caseFile')->latest();

        if ($request->has('status') && in_array($request->status, ['valid', 'modified'])) {
            $query->where('integrity_status', $request->status);
        }

        $evidences = $query->get();
        return view('evidences.index', compact('evidences'));
    }

    public function create(Request $request)
    {
        $case_id = $request->query('case_id');
        $cases = \App\Models\CaseFile::all(); // To populate dropdown if no case_id provided
        return view('evidences.create', compact('case_id', 'cases'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'case_id' => 'required|exists:case_files,id',
            'file' => 'required|file|mimes:pdf,docx,jpg,jpeg,png,mp3,mp4,zip|max:10240', // max 10MB as example
        ]);

        $file = $request->file('file');
        
        $path = $file->store('evidences', 'public');
        $name = $file->getClientOriginalName();
        $size = $file->getSize();
        $type = $file->getClientOriginalExtension() ?: $file->getMimeType();

        Evidence::create([
            'case_id' => $request->case_id,
            'file_name' => $name,
            'file_path' => $path,
            'file_size' => $size,
            'file_type' => $type,
            'md5_hash' => md5_file($file->getRealPath()),
            'sha256_hash' => hash_file('sha256', $file->getRealPath()),
            'integrity_status' => 'unknown',
            'uploaded_by' => auth()->id(),
        ]);

        return redirect()->route('cases.show', $request->case_id)
            ->with('success', 'Bukti digital berhasil diunggah!');
    }

    public function show(Evidence $evidence)
    {
        $logs = \App\Models\HashVerificationLog::with('user')->where('evidence_id', $evidence->id)->latest()->get();
        return view('evidences.show', compact('evidence', 'logs'));
    }
    public function showVerifyForm(Evidence $evidence)
    {
        return view('evidences.verify', compact('evidence'));
    }

    public function verify(Request $request, Evidence $evidence)
    {
        $request->validate([
            'verify_file' => 'required|file|mimes:pdf,docx,jpg,jpeg,png,mp3,mp4,zip',
        ]);

        $file = $request->file('verify_file');
        
        $md5 = md5_file($file->getRealPath());
        $sha256 = hash_file('sha256', $file->getRealPath());

        if ($md5 === $evidence->md5_hash && $sha256 === $evidence->sha256_hash) {
            $evidence->update(['integrity_status' => 'valid']);
            $msg = 'Integritas file tervalidasi dengan sukses! Hash sangat identik.';
            $type = 'success';
            $resultStatus = 'valid';
        } else {
            $evidence->update(['integrity_status' => 'modified']);
            $msg = 'PERINGATAN: Integritas file gagal diverifikasi! Hash tidak sama dengan database.';
            $type = 'error_msg'; // using error_msg to avoid conflict with standard `error` bag
            $resultStatus = 'modified';
        }

        \App\Models\HashVerificationLog::create([
            'evidence_id' => $evidence->id,
            'user_id' => auth()->id(),
            'old_md5' => $evidence->md5_hash,
            'new_md5' => $md5,
            'old_sha256' => $evidence->sha256_hash,
            'new_sha256' => $sha256,
            'result' => $resultStatus,
        ]);

        return redirect()->route('evidences.show', $evidence->id)->with($type, $msg);
    }
}
