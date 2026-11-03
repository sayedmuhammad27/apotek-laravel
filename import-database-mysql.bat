@echo off
title Import Database MySQL Apotek (XAMPP)
color 0a
echo ==============================================================
echo       IMPORT DATABASE APOTEK KE MYSQL XAMPP
echo ==============================================================
echo Pastikan MySQL di XAMPP Control Panel sudah AKTIF (Running).
echo.
pause

set MYSQL_PATH=D:\xampp\mysql\bin\mysql.exe
if not exist "%MYSQL_PATH%" set MYSQL_PATH=C:\xampp\mysql\bin\mysql.exe

"%MYSQL_PATH%" -u root -e "CREATE DATABASE IF NOT EXISTS apotek_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
"%MYSQL_PATH%" -u root apotek_db < database\apotek_db.sql

echo.
echo ==============================================================
echo Database apotek_db berhasil diimport ke MySQL!
echo Silakan ubah DB_CONNECTION=mysql di file .env jika ingin menggunakan MySQL.
echo ==============================================================
pause
