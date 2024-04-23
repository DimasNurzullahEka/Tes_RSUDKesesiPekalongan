@extends('template.dashboard_app')

@section('content')
    <div class="container">
        <h2>Daftar Mobil</h2>
        <form class="form" id="searchForm" method="get" action="{{ route('search') }}">
            <div class="form-group w-100 mb-3">
                <label for="search" class="d-block mr-2">Pencarian</label>
                <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
            </div>
        </form>
        <a href="{{ route('mobil.create') }}" class="btn btn-primary mb-2">Tambah Mobil Baru</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Merek</th>
                    <th>Model</th>
                    <th>Nomor Plat</th>
                    <th>Tarif Sewa per Hari</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="mobilTableBody">
                @foreach ($mobils as $mobil)
                    <tr>
                        <td>{{ $mobil->merek }}</td>
                        <td>{{ $mobil->model }}</td>
                        <td>{{ $mobil->nomor_plat }}</td>
                        <td>{{ $mobil->tarif_sewa_per_hari }}</td>
                        <td>
                            <a href="{{ route('mobil.edit', $mobil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('mobil.destroy', $mobil->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mobil ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        // Function to handle input events
        function handleInputEvent() {
            let keyword = document.getElementById('search').value;
            fetch(`{{ route('search') }}?search=${keyword}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('mobilTableBody').innerHTML = data;
                });
        }

        // Add event listener for input events on the search input field
        document.getElementById('search').addEventListener('input', handleInputEvent);
    </script>
@endsection
