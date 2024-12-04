# SIMPLE PAYMENT GATEWAY (BE)

## Perkenalan
Ini adalah aplikasi gateway pembayaran sederhana bagian backend/api yang dibuat menggunakan laravel. Aplikasi ini dibuat dengan tujuan untuk memenuhi kebutuhan teknis/coding tes di PT Kode Kolektif Indonesia.

## Cara Instalasi
Aplikasi ini dapat diinstal pada server lokal maupun online dengan spesifikasi berikut:

### Kebutuhan Server
1. Minimal PHP 8.2 (dan sesuai dengan [persyaratan server Laravel 11.x](https://laravel.com/docs/11.x/deployment#server-requirements)).
2. Database MySQL atau MariaDB.

### Langkah Instalasi
1. Clone repositori ini dengan perintah: `git clone https://github.com/agasigp/simple-payment-gateway.git`
2. Masuk ke direktori simple-payment-gateway: `$ cd simple-payment-gateway`
3. Instal dependensi menggunakan: `$ composer install`
4. Salin berkas `.env.example` ke `.env`: `$ cp .env.example .env`
5. Generate kunci aplikasi: `$ php artisan key:generate`
6. Buat database MySQL untuk aplikasi ini.
7. Konfigurasi database dan pengaturan lainnya yang dibutuhkan di berkas `.env`.
    ```
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=nama_db
    DB_PASSWORD=username_db
    ```
8. Jalankan migrasi database: `$ php artisan migrate --seed`.
9. Mulai server: `$ php artisan serve`
10. Untuk akses dokumentasi api, bisa dicek di [https://documenter.getpostman.com/view/398070/2sAYBa9V7S](https://documenter.getpostman.com/view/398070/2sAYBa9V7S)
