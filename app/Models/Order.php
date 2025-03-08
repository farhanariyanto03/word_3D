<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $incrementing = false; // Nonaktifkan auto-increment
    protected $keyType = 'string'; // Set ID sebagai string
    protected $fillable = ['id', 'user_id', 'produk_video_id', 'nomor_rekening_id', 'bayar', 'sisa_bayar', 'status', 'bukti_tf', 'link_video', 'catatan'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            // Ambil ID terakhir dari database
            $lastOrder = Order::latest('id')->first();

            if ($lastOrder) {
                // Ambil angka dari ID terakhir (contoh: INV121 → 121)
                $lastNumber = intval(substr($lastOrder->id, 3));
                $newNumber = $lastNumber + 1;
            } else {
                $newNumber = 121; // Jika tidak ada data, mulai dari INV121
            }

            // Format ID baru (contoh: INV122)
            $order->id = 'INV' . $newNumber;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produkVideo()
    {
        return $this->belongsTo(ProdukVideo::class);
    }
}
