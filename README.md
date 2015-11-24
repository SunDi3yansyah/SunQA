# Final Project Pemrograman Web Lanjut

__PERANCANGAN WEBSITE SISTEM TANYA JAWAB__

Final Project Pemrograman Web Lanjut

#### Rincian Mahasiswa
Nama | NIM | Email | Dosen
------------ | -------------
Cahyadi Triyansyah | 10.11.3735 | [cahyadi.t@students.amikom.ac.id](mailto:cahyadi.t@students.amikom.ac.id) | M. Rudyanto Arief, MT

#### Synopsis Project

Aplikasi ini dibuat untuk memenuhi matakuliah Pemrograman Web Lanjut. Saya disini membuat aplikasi sistem Tanya Jawab (Question Answer) kurang lebih seperti Stackoverflow atau sejenisnya. Dibangun dengan CodeIgniter versi 3 dan sudah ditambah konfigursi [deploy hooks](https://developers.openshift.com/en/managing-modifying-applications.html) sehingga membentuk sedemikian rupa. Aplikasi ini di testing / demo pada hosting [OpenShift](https://www.openshift.com/) Online (Server: AWS) yang bisa anda lihat di [https://pwl-cahyadi3yansyah.rhcloud.com](https://pwl-cahyadi3yansyah.rhcloud.com).

#### Struckture Database

##### Tables

```
+------------------+
| Tables_in_pwl    |
+------------------+
| pwl_answer       |
| pwl_category     |
| pwl_comment      |
| pwl_question     |
| pwl_question_tag |
| pwl_role         |
| pwl_session      |
| pwl_tag          |
| pwl_user         |
| pwl_vote         |
+------------------+
```

##### Structure in Table
__pwl_answer__
```
+--------------------+---------+------+-----+---------+----------------+
| Field              | Type    | Null | Key | Default | Extra          |
+--------------------+---------+------+-----+---------+----------------+
| id_answer          | int(11) | NO   | PRI | NULL    | auto_increment |
| user_id            | int(11) | NO   | MUL | NULL    |                |
| question_id        | int(11) | NO   | MUL | NULL    |                |
| description_answer | text    | NO   |     | NULL    |                |
+--------------------+---------+------+-----+---------+----------------+
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
| comment_in          | enum('question','answer') | NO   |     | NULL    |                |
| description_comment | text                      | NO   |     | NULL    |                |
+---------------------+---------------------------+------+-----+---------+----------------+
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
| answer_id            | int(11)      | NO   | MUL | NULL    |                |
+----------------------+--------------+------+-----+---------+----------------+
```
__pwl_question_tag__
```
+-------------+---------+------+-----+---------+----------------+
| Field       | Type    | Null | Key | Default | Extra          |
+-------------+---------+------+-----+---------+----------------+
| id_qc       | int(11) | NO   | PRI | NULL    | auto_increment |
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
```+---------------+--------------+------+-----+---------+----------------+
| Field         | Type         | Null | Key | Default | Extra          |
+---------------+--------------+------+-----+---------+----------------+
| id_user       | int(11)      | NO   | PRI | NULL    | auto_increment |
| username      | varchar(25)  | NO   |     | NULL    |                |
| password      | varchar(50)  | NO   |     | NULL    |                |
| activated     | tinyint(4)   | NO   |     | NULL    |                |
| nama          | varchar(100) | NO   |     | NULL    |                |
| email         | varchar(100) | NO   |     | NULL    |                |
| bio           | text         | NO   |     | NULL    |                |
| web           | varchar(50)  | NO   |     | NULL    |                |
| lokasi        | varchar(50)  | NO   |     | NULL    |                |
| role_id       | int(11)      | NO   | MUL | NULL    |                |
| create_date   | datetime     | NO   |     | NULL    |                |
| last_login    | datetime     | NO   |     | NULL    |                |
| last_ip       | varchar(50)  | NO   |     | NULL    |                |
| modified      | datetime     | NO   |     | NULL    |                |
| lost_password | varchar(50)  | NO   |     | NULL    |                |
+---------------+--------------+------+-----+---------+----------------+
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
| vote_in     | enum('question','answer') | NO   |     | NULL    |                |
+-------------+---------------------------+------+-----+---------+----------------+
```

#### Thanks to
[![Amikom](https://lh5.googleusercontent.com/-NWphcCvKD3E/VlTt7f15FLI/AAAAAAAABEA/JDH5QDSPLmc/w148-h150-no/logo_amikom_cover150.jpg)](http://amikom.ac.id) [![CodeIgniter](http://www.codeigniter.com/assets/images/ci-logo-big.png)](http://www.codeigniter.com/) [![Openshift online](https://lh3.googleusercontent.com/-YeznvYHUBis/VlTv1qUeUiI/AAAAAAAABFY/Sm65sUeiB-M/w160-h150-no/redhat_reverse.png)](https://www.openshift.com) [![github](https://lh3.googleusercontent.com/-Icom7BsPUc8/VlTvLZ9L0SI/AAAAAAAABEw/kUWn7MCjhJ4/s150-no/GitHub-Mark150.png)](https://github.com)

#### License
[![MIT License](https://img.shields.io/dub/l/vibe-d.svg)](LICENSE)