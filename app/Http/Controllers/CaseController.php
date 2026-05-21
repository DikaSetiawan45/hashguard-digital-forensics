<?php

namespace App\Http\Controllers;

use App\Models\CaseFile;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function index()
    {
        $cases = CaseFile::with(['user', 'evidences'])->latest()->get();
        return view('cases.index', compact('cases'));
    }

    public function create()
    {
        return view('cases.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,closed',
        ]);

        CaseFile::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('cases.index')->with('success', 'Kasus berhasil ditambahkan!');
    }

    public function show(CaseFile $case)
    {
        $case->load('evidences');
        return view('cases.show', compact('case'));
    }

    public function edit(CaseFile $case)
    {
        return view('cases.edit', compact('case'));
    }

    public function update(Request $request, CaseFile $case)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,closed',
        ]);

        $case->update($request->only('title', 'description', 'status'));

        return redirect()->route('cases.index')->with('success', 'Kasus berhasil diperbarui!');
    }

    public function destroy(CaseFile $case)
    {
        $case->delete();
        return redirect()->route('cases.index')->with('success', 'Kasus berhasil dihapus!');
    }

    public function report(CaseFile $case)
    {
        $case->load(['user', 'evidences']);
        return view('cases.report', compact('case'));
    }
}
