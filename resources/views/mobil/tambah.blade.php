@extends('template.dashboard_app')

@section('content')
    <div class="container">
        <h2>Tambah Mobil Baru</h2>
        <form action="{{ route('mobil.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="merek">Merek:</label>
                <input type="text" class="form-control" id="merek" name="merek" required>
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" class="form-control" id="model" name="model" required>
            </div>
            <div class="form-group">
                <label for="nomor_plat">Nomor Plat:</label>
                <input type="text" class="form-control" id="nomor_plat" name="nomor_plat" required>
            </div>
            <div class="form-group">
                <label for="tarif_sewa_per_hari">Tarif Sewa per Hari:</label>
                <input type="number" class="form-control" id="tarif_sewa_per_hari" name="tarif_sewa_per_hari" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
