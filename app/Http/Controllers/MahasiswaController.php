<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\StoreMahasiswaRequest;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //jika menggunakan paginate dan data terbaru
        // $mahasiswas = Mahasiswa::latest()->paginate(5);

        if ($request->has('search')) {
            $mahasiswas = Mahasiswa::where('Nama', 'Like', '%' . $request->search . '%')->with('kelas')->get();
        } else {
            $mahasiswas = Mahasiswa::with('kelas')->get();
        }
        $paginate = Mahasiswa::orderBy('Nim', 'asc')->paginate(3);


        return view('mahasiswas.index', ['mahasiswas' => $mahasiswas, 'paginate' => $paginate]);
        with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswas.create', ['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMahasiswaRequest $request)
    {
        // dd($request->all());
        Mahasiswa::create($request->validated());
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($Nim)
    {
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $Nim)->first();
        return view('mahasiswas.detail', ['Mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Nim)
    {
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $Nim)->first();
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Nim)
    {
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'Tanggal_Lahir' => 'required'
        ]);

        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $Nim)->first();
        $mahasiswa->Nim = $request->get('Nim');
        $mahasiswa->Nama = $request->get('Nama');
        $mahasiswa->Jurusan = $request->get('Jurusan');
        $mahasiswa->No_Handphone = $request->get('No_Handphone');
        $mahasiswa->Tanggal_lahir = $request->get('Tanggal_Lahir');

        // $mahasiswa->save();

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Nim)
    {
        Mahasiswa::find($Nim)->delete();
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa berhasil dihapus');
    }

    function mahasiswaNilai($Nim)
    {
        $mahasiswa_id = Mahasiswa::where('Nim', $Nim)->pluck('id')->first();
        $mahasiswa = Mahasiswa::with('kelas', 'mahasiswa_matakuliah.matakuliah')->where('id', $mahasiswa_id)->first();
        return view('mahasiswas.mahasiswa_nilai', compact('mahasiswa'));
    }

    function cetak_pdf($Nim)
    {
        $mahasiswa_id = Mahasiswa::where('Nim', $Nim)->pluck('id')->first();
        $mahasiswa = Mahasiswa::with('kelas', 'mahasiswa_matakuliah.matakuliah')->where('id', $mahasiswa_id)->first();
        $pdf = Pdf::loadView('mahasiswas.mahasiswa_nilai', ['mahasiswa' => $mahasiswa]);
        return $pdf->stream();
    }
}
