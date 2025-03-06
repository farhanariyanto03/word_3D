<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pemesanan Video 3D</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        .invoice-container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(to right, #047857, #10b981);
            padding: 15px;
            border-radius: 10px;
            color: white;
            text-align: center;
        }

        .invoice-header img {
            height: 70px;
            background: white;
            padding: 5px;
            border-radius: 5px;
        }

        .invoice-title {
            font-size: 24px;
            font-weight: bold;
            color: black;
        }

        .invoice-section {
            margin-top: 20px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f3f4f6;
            font-weight: bold;
        }

        .status-paid {
            color: #047857;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/images/LOGO.png'))) }}" alt="Company Logo">
            <div class="invoice-title" style="color: black;">Invoice Pemesanan</div>
        </div>

        <div class="invoice-section">
            <p><strong>Nomor Invoice:</strong> {{ $order->id }}</p>
            <p><strong>Tanggal:</strong> {{ $order->created_at }}</p>
        </div>

        <h3>Detail Pesanan</h3>
        <table>
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Detail</th>
                    <th>Syarat dan Ketentuan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->produkVideo->nama_produk }}</td>
                    <td>Rp. {{ number_format($order->produkVideo->harga_produk, 0, ',', '.') }}</td>
                    <td>{{ $order->produkVideo->deskripsi_produk }}</td>
                    <td>{{ $order->produkVideo->syarat_ketentuan }}</td>
                </tr>
            </tbody>
        </table>

        <h3>Informasi Pembayaran</h3>
        <table>
            <thead>
                <tr>
                    <th>Nama Pembeli</th>
                    <th>Total</th>
                    <th>Bayar</th>
                    <th>Sisa Bayar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->user->name }}</td>
                    <td>Rp. {{ number_format($order->produkVideo->harga_produk, 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($order->bayar, 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($order->sisa_bayar, 0, ',', '.') }}</td>
                    <td class="status-paid">{{ $order->status }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
