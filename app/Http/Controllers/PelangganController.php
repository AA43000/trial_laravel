<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        //get pelanggans
        $pelanggans = Pelanggan::latest()->paginate(5);

        //render view with pelanggans
        return view('pelanggans.index', compact('pelanggans'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('pelanggans.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama'     => 'required|min:5',
            'alamat'   => 'required|min:10',
            'no_telp'     => 'required|min:12'
        ]);

        //create post
        Pelanggan::create([
            'nama'     => $request->nama,
            'alamat'   => $request->alamat,
            'no_telp'   => $request->no_telp
        ]);

        //redirect to index
        return redirect()->route('Pelanggans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::find($id);
        return view('pelanggans.edit', compact('pelanggan'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, $id)
    {
        //validate form
        $this->validate($request, [
            'nama'     => 'required|min:5',
            'alamat'   => 'required|min:10',
            'no_telp'     => 'required|min:12'
        ]);

        // Lakukan pembaruan data berdasarkan $id
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            // Handle kasus jika pelanggan tidak ditemukan
            return redirect()->back()->with('error', 'Pelanggan tidak ditemukan');
        }
    
        // Lakukan pembaruan berdasarkan data dari $request
        $pelanggan->update([
            'nama'     => $request->nama,
            'alamat'   => $request->alamat,
            'no_telp'   => $request->no_telp
        ]);

        //redirect to index
        return redirect()->route('Pelanggans.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        //delete post
        $pelanggan->delete();

        //redirect to index
        return redirect()->route('Pelanggans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
