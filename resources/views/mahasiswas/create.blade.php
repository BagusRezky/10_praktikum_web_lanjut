@extends('mahasiswas.layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah Mahasiswa
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('mahasiswas.store') }}" id="myForm">
                        @csrf
                        <div class="form-group">
                            <label for="Nim">Nim</label><br>
                            <input type="text" name="Nim" class="formcontrol" id="Nim" aria-describedby="Nim">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label><br>
                            <input type="Email" name="Email" class="formcontrol" id="Email" aria-describedby="Email">
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama</label><br>
                            <input type="text" name="Nama" class="formcontrol" id="Nama" aria-describedby="Nama">
                        </div>
                        <div class="form-group">
                            <label for="Kelas">Kelas</label><br>
                            <select class = "form-control" name="kelas_id" id="Kelas">
                                @foreach($kelas as $kls)
                                    <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Jurusan">Jurusan</label><br>
                            <input type="text" name="Jurusan" class="formcontrol" id="Jurusan"
                                aria-describedby="Jurusan">
                        </div>
                        <div class="form-group">
                            <label for="No_Handphone">No_Handphone</label><br>
                            <input type="text" name="No_Handphone" class="formcontrol" id="No_Handphone"
                                aria-describedby="No_Handphone">
                        </div>
                        <div class="form-group">
                            <label for="Tanggal_Lahir">Tanggal_Lahir</label><br>
                            <input type="date" name="Tanggal_lahir" class="formcontrol" id="Tanggal_Lahir"
                                aria-describedby="Tanggal_lahir">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
