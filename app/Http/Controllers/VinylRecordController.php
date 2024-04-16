<?php

namespace App\Http\Controllers;

use App\Models\VinylRecord;
use App\Models\Genre;
use Illuminate\Http\Request;

class VinylRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view('records', ['records'=>VinylRecord::paginate($perpage)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('record_create', [
            'genres' => Genre::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'author_id' => 'required|integer',
            'name' => 'required|unique:vinyl_records|max:255',
            'genre_id' => 'integer'
        ]);
        $record = new VinylRecord($validated);
        $record->save();
        return redirect('/records')->with('success', 'пластинка создана!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('record_edit', [
            'record' =>VinylRecord::all()->where('id', $id)->first(),
            'genres' => Genre::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'genre_id'=> 'integer'
        ]);
        $record = VinylRecord::all()->where('id', $id)->first();
        $record->name = $validated['name'];
        $record->save();
        return redirect('/records')->with('success', 'пластинка изменена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        VinylRecord::destroy($id);
        return redirect('/records')->with('success', 'пластинка удалена!');
    }
}
