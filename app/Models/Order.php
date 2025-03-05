<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $incrementing = false; // Nonaktifkan auto-increment
    protected $keyType = 'string'; // Set ID sebagai string
    protected $fillable = ['id', 'user_id', 'produk_video_id', 'nomor_rekening_id', 'bayar', 'sisa_bayar', 'status', 'bukti_tf'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            do {
                $invoiceId = 'INV' . rand(1000000, 9999999); // Format: INV + 7 angka
            } while (Order::where('id', $invoiceId)->exists()); // Pastikan tidak ada ID duplikat

            $order->id = $invoiceId;
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
