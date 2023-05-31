@extends('mahasiswas.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2 text-center">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="my-2 d-flex mt-5" style="justify-content: space-between">
                <form action="/search" method="GET" class="d-flex" role="search" style="gap: 10px">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="cari">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div class="">
                    <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>No_Handphone</th>
            {{-- <th>Email</th>
            <th>Tanggal_lahir</th> --}}
            <th width="300px">Action</th>
        </tr>
        @foreach ($posts as $Mahasiswa)
            <tr>

                <td>{{ $Mahasiswa->Nim }}</td>
                <td>{{ $Mahasiswa->Nama }}</td>
                @if ($Mahasiswa->foto == '')
                    <td><img width="100px" height="100px" src="{{ asset('image/pp.png') }}" style="object-fit: cover"></td>
                @else
                    <td><img width="100px" height="100px" src="{{ asset('storage/' . $Mahasiswa->foto) }}"
                            style="object-fit: cover"></td>
                @endif
                <td>{{ $Mahasiswa->kelas->nama_kelas }}</td>
                <td>{{ $Mahasiswa->Jurusan }}</td>
                <td>{{ $Mahasiswa->No_Handphone }}</td>
                {{-- <td>{{ $Mahasiswa->Email }}</td>
                <td>{{ $Mahasiswa->Tanggal_lahir }}</td> --}}
                <td>
                    <form action="{{ route('mahasiswa.destroy', $Mahasiswa->Nim) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('mahasiswa.show', $Mahasiswa->Nim) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('mahasiswa.edit', $Mahasiswa->Nim) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <a class="btn btn-warning" href="{{ route('mahasiswa.khs', $Mahasiswa->Nim) }}">Nilai</a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $posts->links() }}
@endsection

@section('script')
    {{-- <script>
        $(document).ready(function() {
            $("#search").keyup(function() {
                var item = $("#search").val();

                if (item != "") {
                    $.ajax({
                        type: 'get',
                        url: '{{ URL::to('search') }}',
                        data:{'srch':item},
                        success: function(response) {
                            $(".coba").text(response);
                        }
                    });
                } else {
                    $.ajax({
                        url: "{{ route('mahasiswa.index') }}"
                    });
                }
                $(".coba").text($("#search").val());
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('search') }}',
                    data: {'srch': item},
                    success: function(response) {
                        $posts  = response;
                    }
                });

            });
        });
    </script> --}}
@endsection
