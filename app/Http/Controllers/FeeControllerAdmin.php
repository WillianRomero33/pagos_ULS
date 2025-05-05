<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use Illuminate\Http\Request;

class FeeControllerAdmin extends Controller
{
    public function index()
    {
        $fees = Fee::all();
        return view('fees.index', compact('fees'));
    }

    public function create()
    {
        return view('fees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string|max:255'
        ]);

        Fee::create($validated);
        return redirect()->route('fees.index')->with('success', 'Cuota creada exitosamente.');
    }

    public function edit(Fee $fee)
    {
        return view('fees.edit', compact('fee'));
    }

    public function update(Request $request, Fee $fee)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string|max:255'
        ]);

        $fee->update($validated);
        return redirect()->route('fees.index')->with('success', 'Cuota actualizada exitosamente.');
    }

    public function destroy(Fee $fee)
    {
        $fee->delete();
        return redirect()->route('fees.index')->with('success', 'Cuota eliminada.');
    }
}
