<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = [
            'tasks' => Task::all()
        ];

        return view('todo.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validateData = $request->validate([
            'todo' => 'required|max:30',
            'tanggal' => 'required|date_format:Y-m-d',
            'jam' => 'required|date_format:H:i',
        ]);

        // Menambahkan data ke database
        try {
            Task::create($validateData);
        } catch (\Throwable $th) {
            return back()->with('error', 'Data gagal ditambahkan');
        }

        return redirect('/todo')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id): View
    {

        $data = [
            'task' => Task::find($id)
        ];

        return view('todo.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $data = [
            'task' => Task::findOrfail($id)
        ];

        return view('todo.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $task = Task::findOrfail($id);
        $validateData = $request->validate([
            'todo' => 'required|max:30',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
        ]);

        // Mengupdate data ke database
        try {
            $task->update($validateData);
        } catch (\Throwable $th) {
            return back()->with('error', 'Data gagal diupdate');
        }

        return redirect('/todo')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $task = Task::findOrfail($id);
        try {
            $task->delete();
        } catch (\Throwable $th) {
            return back()->with('error', 'Data gagal dihapus');
        }

        return redirect('/todo')->with('success', 'Data berhasil dihapus');
    }
}
