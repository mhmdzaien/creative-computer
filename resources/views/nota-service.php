
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Service - CreativeComp</title>
    <style>
        @media print {
            body { margin: 0; }
            .no-print { display: none; }
        }
        
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 20px;
        }
        
        .container {
            background: white;
            width: 21cm;
            min-height: 29.7cm;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #e91e63, #ff5722);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 24px;
            margin-right: 15px;
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
            border: 2px solid #333;
            margin: 20px 0;
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
            gap: 20px;
            margin: 15px 0;
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
            text-align: center;
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
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo">CC</div>
            <div class="company-info">
                <h1 class="company-name">CreativeComp</h1>
                <div class="company-tagline">Computer, Laptop, Printer, CCTV dan Digital Printing</div>
                <div class="contact-info">HP. Toko: 0852-5861-5860 / Owner: 0852-48-567-321</div>
            </div>
            <div class="nota-service">NOTA SERVICE</div>
        </div>

        <!-- Customer Information -->
        <div class="form-section">
            <div class="form-row">
                <span class="form-label">Nama</span>
                <span>: </span>
                <div class="form-input"></div>
                <div class="form-row-right">
                    <span class="form-label">Tgl. Masuk</span>
                    <span>: </span>
                    <div class="form-input" style="width: 100px;"></div>
                </div>
            </div>
            
            <div class="form-row">
                <span class="form-label">Alamat</span>
                <span>: </span>
                <div class="form-input"></div>
                <div class="form-row-right">
                    <span class="form-label">Jenis Barang</span>
                    <span>: </span>
                    <div class="form-input" style="width: 100px;"></div>
                </div>
            </div>
            
            <div class="form-row">
                <span class="form-label">No. HP</span>
                <span>: </span>
                <div class="form-input"></div>
                <div class="form-row-right">
                    <span class="form-label">Type Barang</span>
                    <span>: </span>
                    <div class="form-input" style="width: 100px;"></div>
                </div>
            </div>
        </div>

        <!-- Complaint Section -->
        <div class="form-section">
            <div class="form-row">
                <span class="form-label">Keluhan / Permintaan</span>
                <span>: </span>
                <div class="form-input" style="min-height: 40px;"></div>
            </div>
        </div>

        <!-- Accessories and Services -->
        <div class="checkbox-section">
            <!-- Kelengkapan -->
            <div class="checkbox-group">
                <div class="checkbox-title">Kelengkapan:</div>
                <div class="checkbox-items">
                    <div class="checkbox-item">
                        <span class="checkbox"></span>
                        <span>Tas</span>
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox"></span>
                        <span>Charger</span>
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox"></span>
                        <span>Mouse</span>
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox"></span>
                        <span>Kabel Usb</span>
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox"></span>
                        <span>Kabel Power</span>
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox"></span>
                        <span>............</span>
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox"></span>
                        <span>............</span>
                    </div>
                </div>
            </div>

            <!-- Notes Section -->
            <div class="checkbox-group">
                <div class="checkbox-title">Penggantian Sparepart / Keterangan lainnya:</div>
                <div class="notes-section" style="border: none; padding: 0; margin: 0; min-height: 80px;"></div>
            </div>
        </div>

        <!-- Services Section -->
        <div class="services-section">
            <div class="service-column">
                <div class="service-title">Jenis Pelayanan / Perawatan :</div>
                <div class="checkbox-item">
                    <span class="checkbox"></span>
                    <span>Service Mainboard</span>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox"></span>
                    <span>Service LED/LCD</span>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox"></span>
                    <span>Service HDD/SSD</span>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox"></span>
                    <span>Service Battery</span>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox"></span>
                    <span>Service Keyboard</span>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox"></span>
                    <span>Service Engsel/Casing</span>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox"></span>
                    <span>Service Printer</span>
                </div>
            </div>

            <div class="service-column">
                <div style="margin-top: 30px;">
                    <div class="checkbox-item">
                        <span class="checkbox"></span>
                        <span>Install Windows</span>
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox"></span>
                        <span>Install Aplikasi</span>
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox"></span>
                        <span>Install Driver</span>
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox"></span>
                        <span>Scan/Install Anti Virus</span>
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox"></span>
                        <span>Recovery Data / Backup</span>
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox"></span>
                        <span>Tukar Tambah</span>
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox"></span>
                        <span>Lainnya...</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="bottom-section">
            <div class="date-section">
                <div class="form-row">
                    <span class="form-label">Tanggal Selesai dan Konfirmasi</span>
                    <span>: </span>
                    <div class="form-input"></div>
                </div>
            </div>

            <div class="total-section">
                <div class="form-row">
                    <span class="form-label">Total Biaya :</span>
                </div>
                <div class="total-amount">Rp.</div>
            </div>
        </div>

        <!-- Warranty Section -->
        <div class="warranty-text">
            BARANG YANG TIDAK DIAMBIL SETELAH SATU BULAN,<br>
            BUKAN TANGGUNG JAWAB KAMI LAGI.
        </div>

        <!-- Garansi Section -->
        <div class="form-section">
            <div class="form-row">
                <span class="form-label">GARANSI Hingga</span>
                <span>: </span>
                <div class="form-input"></div>
            </div>
        </div>

        <!-- Print Button -->
        <button class="print-btn no-print" onclick="window.print()">Cetak Nota</button>
    </div>

    <script>
        // Auto-fill current date
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            const dateString = today.getDate().toString().padStart(2, '0') + '.' + 
                             (today.getMonth() + 1).toString().padStart(2, '0') + '.' + 
                             today.getFullYear();
            
            window.print();
            // You can uncomment this to auto-fill today's date
            // document.querySelector('.form-input').textContent = dateString;
        });
    </script>
</body>
</html>