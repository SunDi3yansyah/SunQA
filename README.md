# Question Answer

Aplikasi sistem Tanya Jawab (Question Answer) kurang lebih seperti Stackoverflow atau sejenisnya, dibangun dengan:

- CodeIgniter versi 3
- UI
    - Metro UI CSS
    - Twitter Bootstrap

### Install
- Download:
    - Bisa menggunakan download arsip via zip atau tarball.
    - Bisa menggunakan `git` dengan perintah `git clone`.
    - Atau bisa juga menggunakan bower.
- Perbarui konfigurasi dibawah ini:
    - Salin file
    `app/config/development/config.php.origin` menjadi `app/config/development/config.php`
    - Salin file
    `app/config/development/database.php.origin` menjadi `app/config/development/database.php`
    - Salin file
    `app/config/qa.php.origin` to `app/config/qa.php`.
    - Atau anda cukup me-rename file tersebut.
    - Perbarui isi dari ketiga file diatas sesuaikan keinginan anda.
- Buat Basis Data, sebagai contoh `qa` atau `QuestionAnswer`. Saya anggap anda sudah mengerti cara membuat Basis Data pada MySQL Server, tidak lupa untuk memperbarui kembali file `database.php` anda sesuai nama Basis Data yang telah dibuat.
- Buat aturan Rewrite Rules untuk menghapus url index.php
    - Jika anda pengguna Apache bisa anda baca pada dokumentasi CodeIgniter ([Removing the index.php file](http://www.codeigniter.com/user_guide/general/urls.html#removing-the-index-php-file)).
    - Jika anda pengguna NGINX bisa baca dokumentasinya [disini](https://www.nginx.com/resources/wiki/start/topics/recipes/codeigniter/).
    - Jika anda selain pengguna Web Server diatas, anda bisa mencarinya disetiap dokumentasi web server yang anda gunakan.
- Install schema Basis Data [http://host/migrate/install](http://host/migrate/install) atau lain sebagainya sesuaikan dengan virtualhost masing-masing.

### Structure Database
[SCHEMA.md](SCHEMA.md)

### Contributing
[CONTRIBUTING.md](CONTRIBUTING.md)

### License
[![MIT License](https://img.shields.io/dub/l/vibe-d.svg)](LICENSE)