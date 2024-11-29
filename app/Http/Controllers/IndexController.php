<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;
use App\Models\DataPajak;
use Alert;

class IndexController extends Controller
{
    /**
     * index
     *
     * @return View
     */

    public function index(User $id): View
    {

        $users = User::where('id', Auth::user()->id)->get();
        $data = DataPajak::latest()->paginate(10);

        return view('index', compact('users', 'data'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'npwpd' => 'required|unique:data_pajaks,npwpd',
            'namausaha' => 'required',
            'jenisusaha' => 'required',
            'alamatusaha' => 'required',
            'teleponusaha' => 'required|numeric',
            'jenispendapatan' => 'required',
            'tanggalpendaftaran' => 'required|date',
            'namapemilik' => 'required',
            'nikpemilik' => 'required|digits:16',
            'jabatanpemilik' => 'required',
            'alamatpemilik' => 'required',
            'teleponpemilik' => 'required|digits_between:12,15|numeric',
        ]);

        // Buat data
        DataPajak::create([
            'npwpd' => $request->npwpd,
            'namausaha' => $request->namausaha,
            'jenisusaha' => $request->jenisusaha,
            'alamatusaha' => $request->alamatusaha,
            'teleponusaha' => $request->teleponusaha,
            'jenispendapatan' => $request->jenispendapatan,
            'tanggalpendaftaran' => $request->tanggalpendaftaran,
            'namapemilik' => $request->namapemilik,
            'nikpemilik' => $request->nikpemilik,
            'jabatanpemilik' => $request->jabatanpemilik,
            'alamatpemilik' => $request->alamatpemilik,
            'teleponpemilik' => $request->teleponpemilik,
        ]);

        // Berikan notifikasi sukses
        Alert::success('Success', 'Berhasil Menambahkan data!');
        return redirect()->route('index');
    }
}
