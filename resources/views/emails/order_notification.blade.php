<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Baru</title>
</head>
<body>
    <h2>Pesanan Baru</h2>
    <p>Halo Admin,</p>
    <p>Ada pesanan baru dari <strong>{{ $customerName }}</strong> ({{ $customerEmail }}).</p>
    <p>Detail pesanan:</p>
    <ul>
        <li>Produk: {{ $order->produkVideo->nama_produk }}</li>
        <li>Harga: Rp {{ number_format($order->produkVideo->harga_produk, 0, ',', '.') }}</li>
        <li>Pembayaran: Rp {{ number_format($order->bayar, 0, ',', '.') }}</li>
        <li>Sisa Bayar: Rp {{ number_format($order->sisa_bayar, 0, ',', '.') }}</li>
    </ul>
    <p>Silakan cek detail pesanan di sistem.</p>
    <br>
    <p>Terima kasih.</p>
</body>
</html>
