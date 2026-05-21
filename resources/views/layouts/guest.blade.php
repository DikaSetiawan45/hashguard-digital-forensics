<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'HashGuard') }} - Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <style>
            body {
                font-family: 'Inter', sans-serif;
                background-color: #f8fafc;
                margin: 0;
                padding: 0;
                overflow-x: hidden;
            }
            
            /* Typography specifics based on image */
            .text-navy {
                color: #0f172a;
            }
            .text-blue-primary {
                color: #2563eb;
            }
            .text-gray-custom {
                color: #64748b;
            }
            
            /* Custom Form Controls */
            .custom-input-group {
                background-color: #ffffff;
                border: 1px solid #e2e8f0;
                border-radius: 0.75rem;
                overflow: hidden;
                transition: all 0.2s ease-in-out;
            }
            .custom-input-group:focus-within {
                border-color: #3b82f6;
                box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            }
            .custom-input-group .input-group-text {
                background-color: transparent;
                border: none;
                color: #94a3b8;
                padding-right: 0;
                padding-left: 1.25rem;
            }
            .custom-input-group .form-control {
                border: none;
                background-color: transparent;
                padding-left: 0.75rem;
                padding-right: 1.25rem;
                font-size: 0.95rem;
                color: #334155;
            }
            .custom-input-group .form-control:focus {
                box-shadow: none;
            }
            
            /* Form Labels */
            .form-label-custom {
                font-size: 0.75rem;
                font-weight: 700;
                letter-spacing: 0.05em;
                color: #334155;
                text-transform: uppercase;
                margin-bottom: 0.5rem;
            }
            
            /* Checkbox */
            .form-check-input {
                border-color: #cbd5e1;
                width: 1.1em;
                height: 1.1em;
                margin-top: 0.15em;
            }
            .form-check-input:checked {
                background-color: #3b82f6;
                border-color: #3b82f6;
            }
            
            /* Button Gradient */
            .btn-gradient {
                background: linear-gradient(to right, #2563eb, #7c3aed);
                border: none;
                color: white;
                font-weight: 600;
                border-radius: 0.5rem;
                padding: 0.85rem 1.5rem;
                transition: transform 0.2s, box-shadow 0.2s, opacity 0.2s;
            }
            .btn-gradient:hover {
                transform: translateY(-1px);
                box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.3);
                opacity: 0.95;
                color: white;
            }
            
            /* Feature Cards */
            .feature-card {
                background-color: #ffffff;
                border-radius: 1rem;
                padding: 1.25rem;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
                text-align: center;
                transition: transform 0.2s;
            }
            .feature-card:hover {
                transform: translateY(-3px);
            }
            .feature-icon-wrapper {
                width: 48px;
                height: 48px;
                border-radius: 0.75rem;
                background-color: #eff6ff;
                color: #3b82f6;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 0.75rem auto;
                font-size: 1.5rem;
            }
            
            /* Background subtle waves */
            .bg-waves {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 0;
                opacity: 0.6;
                background: 
                    radial-gradient(circle at 10% 90%, rgba(224, 231, 255, 0.7) 0%, transparent 40%),
                    radial-gradient(circle at 90% 10%, rgba(224, 231, 255, 0.7) 0%, transparent 40%);
            }
        </style>
    </head>
    <body>
        {{ $slot }}

        <!-- Bootstrap 5 JS Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
