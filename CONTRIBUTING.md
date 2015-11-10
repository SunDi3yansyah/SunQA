# Contributing Project PWL

Repository ini hanya menerima commit & push kontribusi dari anggota kelompok untuk tugas Pemrograman Web Lanjut.

## Fork, Clone, Push

- Fork [![GitHub forks](https://img.shields.io/github/forks/SunDi3yansyah/projectPWL.svg?style=social&label=Fork)](https://github.com/SunDi3yansyah/projectPWL) repository ini
- Buka terminal / cmd / git bash
- Masuk ke directory yang dinginkan
- Masukkan perintah berikut `git clone git@github.com:USERNAME/projectPWL.git`
- Maka project dapat dilihat pada directory __projectPWL__ dengan melakukan perintah `cd projectPWL`
- Lakukan perubahan
- Commit & Push ke repository sendiri
- Ajukan Pull Request

## Konfirgurasi Site

- Salin file
    `app/config/development/config.php.origin` dan `app/config/development/database.php.origin`
    Menjadi
    `app/config/development/config.php` dan `app/config/development/database.php`
- Lakukan perubahan yang diperlukan pada file `app/config/development/config.php`
- Masuk ke interface database MySQL dan buat database, namanya terserah sebagai contoh __projectPWL__
- Import SQL file `projectPWL.sql`
- Lakukan perubahan yang diperlukan pda file `app/config/development/database.php` sesuaikan dengan konfigurasi database pada perangkat yang kalian gunakan
- Situs dapat dibuka seperti [https://localhost](https://localhost), [https://localhost/projectPWL](https://localhost/projectPWL)
