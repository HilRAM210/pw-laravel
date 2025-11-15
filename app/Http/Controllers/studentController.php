<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class studentController extends Controller
{
    public function index()
    {
        $students = student::all();
        return view('student.view', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:students',
            'name' => 'required',
            'gender' => 'required',
            'domisili' => 'required',
            'angkatan' => 'required',
            'prodi' => 'required',
            'fakultas' => 'required',
        ]);
        
        student::create($request->all());
        return redirect()->route('dashboard')->with('success', 'Data Mahasiswa berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $student = student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    public function edit(string $id)
    {
        $student = student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, string $id)
    {
        $student = student::findOrFail($id);

        $request->validate([
            'nim' => 'required|unique:students,nim,'.$id,
            'name' => 'required',
            'gender' => 'required',
            'domisili' => 'required',
            'angkatan' => 'required',
            'prodi' => 'required',
            'fakultas' => 'required',
        ]);

        $student->update($request->all());
        return redirect()->route('dashboard')->with('success', 'Data Mahasiswa berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $student = student::findOrFail($id);
        $student->delete();
        return redirect()->route('dashboard')->with('success', 'Data Mahasiswa berhasil dihapus');
    }
}