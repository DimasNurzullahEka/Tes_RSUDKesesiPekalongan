@extends('template.dashboard_app')

@section('content')
    <div class="container">
        <h2>Edit Mobil</h2>
        <form action="{{ route('mobil.update', $mobil->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="merek">Merek:</label>
                <input type="text" class="form-control" id="merek" name="merek" value="{{ $mobil->merek }}" required>
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ $mobil->model }}" required>
            </div>
            <div class="form-group">
                <label for="nomor_plat">Nomor Plat:</label>
                <input type="text" class="form-control" id="nomor_plat" name="nomor_plat" value="{{ $mobil->nomor_plat }}" required>
            </div>
            <div class="form-group">
                <label for="tarif_sewa_per_hari">Tarif Sewa per Hari:</label>
                <input type="number" class="form-control" id="tarif_sewa_per_hari" name="tarif_sewa_per_hari" value="{{ $mobil->tarif_sewa_per_hari }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('mobil.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
