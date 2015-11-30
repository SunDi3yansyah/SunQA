# Final Project Pemrograman Web Lanjut

__PERANCANGAN WEBSITE SISTEM TANYA JAWAB__

Final Project Pemrograman Web Lanjut

![Thanks to](https://raw.githubusercontent.com/SunDi3yansyah/FinalProjectPWL/master/assets/images/common/thanks-to.png)

### Rincian Mahasiswa

Nama | NIM | Email | Dosen
------------ | ------------- | ------------- | -------------
Cahyadi Triyansyah | 10.11.3735 | [![email](https://lh5.googleusercontent.com/-zu90QT4iXGA/VlT0XTODSaI/AAAAAAAABGU/1Fho2lUhHM4/s20-no/email-github-20.png)](mailto:cahyadi.t@students.amikom.ac.id) | M. Rudyanto Arief, MT 

### Synopsis Project

Aplikasi ini dibuat untuk memenuhi matakuliah Pemrograman Web Lanjut. Saya disini membuat aplikasi sistem Tanya Jawab (Question Answer) kurang lebih seperti Stackoverflow atau sejenisnya. Dibangun dengan CodeIgniter versi 3 dan sudah ditambah konfigursi [deploy hooks](https://developers.openshift.com/en/managing-modifying-applications.html) sehingga membentuk sedemikian rupa. Aplikasi ini di testing / demo pada hosting [OpenShift](https://www.openshift.com/) Online (Server: AWS) yang bisa anda lihat di [https://pwl-cahyadi3yansyah.rhcloud.com](https://pwl-cahyadi3yansyah.rhcloud.com).

### Structure Database

#### Tables

```
+------------------+
| Tables_in_pwl    |
+------------------+
| pwl_answer       |
| pwl_category     |
| pwl_comment      |
| pwl_migrations   |
| pwl_question     |
| pwl_question_tag |
| pwl_role         |
| pwl_session      |
| pwl_tag          |
| pwl_user         |
| pwl_vote         |
+------------------+
```

#### Structure in Table
__pwl_answer__
```
+--------------------+----------+------+-----+---------+----------------+
| Field              | Type     | Null | Key | Default | Extra          |
+--------------------+----------+------+-----+---------+----------------+
| id_answer          | int(11)  | NO   | PRI | NULL    | auto_increment |
| user_id            | int(11)  | NO   | MUL | NULL    |                |
| question_id        | int(11)  | NO   | MUL | NULL    |                |
| description_answer | text     | NO   |     | NULL    |                |
| answer_date        | datetime | NO   |     | NULL    |                |
| answer_update      | datetime | YES  |     | NULL    |                |
+--------------------+----------+------+-----+---------+----------------+
```
__pwl_category__
```
+---------------+-------------+------+-----+---------+----------------+
| Field         | Type        | Null | Key | Default | Extra          |
+---------------+-------------+------+-----+---------+----------------+
| id_category   | int(11)     | NO   | PRI | NULL    | auto_increment |
| category_name | varchar(50) | NO   |     | NULL    |                |
+---------------+-------------+------+-----+---------+----------------+
```
__pwl_comment__
```
+---------------------+---------------------------+------+-----+---------+----------------+
| Field               | Type                      | Null | Key | Default | Extra          |
+---------------------+---------------------------+------+-----+---------+----------------+
| id_comment          | int(11)                   | NO   | PRI | NULL    | auto_increment |
| user_id             | int(11)                   | NO   | MUL | NULL    |                |
| question_id         | int(11)                   | YES  | MUL | NULL    |                |
| answer_id           | int(11)                   | YES  | MUL | NULL    |                |
| comment_in          | enum('Question','Answer') | NO   |     | NULL    |                |
| description_comment | text                      | NO   |     | NULL    |                |
| comment_date        | datetime                  | NO   |     | NULL    |                |
| comment_update      | datetime                  | YES  |     | NULL    |                |
+---------------------+---------------------------+------+-----+---------+----------------+
```
__pwl_migrations__
```
+---------+------------+------+-----+---------+-------+
| Field   | Type       | Null | Key | Default | Extra |
+---------+------------+------+-----+---------+-------+
| version | bigint(20) | NO   |     | NULL    |       |
+---------+------------+------+-----+---------+-------+
```
__pwl_question__
```
+----------------------+--------------+------+-----+---------+----------------+
| Field                | Type         | Null | Key | Default | Extra          |
+----------------------+--------------+------+-----+---------+----------------+
| id_question          | int(11)      | NO   | PRI | NULL    | auto_increment |
| user_id              | int(11)      | NO   | MUL | NULL    |                |
| subject              | varchar(100) | NO   |     | NULL    |                |
| category_id          | int(11)      | NO   | MUL | NULL    |                |
| description_question | text         | NO   |     | NULL    |                |
| answer_id            | int(11)      | YES  | MUL | NULL    |                |
| question_date        | datetime     | NO   |     | NULL    |                |
| question_update      | datetime     | YES  |     | NULL    |                |
| viewers              | int(11)      | YES  |     | NULL    |                |
| url_question         | varchar(250) | NO   |     | NULL    |                |
+----------------------+--------------+------+-----+---------+----------------+
```
__pwl_question_tag__
```
+-------------+---------+------+-----+---------+----------------+
| Field       | Type    | Null | Key | Default | Extra          |
+-------------+---------+------+-----+---------+----------------+
| id_qt       | int(11) | NO   | PRI | NULL    | auto_increment |
| question_id | int(11) | NO   | MUL | NULL    |                |
| tag_id      | int(11) | NO   | MUL | NULL    |                |
+-------------+---------+------+-----+---------+----------------+
```
__pwl_role__
```
+-----------+-------------+------+-----+---------+----------------+
| Field     | Type        | Null | Key | Default | Extra          |
+-----------+-------------+------+-----+---------+----------------+
| id_role   | int(11)     | NO   | PRI | NULL    | auto_increment |
| role_name | varchar(25) | NO   |     | NULL    |                |
+-----------+-------------+------+-----+---------+----------------+
```
__pwl_session__
```
+------------+------------------+------+-----+---------+-------+
| Field      | Type             | Null | Key | Default | Extra |
+------------+------------------+------+-----+---------+-------+
| id         | varchar(40)      | NO   |     | NULL    |       |
| ip_address | varchar(45)      | NO   |     | NULL    |       |
| timestamp  | int(10) unsigned | NO   | MUL | 0       |       |
| data       | blob             | NO   |     | NULL    |       |
+------------+------------------+------+-----+---------+-------+
```
__pwl_tag__
```
+----------+-------------+------+-----+---------+----------------+
| Field    | Type        | Null | Key | Default | Extra          |
+----------+-------------+------+-----+---------+----------------+
| id_tag   | int(11)     | NO   | PRI | NULL    | auto_increment |
| tag_name | varchar(50) | NO   |     | NULL    |                |
+----------+-------------+------+-----+---------+----------------+
```
__pwl_user__
```
+----------------+--------------+------+-----+-------------------+-----------------------------+
| Field          | Type         | Null | Key | Default           | Extra                       |
+----------------+--------------+------+-----+-------------------+-----------------------------+
| id_user        | int(11)      | NO   | PRI | NULL              | auto_increment              |
| username       | varchar(25)  | NO   | UNI | NULL              |                             |
| password       | varchar(200) | NO   |     | NULL              |                             |
| activated      | tinyint(4)   | NO   |     | 0                 |                             |
| nama           | varchar(100) | NO   |     | NULL              |                             |
| email          | varchar(100) | NO   | UNI | NULL              |                             |
| bio            | text         | NO   |     | NULL              |                             |
| web            | varchar(50)  | NO   |     | NULL              |                             |
| lokasi         | varchar(50)  | NO   |     | NULL              |                             |
| role_id        | int(11)      | NO   | MUL | 2                 |                             |
| user_date      | datetime     | NO   |     | NULL              |                             |
| last_login     | datetime     | YES  |     | NULL              |                             |
| last_ip        | varchar(50)  | YES  |     | NULL              |                             |
| modified       | timestamp    | NO   |     | CURRENT_TIMESTAMP | on update CURRENT_TIMESTAMP |
| lost_password  | varchar(50)  | YES  |     | NULL              |                             |
| image          | varchar(50)  | YES  |     | NULL              |                             |
| activated_hash | varchar(40)  | YES  |     | NULL              |                             |
+----------------+--------------+------+-----+-------------------+-----------------------------+
```
__pwl_vote__
```
+-------------+---------------------------+------+-----+---------+----------------+
| Field       | Type                      | Null | Key | Default | Extra          |
+-------------+---------------------------+------+-----+---------+----------------+
| id_vote     | int(11)                   | NO   | PRI | NULL    | auto_increment |
| user_id     | int(11)                   | NO   | MUL | NULL    |                |
| question_id | int(11)                   | YES  | MUL | NULL    |                |
| answer_id   | int(11)                   | YES  | MUL | NULL    |                |
| vote_in     | enum('Question','Answer') | NO   |     | NULL    |                |
+-------------+---------------------------+------+-----+---------+----------------+
```

### License
[![MIT License](https://img.shields.io/dub/l/vibe-d.svg)](LICENSE)