<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom CSS for the loading spinner -->
        <style>
            .loading-overlay {
                position: fixed;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                background: rgba(255, 255, 255, 0.8);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 9999;
                display: none; /* Hidden by default */
            }

            .spinner {
                border: 16px solid #f3f3f3;
                border-top: 16px solid #3498db;
                border-radius: 50%;
                width: 120px;
                height: 120px;
                animation: spin 2s linear infinite;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="loading-overlay" id="loading-overlay">
            <div class="spinner"></div>
        </div>

        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- Custom JavaScript for the loading spinner -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var loadingOverlay = document.getElementById('loading-overlay');
                
                // Show the loading spinner before the page is fully loaded
                loadingOverlay.style.display = 'flex';

                window.addEventListener('load', function() {
                    // Hide the loading spinner once the page is fully loaded
                    loadingOverlay.style.display = 'none';
                });

                // Optionally, you can also hide the spinner after a certain timeout
                setTimeout(function() {
                    loadingOverlay.style.display = 'none';
                }, 5000); // 5 seconds timeout
            });
        </script>
    </body>
</html>

