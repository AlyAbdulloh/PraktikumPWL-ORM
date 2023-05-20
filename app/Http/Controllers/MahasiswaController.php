<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use Illuminate\Foundation\Mix;
use Illuminate\Http\Request;



class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //fungsi eloquent menampilkan data menggunakan pagination
        $mahasiswas = Mahasiswa::with('kelas')->get(); // Mengambil semua isi tabel
        $posts = Mahasiswa::with('kelas')->orderBy('Nim', 'asc')->paginate(5);
        return view('mahasiswas.index', compact('posts'));
        // with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kelas = Kelas::all();
        return view('mahasiswas.create', ['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'Email' => 'required',
            'Tanggal_lahir' => 'required',
        ]);

        $mahasiswa = new Mahasiswa;
        $mahasiswa->Nim = $request->get('Nim');
        $mahasiswa->Nama = $request->get('Nama');
        $mahasiswa->kelas_id = $request->get('Kelas');
        $mahasiswa->Jurusan = $request->get('Jurusan');
        $mahasiswa->No_Handphone = $request->get('No_Handphone');
        $mahasiswa->Email = $request->get('Email');
        $mahasiswa->Tanggal_lahir = $request->get('Tanggal_lahir');
        $mahasiswa->save();

        // $kelas = new Kelas;
        // $kelas->id = $request->get('Kelas');

        //fungsi eloquent untuk menambah data belongsTo
        // $mahasiswa->kelas()->associate($kelas);
        // $mahasiswa->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $Nim)
    {
        //
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        // $Mahasiswa = Mahasiswa::find($Nim);
        $Mahasiswa = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();
        return view('mahasiswas.detail', compact('Mahasiswa'));
        // dd(compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $Nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        // $Mahasiswa = Mahasiswa::find($Nim);
        $Mahasiswa = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('Mahasiswa', 'kelas'));
        // dd(compact('Mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $Nim)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'Email' => 'required',
            'Tanggal_lahir' => 'required',
        ]);

        // $mahasiswa = Mahasiswa::where('Nim', $Nim)->first();
        // $mahasiswa->Nim = $request->get('Nim');
        // $mahasiswa->Nama = $request->get('Nama');
        // $mahasiswa->kelas_id = $request->get('Kelas');
        // $mahasiswa->Jurusan = $request->get('Jurusan');
        // $mahasiswa->No_Handphone = $request->get('No_Handphone');
        // $mahasiswa->Email = $request->get('Email');
        // $mahasiswa->Tanggal_lahir = $request->get('Tanggal_lahir');
        // $mahasiswa->save();

        // $kelas = new Kelas;
        // $kelas->id = $request->get('Kelas');

        Mahasiswa::where('Nim', $Nim)->update([
            'Nim' => $request->get('Nim'),
            'Nama' => $request->get('Nama'),
            'Jurusan' => $request->get('Jurusan'),
            'No_Handphone' => $request->get('No_Handphone'),
            'Email' => $request->get('Email'),
            'Tanggal_lahir' => $request->get('Tanggal_lahir'),
            'kelas_id' => $request->get('Kelas'),
        ]);


        //fungsi eloquent untuk mengupdate data inputan kita

        // $mahasiswa->kelas()->associate($kelas);
        // $mahasiswa->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $Nim)
    {
        //fungsi eloquent untuk menghapus data
        // Mahasiswa::find($Nim)->delete();
        Mahasiswa::where('Nim', $Nim)->delete();
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function cari(Request $request)
    {
        # code...
        $cari = $request->cari;

        $posts = Mahasiswa::where('Nim', 'LIKE', "%" . $request->cari . "%")
            ->orWhere('Nama', 'LIKE', "%" . $request->cari . "%")
            ->paginate(5);
        return view('mahasiswas.index', compact('posts'));
    }
}
