<?php

namespace App\Http\Controllers;

use App\Models\Detaildata58;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Detaildata58Controller extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('foto_ktp')) {
            $request->file('foto_ktp')->move('img/', $request->file('foto_ktp')->getClientOriginalName());
            $foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
        }

        Http::post('http://localhost:8000/api/detaildata58/', [
            'id_user' => Auth::user()->id,
            'id_agama' => $request->id_agama,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'umur' => $request->umur,
            'foto_ktp' => $foto_ktp,
        ]);

        return redirect('/myprofile58');
    }

    public function update(Request $request, $id)
    {
        if ($request->hasFile('foto_ktp')) {
            $request->file('foto_ktp')->move('img/', $request->file('foto_ktp')->getClientOriginalName());
            $foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
        }

        Http::put('http://localhost:8000/api/detaildata58/' . $id, [
            'id_user' => Auth::user()->id,
            'id_agama' => $request->id_agama,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'umur' => $request->umur,
            'foto_ktp' => $foto_ktp,
        ]);

        return redirect('/myprofile58');
    }
}
