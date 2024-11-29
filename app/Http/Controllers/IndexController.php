<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
        //validate form
        $this->validate($request, [
            'npwpd'     => 'required|unique:App\Models\DataPajak, npwpd',
            'namausaha'     => 'required',
            'jenisusaha'   => 'required',
            'alamatusaha'   => 'required',
            'teleponusaha'   => 'required|numeric',
            'jenispendapatan'   => 'required',
            'tanggalpendaftaran'   => 'required|date',
            'namapemilik'   => 'required',
            'nikpemilik'   => 'required|min:16',
            'jabatanpemilik'   => 'required',
            'alamatpemilik'   => 'required',
            'teleponpemilik'   => 'required|min:12|numeric',
        ]);

        //create post
        Post::create([
            'npwpd'     => $request->npwpd,
            'namausaha'     => $request->namausaha,
            'jenisusaha'   => $request->jenisusaha,
            'alamatusaha'   => $request->alamatusaha,
            'teleponusaha'   => $request->teleponusaha,
            'jenispendapatan'   => $request->jenispendapatan,
            'tanggalpendaftaran'   => $request->tanggalpendaftaran,
            'namapemilik'   => $request->namapemilik,
            'nikpemilik'   => $request->nikpemilik,
            'jabatanpemilik'   => $request->jabatanpemilik,
            'alamatpemilik'   => $request->alamatpemilik,
            'teleponpemilik'   => $request->teleponpemilik
        ]);

        //redirect to index
        return redirect()->route('index')->alert('Success', 'Berhasil menambahkan data!', 'success');
    }
}
