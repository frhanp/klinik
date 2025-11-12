<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    public function index() {
        $user = Auth::user();
        $notifikasi = $user->notifications()->paginate(10);
        $user->unreadNotifications->markAsRead();
        return view('dokter.notifikasi.index', compact('notifikasi'));
    }
}
