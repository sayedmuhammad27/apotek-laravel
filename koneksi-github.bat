@echo off
title Hubungkan Projek ke Akun GitHub
color 0e
echo ==============================================================
echo       KONEKSIKAN PROJEK KE AKUN GITHUB
echo       User terdeteksi: sayedmuhammad27
echo ==============================================================
echo.
echo 1. Pastikan Anda sudah membuat repository baru di https://github.com/new
echo    (Contoh nama repo: apotek-laravel atau projek-kelompok-apotek)
echo 2. Pilih visibility: Public atau Private sesuai kebutuhan.
echo 3. JANGAN centang "Add a README file" atau .gitignore karena sudah ada.
echo.
echo Masukkan URL Repository GitHub Anda:
set /p REPO_URL="Contoh (https://github.com/sayedmuhammad27/apotek-laravel.git): "

if "%REPO_URL%"=="" (
    echo [ERROR] URL repository tidak boleh kosong!
    pause
    exit /b
)

echo.
echo [1/3] Memeriksa remote origin saat ini...
git remote remove origin 2>nul
git remote add origin %REPO_URL%

echo [2/3] Memastikan branch utama adalah 'main'...
git branch -M main

echo [3/3] Melakukan push commit ke GitHub...
git push -u origin main

echo.
if %errorlevel% equ 0 (
    echo ==============================================================
    echo  SELAMAT! PROJEK BERHASIL TERHUBUNG & TERUPLOAD KE GITHUB!
    echo  Repository: %REPO_URL%
    echo ==============================================================
) else (
    echo ==============================================================
    echo  Push memerlukan autentikasi GitHub.
    echo  Jika diminta login, masukkan kredensial akun GitHub Anda di browser.
    echo ==============================================================
)
pause
