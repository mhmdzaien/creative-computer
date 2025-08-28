<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Service - CreativeComp</title>
    <style>
        @media print {
            @page {
                size: A5 landscape;
                /* Sets the page size to A5 (148mm x 210mm) */
                margin: 0.5cm;
                /* Optional: Sets a uniform margin of 1cm on all sides */
            }

            body {
                zoom: 73%;
            }

        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        /* .container {
            background: white;
            width: 21cm;
            min-height: 14.8cm;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        } */

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 24px;
            margin-right: 25px;
        }

        .logo img {
            height: 60px;
        }

        .company-info {
            flex: 1;
        }

        .company-name {
            font-size: 28px;
            font-weight: bold;
            color: #e91e63;
            margin: 0;
        }

        .company-tagline {
            font-size: 12px;
            color: #666;
            margin: 2px 0;
        }

        .nota-service {
            background: #e91e63;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: bold;
            margin-left: auto;
            text-align: center;
        }

        .contact-info {
            font-size: 11px;
            color: #666;
            margin-top: 5px;
        }

        .form-section {
            border: 1px solid #333;
            /* margin: 20px 0; */
            padding: 15px;
        }

        .form-row {
            display: flex;
            margin-bottom: 8px;
            align-items: center;
        }

        .form-label {
            min-width: 80px;
            font-weight: bold;
        }

        .form-input {
            flex: 1;
            border-bottom: 1px dotted #333;
            padding: 2px 5px;
            min-height: 20px;
        }

        .form-row-right {
            margin-left: auto;
            display: flex;
            align-items: center;
        }

        .checkbox-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* gap: 20px; */
            /* margin: 15px 0; */
        }

        .checkbox-group {
            border: 1px solid #333;
            padding: 10px;
        }

        .checkbox-title {
            font-weight: bold;
            margin-bottom: 10px;
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
        }

        .checkbox-items {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            margin: 3px 0;
        }

        .checkbox {
            width: 15px;
            height: 15px;
            border: 1px solid #333;
            margin-right: 8px;
            display: inline-block;
        }

        .services-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin: 15px 0;
        }

        .service-column {
            border: 1px solid #333;
            padding: 10px;
        }

        .service-title {
            font-weight: bold;
            margin-bottom: 10px;
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
        }

        .bottom-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }

        .date-section {
            border: 1px solid #333;
            padding: 10px;
        }

        .total-section {
            border: 1px solid #333;
            padding: 10px;
            text-align: right;
        }

        .warranty-text {
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 15px 0;
        }

        .total-amount {
            font-size: 24px;
            font-weight: bold;
            margin-top: 10px;
        }

        .notes-section {
            border: 1px solid #333;
            padding: 10px;
            min-height: 60px;
            margin: 15px 0;
        }

        .print-btn {
            background: #e91e63;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin: 20px 0;
        }

        .table-info {
            width: 100%;
        }

        .table-info th {
            text-align: start;
            width: 200px;
        }

        input[type="checkbox"] {
            pointer-events: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                <img src="/images/logo.png" />
            </div>
            <div class="company-info">
                <h1 class="company-name">CreativeComp</h1>
                <div class="company-tagline">Computer, Laptop, Printer, CCTV dan Digital Printing</div>
                <div class="contact-info">HP. Toko: 0852-5861-5860 / Owner: 0852-48-567-321</div>
            </div>
            <div class="nota-service">NOTA SERVICE</div>
        </div>

        <!-- Customer Information -->
        <div class="form-section">
            <table class="table-info">
                <tr>
                    <th>Nomor</th>
                    <td>:</td>
                    <td>{{$serviceRequest->nomor}}</td>
                    <th>Tanggal Masuk</th>
                    <td>:</td>
                    <td>{{$serviceRequest->tanggal_masuk}}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>:</td>
                    <td>{{$serviceRequest->pelanggan}}</td>
                    <th>Barang</th>
                    <td>:</td>
                    <td>{{$serviceRequest->barang}}</td>
                </tr>
                <tr>
                    <th>No Handphone</th>
                    <td>:</td>
                    <td>{{$serviceRequest->kontak_pelanggan}}</td>
                    <th>Jenis Barang</th>
                    <td>:</td>
                    <td>{{$serviceRequest->category->category}}</td>
                </tr>
            </table>
        </div>

        <!-- Complaint Section -->
        <div class="form-section">
            <table class="table-info">
                <tr>
                    <th>Keluhan/Permintaan</th>
                    <td>:</td>
                    <td>
                        {{$serviceRequest->keluhan}}
                    </td>
                </tr>
            </table>
        </div>

        <!-- Accessories and Services -->
        <div class="checkbox-section">
            <!-- Kelengkapan -->
            <div class="checkbox-group">
                <div class="checkbox-title">Kelengkapan:</div>
                <div class="checkbox-items">
                    @foreach($listKelengkapan as $item)
                    <div class="checkbox-item">
                        <input type="checkbox" class="checkbox"
                            @if(in_array($item,$serviceRequest->kelengkapan))
                        checked
                        @endif
                        />
                        <span>{{$item}}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Notes Section -->
            <div>

                <div class="checkbox-group">
                    <div class="checkbox-title">Penggantian Sparepart / Keterangan lainnya:</div>
                    <div class="notes-section" style="border: none; padding: 0; margin: 0; min-height: 80px;"></div>
                </div>
                <!-- Garansi Section -->
                <div class="form-section" style="margin-top: 0;padding:0px 10px">
                    <div class="form-row">
                        <span class="form-label">GARANSI Hingga</span>
                        <span>: </span>
                        <div class="form-input"></div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Services Section -->
        <div class="checkbox-section">
            <div class="checkbox-group">
                <div class="checkbox-title">Jenis Pelayanan / Perawatan :</div>
                <div class="checkbox-items">
                    @foreach($listLayanan as $item)
                    <div class="checkbox-item">
                        <input type="checkbox" class="checkbox"
                            @if(in_array($item,$serviceRequest->jenis_layanan))
                        checked
                        @endif
                        />
                        <span>{{$item}}</span>
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="date-section">
                <div class="checkbox-title" style="display: flex;">
                    <span class="form-label">Tanggal Selesai dan Konfirmasi</span>
                    <span>: </span>
                    <div class="form-input" style="min-height: 0px;"></div>
                </div>
                <div class="checkbox-title" style="display:flex; align-items:center; justify-content: space-between;">
                    <span class="form-label">Total Biaya :</span>
                    <div class="total-amount">Rp................................</div>
                </div>
                <!-- Warranty Section -->
                <div class="warranty-text">
                    BARANG YANG TIDAK DIAMBIL SETELAH SATU BULAN,
                    BUKAN TANGGUNG JAWAB KAMI LAGI.
                </div>
            </div>
        </div>

    </div>

    <script>
        // Auto-fill current date
        const bodyWidth = document.body.offsetWidth;
    const bodyHeight = document.body.offsetHeight;
    console.log(bodyHeight,bodyWidth);
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            const dateString = today.getDate().toString().padStart(2, '0') + '.' +
                (today.getMonth() + 1).toString().padStart(2, '0') + '.' +
                today.getFullYear();
            window.print();
        });
    </script>
</body>

</html>