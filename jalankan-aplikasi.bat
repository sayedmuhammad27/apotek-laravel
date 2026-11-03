@echo off
title Menjalankan Sistem Informasi Apotek (Laravel 12)
color 0b
echo ==============================================================
echo      SISTEM INFORMASI APOTEK - PROJEK KELOMPOK
echo      Laravel 12 + SQLite/MySQL + Postman API
echo ==============================================================
echo.

if not exist ".env" (
    echo [INFO] Menyalin konfigurasi .env.example ke .env...
    copy .env.example .env
    php artisan key:generate
)

if not exist "database\database.sqlite" (
    echo [INFO] Menyiapkan database SQLite lokal...
    type nul > database\database.sqlite
    php artisan migrate:fresh --seed
)

echo.
echo [1/2] Membuka browser ke http://127.0.0.1:8000...
start http://127.0.0.1:8000

echo [2/2] Menjalankan server Laravel (port 8000)...
echo Tekan CTRL + C untuk mematikan server.
echo.
php artisan serve --host=127.0.0.1 --port=8000
pause
