<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Agama58Controller extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8000/api/agama58/')->json();
        return view('agama.agama', [
            'response' => $response,
            'no' => 1,
            'page' => "Agama"
        ]);
    }

    public function store(Request $request)
    {

        Http::post('http://localhost:8000/api/agama58/', [
            'nama_agama' => $request->nama_agama,
        ]);

        return redirect('/agama58')->with('success', 'Create success');
    }

    public function update(Request $request, $id)
    {
        Http::put('http://localhost:8000/api/agama58/' . $id, [
            'nama_agama' => $request->nama_agama
        ]);

        return redirect('/agama58');
    }

    public function destroy($id)
    {
        Http::delete('http://localhost:8000/api/agama58/' . $id);

        return redirect('/agama58');
    }
}
