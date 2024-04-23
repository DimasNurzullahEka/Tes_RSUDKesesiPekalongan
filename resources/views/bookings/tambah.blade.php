@extends('template.dashboard_app')

@section('content')
    <h1>Tambah Peminjaman Baru</h1>
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="mobil_id">Mobil:</label>
            <select name="mobil_id" id="mobil_id" class="form-control">
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->merek }}-{{ $car->model }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Tanggal Mulai:</label>
            <input type="date" name="start_date" id="start_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_date">Tanggal Selesai:</label>
            <input type="date" name="end_date" id="end_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
