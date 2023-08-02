<!DOCTYPE html>
<html>
<head>
    <title>Cetak Nota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        p {
            margin-top: 20px;
            font-weight: bold;
            text-align: right;
        }

        .total-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .total-label {
            margin-right: 10px;
        }

        .total-amount {
            font-size: 18px;
        }

        .thank-you {
            text-align: center;
            margin-top: 40px;
            font-weight: bold;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Nota Transaksi</h1>
    <h2>Tanggal: {{ $keranjang->first()->created_at }}</h2>
    <h2>No Meja: {{ $keranjang->first()->no_meja }}</h2>

    <table>
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['jumlah'] }}</td>
                    <td>{{ $item['harga'] }}</td>
                    <td>{{ $item['total'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total-container">
        <span class="total-label">Total Keseluruhan:</span>
        <span class="total-amount">{{ $keranjang->first()->total_keseluruhan }}</span>
    </div>

    <p class="thank-you"><em>Terima kasih atas kunjungan Anda!</em></p>
</body>
</html>
