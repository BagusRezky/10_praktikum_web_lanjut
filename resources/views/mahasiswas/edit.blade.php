@extends('mahasiswas.layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Mahasiswa
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
                    <form method="post" action="{{ route('mahasiswas.update', $mahasiswa->Nim) }}" id="myForm">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Nim">Nim</label><br>
                            <input type="text" name="Nim" class="formcontrol" id="Nim"
                                value="{{ $mahasiswa->Nim }}" ariadescribedby="Nim">
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama</label><br>
                            <input type="text" name="Nama" class="formcontrol" id="Nama"
                                value="{{ $mahasiswa->Nama }}" ariadescribedby="Nama">
                        </div>
                        <div class="form-group">
                            <label for="Kelas">Kelas</label><br>
                            <select name="Kelas" id="" class="form-control">
                                @foreach($kelas as $kls)
                                <option value="{{$kls->id}}"{{$mahasiswa->kelas_id == $kls->id ? 'selected':''}}>{{$kls->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Jurusan">Jurusan</label><br>
                            <input type="Jurusan" name="Jurusan" class="formcontrol" id="Jurusan"
                                value="{{ $mahasiswa->Jurusan }}" ariadescribedby="Jurusan">
                        </div>
                        <div class="form-group">
                            <label for="No_Handphone">No_Handphone</label><br>
                            <input type="No_Handphone" name="No_Handphone" class="formcontrol" id="No_Handphone"
                                value="{{ $mahasiswa->No_Handphone }}" ariadescribedby="No_Handphone">
                        </div>
                        <div class="form-group">
                            <label for="Tanggal_Lahir">Tanggal_Lahir</label><br><br>
                            <input type="date" name="Tanggal_Lahir" class="formcontrol" id="Tanggal_Lahir"
                                aria-describedby="Tanggal_Lahir" value="{{$mahasiswa->Tanggal_lahir}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
