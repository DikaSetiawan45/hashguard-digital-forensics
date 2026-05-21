<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-3 fw-bold text-dark mb-1" style="letter-spacing: -0.5px;">
            Dashboard Forensik Digital
        </h2>
        <p class="text-secondary mb-0" style="font-size: 0.95rem;">Pemantauan integritas barang bukti digital secara real-time</p>
    </x-slot>

    <!-- Specific styles for exact design match -->
    <style>
        .text-blue-custom { color: #2563eb !important; }
        .text-green-custom { color: #16a34a !important; }
        .text-red-custom { color: #dc2626 !important; }
        
        .bg-blue-custom { background-color: #2563eb !important; }
        .bg-blue-light { background-color: #eff6ff !important; }
        .bg-green-light { background-color: #f0fdf4 !important; }
        .bg-red-light { background-color: #fef2f2 !important; }
        
        .btn-blue-custom { background-color: #2563eb; color: white; border-color: #2563eb; }
        .btn-blue-custom:hover { background-color: #1d4ed8; color: white; border-color: #1d4ed8; }
        
        .btn-white-custom { background-color: white; color: #374151; border: 1px solid #d1d5db; }
        .btn-white-custom:hover { background-color: #f9fafb; color: #111827; }
        
        .card-custom { 
            border: none;
            border-radius: 1rem; 
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            background-color: #ffffff;
            transition: transform 0.2s;
        }
        
        .icon-circle { 
            width: 56px; 
            height: 56px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            border-radius: 50%; 
            margin-bottom: 1rem;
        }
        .icon-circle i { font-size: 1.75rem; }
        
        .trend-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 0.25rem 0.75rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .trend-up-blue { background-color: #eff6ff; color: #2563eb; }
        .trend-up-green { background-color: #f0fdf4; color: #16a34a; }
        .trend-up-red { background-color: #fef2f2; color: #dc2626; }
        
        .card-title-custom {
            font-weight: 700;
            font-size: 1.1rem;
            color: #111827;
            margin-bottom: 0.25rem;
        }
        .card-subtitle-custom {
            color: #6b7280;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
        }
        
        .stat-value {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 1.5rem;
        }
        
        .table-custom {
            width: 100%;
            margin-bottom: 0;
        }
        .table-custom th {
            border-top: none;
            border-bottom: 1px solid #e5e7eb;
            color: #6b7280;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            padding: 1rem 0;
        }
        .table-custom td {
            padding: 1rem 0;
            vertical-align: middle;
            border-bottom: 1px solid #f3f4f6;
        }
        .table-custom tr:last-child td {
            border-bottom: none;
        }
        
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .status-valid { background-color: #dcfce7; color: #166534; }
        .status-modified { background-color: #fee2e2; color: #991b1b; }
        .status-unknown { background-color: #f3f4f6; color: #4b5563; }
        
        .hero-banner {
            background: linear-gradient(135deg, #eff6ff 0%, #e0e7ff 100%);
            border-radius: 1rem;
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 60%;
        }
        .hero-illustration {
            position: absolute;
            right: 0;
            bottom: 0;
            height: 100%;
            width: 40%;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 200"><rect x="100" y="50" width="200" height="120" rx="10" fill="%23fff" stroke="%233b82f6" stroke-width="8"/><rect x="80" y="170" width="240" height="15" rx="5" fill="%233b82f6"/><path d="M160 80h80v60h-80z" fill="%23eff6ff"/><circle cx="200" cy="110" r="20" fill="%233b82f6"/><path d="M195 105h10v10h-10z" fill="%23fff"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: right bottom;
            opacity: 0.9;
        }
        .hero-icon {
            width: 64px;
            height: 64px;
            background-color: #3b82f6;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
        }

        @media (max-width: 768px) {
            .hero-banner {
                padding: 2rem 1.5rem;
                text-align: center;
                border-radius: 1.5rem;
            }
            .hero-content {
                max-width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .hero-illustration {
                opacity: 0.1;
                width: 100%;
                background-position: center bottom;
            }
            .hero-icon {
                margin: 0 auto 1rem auto;
                width: 56px;
                height: 56px;
                font-size: 1.75rem;
            }
            .stat-value {
                font-size: 2.2rem;
            }
            .card-custom {
                padding: 1.5rem !important;
            }
            .trend-badge {
                width: 100%;
                justify-content: center;
                margin-top: 0.5rem;
            }
        }
    </style>

    <div class="row mt-2">
        <!-- Total Evidence -->
        <div class="col-md-4 mb-4">
            <div class="card card-custom h-100 p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="icon-circle bg-blue-light">
                        <i class="bi bi-folder text-blue-custom"></i>
                    </div>
                    <div class="text-end">
                        <h6 class="card-title-custom">Total Bukti</h6>
                        <p class="card-subtitle-custom">Semua evidence<br>dalam sistem</p>
                    </div>
                </div>
                <div class="stat-value text-blue-custom mt-2">{{ $stats['total'] ?? 13 }}</div>
                <div>
                    <span class="trend-badge trend-up-blue">
                        <i class="bi bi-arrow-up-right"></i> +2 dari minggu lalu
                    </span>
                </div>
            </div>
        </div>

        <!-- Valid Evidence -->
        <div class="col-md-4 mb-4">
            <div class="card card-custom h-100 p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="icon-circle bg-green-light">
                        <i class="bi bi-shield-check text-green-custom"></i>
                    </div>
                    <div class="text-end">
                        <h6 class="card-title-custom">Valid</h6>
                        <p class="card-subtitle-custom">Tidak mengalami<br>perubahan</p>
                    </div>
                </div>
                <div class="stat-value text-green-custom mt-2">{{ $stats['valid'] ?? 6 }}</div>
                <div>
                    <span class="trend-badge trend-up-green">
                        <i class="bi bi-arrow-up-right"></i> +1 dari minggu lalu
                    </span>
                </div>
            </div>
        </div>

        <!-- Modified Evidence -->
        <div class="col-md-4 mb-4">
            <div class="card card-custom h-100 p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="icon-circle bg-red-light">
                        <i class="bi bi-exclamation-triangle text-red-custom"></i>
                    </div>
                    <div class="text-end">
                        <h6 class="card-title-custom">Modified</h6>
                        <p class="card-subtitle-custom">Terindikasi<br>perubahan</p>
                    </div>
                </div>
                <div class="stat-value text-red-custom mt-2">{{ $stats['modified'] ?? 3 }}</div>
                <div>
                    <span class="trend-badge trend-up-red">
                        <i class="bi bi-arrow-up-right"></i> +1 dari minggu lalu
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mb-4">
        <!-- Distribution Chart -->
        <div class="col-md-5 mb-4 mb-md-0">
            <div class="card card-custom h-100 p-4">
                <h5 class="fw-bold text-dark mb-4 text-center text-md-start" style="font-size: 1.1rem;">Distribusi Status Evidence</h5>
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-center h-100 position-relative">
                    <div style="width: 200px; height: 200px;">
                        <canvas id="statusChart"></canvas>
                    </div>
                    <!-- Chart Legend -->
                    <div class="mt-4 mt-md-0 ms-md-4 d-flex flex-column justify-content-center">
                        <div class="d-flex align-items-center mb-3">
                            <span style="width: 12px; height: 12px; border-radius: 50%; background-color: #22c55e; display: inline-block; margin-right: 8px;"></span>
                            <span class="fw-semibold text-dark me-3" style="width: 60px;">Valid</span>
                            <span class="text-muted small">6 (46.2%)</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <span style="width: 12px; height: 12px; border-radius: 50%; background-color: #ef4444; display: inline-block; margin-right: 8px;"></span>
                            <span class="fw-semibold text-dark me-3" style="width: 60px;">Modified</span>
                            <span class="text-muted small">3 (23.1%)</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span style="width: 12px; height: 12px; border-radius: 50%; background-color: #3b82f6; display: inline-block; margin-right: 8px;"></span>
                            <span class="fw-semibold text-dark me-3" style="width: 60px;">Unknown</span>
                            <span class="text-muted small">4 (30.8%)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recent Evidence List -->
        <div class="col-md-7">
            <div class="card card-custom h-100 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold text-dark mb-0" style="font-size: 1.1rem;">Evidence Terbaru</h5>
                    <a href="{{ route('evidences.index') }}" class="text-decoration-none fw-semibold" style="font-size: 0.9rem; color: #2563eb;">Lihat semua</a>
                </div>
                
                <div class="table-responsive">
                    <table class="table-custom">
                        <tbody>
                            <!-- Item 1 -->
                            <tr>
                                <td style="width: 50px;">
                                    <div class="bg-blue-light text-blue-custom rounded p-2 text-center" style="width: 40px; height: 40px; display:flex; align-items:center; justify-content:center;">
                                        <i class="bi bi-file-earmark-text fs-5"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark" style="font-size: 0.95rem;">laporan_server.log</div>
                                    <div class="text-muted small">Kasus: Peretasan Web A</div>
                                </td>
                                <td>
                                    <span class="status-badge status-valid">Valid</span>
                                </td>
                                <td class="text-end text-muted small">2 jam lalu</td>
                            </tr>
                            <!-- Item 2 -->
                            <tr>
                                <td>
                                    <div class="bg-red-light text-red-custom rounded p-2 text-center" style="width: 40px; height: 40px; display:flex; align-items:center; justify-content:center;">
                                        <i class="bi bi-file-earmark-zip fs-5"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark" style="font-size: 0.95rem;">database_backup.sql</div>
                                    <div class="text-muted small">Kasus: Kebocoran Data B</div>
                                </td>
                                <td>
                                    <span class="status-badge status-modified">Modified</span>
                                </td>
                                <td class="text-end text-muted small">5 jam lalu</td>
                            </tr>
                            <!-- Item 3 -->
                            <tr>
                                <td>
                                    <div class="bg-blue-light text-blue-custom rounded p-2 text-center" style="width: 40px; height: 40px; display:flex; align-items:center; justify-content:center;">
                                        <i class="bi bi-file-earmark-image fs-5"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark" style="font-size: 0.95rem;">screenshot_login.png</div>
                                    <div class="text-muted small">Kasus: Peretasan Web A</div>
                                </td>
                                <td>
                                    <span class="status-badge status-valid">Valid</span>
                                </td>
                                <td class="text-end text-muted small">1 hari lalu</td>
                            </tr>
                            <!-- Item 4 -->
                            <tr>
                                <td>
                                    <div class="bg-secondary bg-opacity-10 text-secondary rounded p-2 text-center" style="width: 40px; height: 40px; display:flex; align-items:center; justify-content:center;">
                                        <i class="bi bi-file-earmark-binary fs-5"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark" style="font-size: 0.95rem;">unknown_file.bin</div>
                                    <div class="text-muted small">Kasus: Investigasi C</div>
                                </td>
                                <td>
                                    <span class="status-badge status-unknown">Unknown</span>
                                </td>
                                <td class="text-end text-muted small">2 hari lalu</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Hero Section -->
    <div class="hero-banner mb-4 mt-3 mt-md-0">
        <div class="hero-illustration"></div>
        <div class="hero-content w-100">
            <div class="d-flex flex-column flex-md-row align-items-center align-items-md-center gap-3 gap-md-4 mb-3 text-center text-md-start">
                <div class="hero-icon">
                    <i class="bi bi-shield-lock-fill"></i>
                </div>
                <div>
                    <h3 class="fw-bold text-dark mb-2 mb-md-1" style="font-size: 1.5rem;">Selamat datang di HashGuard</h3>
                    <p class="text-secondary mb-0 mx-auto mx-md-0" style="font-size: 1rem; max-width: 500px;">
                        Sistem verifikasi integritas berbasis hashing untuk menjaga keaslian bukti digital
                    </p>
                </div>
            </div>
            
            <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-md-start gap-3 mt-4">
                <a href="{{ route('cases.index') }}" class="btn btn-blue-custom px-4 py-3 py-md-2 fw-semibold d-flex align-items-center justify-content-center gap-2" style="border-radius: 0.75rem;">
                    <i class="bi bi-folder-fill"></i> Kelola Kasus
                </a>
                <a href="{{ route('evidences.index') }}" class="btn btn-white-custom px-4 py-3 py-md-2 fw-semibold d-flex align-items-center justify-content-center gap-2" style="border-radius: 0.75rem;">
                    <i class="bi bi-file-earmark-text"></i> Lihat Bukti
                </a>
            </div>
        </div>
    </div>

    <!-- Script for Donut Chart -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('statusChart')) {
                const ctx = document.getElementById('statusChart').getContext('2d');
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Valid', 'Modified', 'Unknown'],
                        datasets: [{
                            data: [6, 3, 4],
                            backgroundColor: [
                                '#22c55e', // Green
                                '#ef4444', // Red
                                '#3b82f6'  // Blue
                            ],
                            borderWidth: 0,
                            hoverOffset: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '70%',
                        plugins: {
                            legend: {
                                display: false // Using custom legend HTML instead
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        if (context.parsed !== null) {
                                            label += context.parsed;
                                        }
                                        return label;
                                    }
                                }
                            }
                        }
                    },
                    plugins: [{
                        id: 'textCenter',
                        beforeDraw: function(chart) {
                            var width = chart.width,
                                height = chart.height,
                                ctx = chart.ctx;

                            ctx.restore();
                            
                            // Draw number
                            var fontSize = (height / 80).toFixed(2);
                            ctx.font = "bold " + fontSize + "em Inter, sans-serif";
                            ctx.textBaseline = "middle";
                            ctx.fillStyle = "#111827";
                            var text = "13",
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2 - 10;
                            ctx.fillText(text, textX, textY);
                            
                            // Draw "Total" label
                            var labelFontSize = (height / 160).toFixed(2);
                            ctx.font = labelFontSize + "em Inter, sans-serif";
                            ctx.fillStyle = "#6b7280";
                            var labelText = "Total",
                                labelX = Math.round((width - ctx.measureText(labelText).width) / 2),
                                labelY = height / 2 + 15;
                            ctx.fillText(labelText, labelX, labelY);
                            
                            ctx.save();
                        }
                    }]
                });
            }
        });
    </script>
</x-app-layout>
