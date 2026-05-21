<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HashGuard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Chart.js for donut chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body { 
            background-color: #f8fafc; 
            font-family: 'Inter', sans-serif;
            color: #334155;
            overflow-x: hidden;
        }
        
        /* Sidebar Styling */
        #sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #ffffff;
            border-right: 1px solid #e2e8f0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }
        
        .sidebar-brand {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #0f172a;
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }
        
        .sidebar-brand i {
            color: #2563eb;
            font-size: 1.5rem;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0 1rem;
            margin: 0;
            flex-grow: 1;
        }
        
        .sidebar-item {
            margin-bottom: 0.25rem;
        }
        
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.75rem 1rem;
            color: #64748b;
            text-decoration: none;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .sidebar-link:hover {
            background-color: #f8fafc;
            color: #0f172a;
        }
        
        .sidebar-link.active {
            background-color: #eff6ff;
            color: #2563eb;
        }
        
        .sidebar-link i {
            font-size: 1.2rem;
        }
        
        .sidebar-heading {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: #94a3b8;
            font-weight: 600;
            padding: 1.5rem 1rem 0.5rem;
            letter-spacing: 0.05em;
        }
        
        .sidebar-bottom {
            padding: 1rem;
            border-top: 1px solid #e2e8f0;
        }
        
        /* Main Content Styling */
        #main-content {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* Top Header Styling */
        .top-header {
            height: 70px;
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
        }
        
        .header-left .toggle-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #64748b;
            cursor: pointer;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        
        .notification-btn {
            background: none;
            border: none;
            color: #64748b;
            font-size: 1.25rem;
            position: relative;
        }
        
        .notification-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            background-color: #2563eb;
            color: white;
            font-size: 0.65rem;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #ffffff;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            background-color: #eff6ff;
            color: #2563eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
        }
        
        .user-name {
            font-weight: 600;
            color: #0f172a;
            font-size: 0.9rem;
            line-height: 1.2;
        }
        
        .user-role {
            color: #64748b;
            font-size: 0.75rem;
        }
        
        /* Page Content */
        .page-content {
            padding: 2rem;
            flex-grow: 1;
        }

        /* Responsive Media Queries */
        @media (max-width: 768px) {
            #sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }
            #sidebar.show {
                transform: translateX(0);
            }
            #main-content {
                margin-left: 0;
            }
            .top-header {
                padding: 0 1rem;
            }
            .page-content {
                padding: 1rem;
            }
            .user-info, .bi-chevron-down {
                display: none;
            }
            .sidebar-backdrop {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
                opacity: 0;
                transition: opacity 0.3s ease-in-out;
            }
            .sidebar-backdrop.show {
                display: block;
                opacity: 1;
            }
        }
        @media (min-width: 769px) {
            .sidebar-backdrop {
                display: none !important;
            }
            body.sidebar-collapsed #sidebar {
                transform: translateX(-100%);
            }
            body.sidebar-collapsed #main-content {
                margin-left: 0;
            }
            #sidebar, #main-content {
                transition: all 0.3s ease-in-out;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<aside id="sidebar">
    <a href="{{ route('dashboard') }}" class="sidebar-brand">
        <i class="bi bi-shield-lock-fill"></i> HashGuard
    </a>
    
    <ul class="sidebar-menu">
        <li class="sidebar-item">
            <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid"></i> Dashboard
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('cases.index') }}" class="sidebar-link {{ request()->routeIs('cases.*') ? 'active' : '' }}">
                <i class="bi bi-folder2"></i> Kasus
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('evidences.index') }}" class="sidebar-link {{ request()->routeIs('evidences.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i> Evidence
            </a>
        </li>

        <li class="sidebar-item">
            <a href="{{ route('reports.index') }}" class="sidebar-link {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                <i class="bi bi-bar-chart"></i> Laporan
            </a>
        </li>
        
        @if(auth()->check() && auth()->user()->role === 'admin')
            <div class="sidebar-heading">Kelola Sistem</div>
            
            <li class="sidebar-item">
                <a href="{{ route('users.index') }}" class="sidebar-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <i class="bi bi-person"></i> Pengguna
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-gear"></i> Pengaturan
                </a>
            </li>
        @endif
    </ul>
    
    <div class="sidebar-bottom">
        <form method="POST" action="{{ route('logout') }}" class="w-100">
            @csrf
            <button type="submit" class="sidebar-link border-0 bg-transparent w-100 text-start">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>
</aside>

<!-- Main Content -->
<div id="main-content">
    <!-- Top Header -->
    <header class="top-header">
        <div class="header-left">
            <button class="toggle-btn">
                <i class="bi bi-list"></i>
            </button>
        </div>
        <div class="header-right">
            <button class="notification-btn">
                <i class="bi bi-bell"></i>
                <span class="notification-badge">3</span>
            </button>
            <div class="dropdown">
                <div class="user-profile" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;" title="Klik untuk membuka menu">
                    <div class="user-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <div class="user-info">
                        <span class="user-name">{{ Auth::user()->name ?? 'Administrator' }}</span>
                        <span class="user-role">{{ ucfirst(Auth::user()->role ?? 'Admin') }}</span>
                    </div>
                    <i class="bi bi-chevron-down text-muted ms-2" style="font-size: 0.8rem;"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2" style="border-radius: 0.75rem; min-width: 200px;">
                    <li>
                        <a class="dropdown-item py-2" href="{{ route('profile.edit') }}">
                            <i class="bi bi-person-gear me-2 text-primary"></i> Profil Saya
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item py-2 text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i> Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main class="page-content">
        @if(isset($header))
            <div class="mb-4">
                {{ $header }}
            </div>
        @endif

        {{ $slot }}
    </main>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.querySelector('.toggle-btn');
        const sidebar = document.getElementById('sidebar');
        
        // Create backdrop for mobile
        const backdrop = document.createElement('div');
        backdrop.className = 'sidebar-backdrop';
        document.body.appendChild(backdrop);
        
        toggleBtn.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                sidebar.classList.toggle('show');
                backdrop.classList.toggle('show');
            } else {
                document.body.classList.toggle('sidebar-collapsed');
            }
        });
        
        backdrop.addEventListener('click', function() {
            sidebar.classList.remove('show');
            backdrop.classList.remove('show');
        });
        
        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('show');
                backdrop.classList.remove('show');
            }
        });
    });
</script>
</body>
</html>
