<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Mobil;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Booking_Controller extends Controller
{
    //
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $cars = Mobil::all(); // Mengambil semua mobil dari database
        return view('bookings.tambah', compact('cars'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'mobil_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Tanggal mulai dan akhir
        $tanggal_mulai = Carbon::parse($request->start_date);
        $tanggal_akhir = Carbon::parse($request->end_date);

        // Harga per hari (misalnya, dari entitas Mobil)
        $mobil = Mobil::findOrFail($request->mobil_id);
        $harga_per_hari = $mobil->tarif_sewa_per_hari;

        // Menghitung jumlah hari
        $jumlah_hari = $tanggal_mulai->diffInDays($tanggal_akhir) + 1; // tambahkan 1 hari karena tanggal akhir juga disertakan

        // Menghitung total harga
        $total_harga = $harga_per_hari * $jumlah_hari;

        // Membuat dan menyimpan booking baru
        $booking = new Booking();
        $booking->mobil_id = $request->mobil_id;
        $booking->start_date = $request->start_date;
        $booking->end_date = $request->end_date;
        $booking->total_payment = $total_harga;
        $booking->save();

        // Redirect pengguna setelah penyimpanan booking (opsional)
    return redirect()->route('bookings.index')->with('success', 'Booking added successfully');
    }
    }



