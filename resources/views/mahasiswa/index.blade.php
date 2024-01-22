@extends('mahasiswa.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Institut Teknologi dan Bisnis</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Create New mahasiswa</a>
            </div>
        </div>
    </div>
<br>
<br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>NIM</th>
            <th>Name</th>
            <th>Prodi</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Asal Sekolah</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($mahasiswa as $mahasiswas)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $mahasiswas->nim }}</td>
            <td>{{ $mahasiswas->name }}</td>
            <td>{{ $mahasiswas->prodi }}</td>
            <td>{{ $mahasiswas->tanggal_lahir }}</td>
            <td>{{ $mahasiswas->alamat }}</td>
            <td>{{ $mahasiswas->asal_sekolah }}</td>
            <td>
                <form action="{{ route('mahasiswa.destroy',$mahasiswas->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('mahasiswa.show',$mahasiswas->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mahasiswas->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $mahasiswa->links() !!}

@endsection
