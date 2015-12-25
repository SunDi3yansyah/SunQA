# Final Project Pemrograman Web Lanjut

__PERANCANGAN WEBSITE SISTEM TANYA JAWAB__

Final Project Pemrograman Web Lanjut

![Thanks to](https://raw.githubusercontent.com/SunDi3yansyah/FinalProjectPWL/master/assets/images/thanks-to.png)

### Details Student

Nama | NIM | Email | Dosen
------------ | ------------- | ------------- | -------------
Cahyadi Triyansyah | 10.11.3735 | [![email](https://lh5.googleusercontent.com/-zu90QT4iXGA/VlT0XTODSaI/AAAAAAAABGU/1Fho2lUhHM4/s20-no/email-github-20.png)](mailto:cahyadi.t@students.amikom.ac.id) | M. Rudyanto Arief, MT 

### Synopsis Project

Aplikasi ini dibuat untuk memenuhi matakuliah Pemrograman Web Lanjut. Saya disini membuat aplikasi sistem Tanya Jawab (Question Answer) kurang lebih seperti Stackoverflow atau sejenisnya. Dibangun dengan CodeIgniter versi 3 dan sudah ditambah konfigursi [deploy hooks](https://developers.openshift.com/en/managing-modifying-applications.html) sehingga membentuk sedemikian rupa. Aplikasi ini di testing / demo pada hosting [OpenShift](https://www.openshift.com/) Online (Server: AWS) yang bisa anda lihat di [https://pwl-cahyadi3yansyah.rhcloud.com](https://pwl-cahyadi3yansyah.rhcloud.com).

### Structure Database
[Watch this file](schema.md)

### Install
- Clone repository.
- Update your configuration
    - Copy file
    `app/config/development/config.php.origin` to `app/config/development/config.php`
    - Copy file
    `app/config/development/database.php.origin` to `app/config/development/database.php`
    - Copy file
    `app/config/qa.php.origin` to `app/config/qa.php`
    - Update this file that you want
- Create database
- Install schema database [http://localhost/migrate/install](http://localhost/migrate/install)

### License
[![MIT License](https://img.shields.io/dub/l/vibe-d.svg)](LICENSE)