@extends('template.dashboard_app')

@section('content')
    <h1>Daftar Peminjaman</h1>
    <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">Tambah Peminjaman Baru</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Mobil</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Total Pembayaran</th>
            </tr>
        </thead>
        <tbody>

            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ optional($booking->mobil)->merek }} - {{ optional($booking->mobil)->model }}</td>
                    <td>{{ $booking->start_date }}</td>
                    <td>{{ $booking->end_date }}</td>
                    <td>{{ $booking->total_payment }}</td>

                    <td>
                        <!-- Add edit and delete links here if needed -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
