@echo off
title Sistem Informasi Apotek (Laravel & MySQL XAMPP)
color 0b
echo ==============================================================
echo       SISTEM INFORMASI APOTEK - PROJEK KELOMPOK
echo       Laravel 12 + MySQL XAMPP + Postman API
echo ==============================================================
echo.
echo Pastikan MySQL di XAMPP Control Panel sudah AKTIF (Running)!
echo.

if not exist ".env" (
    echo Menyalin .env.example ke .env...
    copy .env.example .env
    php artisan key:generate
)

echo [1/2] Membuka browser ke http://127.0.0.1:8000...
start http://127.0.0.1:8000

echo [2/2] Menjalankan web server Laravel...
echo Tekan CTRL + C untuk menghentikan server.
echo.
php artisan serve --host=127.0.0.1 --port=8000
pause
