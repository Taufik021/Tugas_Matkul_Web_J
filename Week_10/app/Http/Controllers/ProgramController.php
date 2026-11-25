<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

// TODO 1: Menangani CRUD program dan mengembalikan response API dalam format JSON.

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $programs = Program::query()->orderBy('id')->get();

        if ($this->isApiRequest($request)) {
            return response()->json($programs);
        }

        return view('programs.index', compact('programs'));
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateProgram($request);

        $program = Program::create($validated);

        if ($this->isApiRequest($request)) {
            return response()->json($program, 201);
        }

        return redirect()->route('programs.index')
            ->with('success', 'Program berhasil ditambahkan.');
    }

    public function show($id)
    {
        return response()->json(Program::findOrFail($id));
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);

        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $validated = $this->validateProgram($request);

        $program = Program::findOrFail($id);
        $program->update($validated);

        if ($this->isApiRequest($request)) {
            return response()->json($program);
        }

        return redirect()->route('programs.index')
            ->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Request $request, $id)
    {
        Program::findOrFail($id)->delete();

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Program berhasil dihapus.']);
        }

        return redirect()->route('programs.index')
            ->with('success', 'Program berhasil dihapus.');
    }

    private function isApiRequest(Request $request): bool
    {
        return $request->is('api/*');
    }

    private function validateProgram(Request $request): array
    {
        if ($this->isApiRequest($request)) {
            $request->headers->set('Accept', 'application/json');
        }

        return $request->validate([
            'nama' => 'required|max:100',
            'deskripsi' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 100 karakter',
            'deskripsi.required' => 'Deskripsi wajib diisi',
        ]);
    }
}
