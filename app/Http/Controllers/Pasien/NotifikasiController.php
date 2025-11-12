<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    /**
     * Menampilkan halaman daftar notifikasi.
     */
    public function index()
    {
        $user = Auth::user();
        $notifikasi = $user->notifications()->paginate(10);
        
        // Tandai notifikasi yang belum dibaca sebagai telah dibaca
        $user->unreadNotifications->markAsRead();

        return view('pasien.notifikasi.index', compact('notifikasi'));
    }

    /**
     * Menandai notifikasi sebagai dibaca (jika diperlukan oleh AJAX nanti)
     */
    public function markAsRead(Request $request, $notificationId)
    {
        $notification = Auth::user()->notifications()->find($notificationId);
        if($notification) {
            $notification->markAsRead();
        }
        
        // Jika ada URL tujuan di notifikasi, redirect ke sana
        if(isset($notification->data['url'])) {
             return redirect($notification->data['url']);
        }
        
        return back();
    }
}
