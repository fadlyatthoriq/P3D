<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
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
        if (auth()->user()->hasRole('Admin')) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        $users = Auth::user();
        $data = DataPajak::latest()->paginate(10);
        $totalwajibpajak = DataPajak::count();

        return view('index', compact('users', 'data', 'totalwajibpajak'));
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

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'npwpd' => 'required|unique:data_pajaks,npwpd,' . $id,
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
    
        // Cari data berdasarkan ID
        $data = DataPajak::findOrFail($id);
    
        // Update data
        $data->update($request->all());
    
        // Berikan notifikasi sukses
        Alert::success('Success', 'Berhasil Memperbarui data!');
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        $data = DataPajak::findOrFail($id); // Cari data berdasarkan ID
        $data->delete(); // Hapus data

        Alert::success('Success', 'Data berhasil dihapus!');
        return redirect()->route('index'); // Kembali ke halaman utama
    }
}
