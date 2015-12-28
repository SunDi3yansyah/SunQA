### Structure Database

#### Tables

```
+-----------------------+
| Tables_in_dbprefix    |
+-----------------------+
| dbprefix_answer       |
| dbprefix_category     |
| dbprefix_comment      |
| dbprefix_migrations   |
| dbprefix_question     |
| dbprefix_question_tag |
| dbprefix_role         |
| dbprefix_session      |
| dbprefix_tag          |
| dbprefix_user         |
| dbprefix_vote         |
+-----------------------+
```

#### Structure in Table

__dbprefix_answer__
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

__dbprefix_category__
```
+---------------+-------------+------+-----+---------+----------------+
| Field         | Type        | Null | Key | Default | Extra          |
+---------------+-------------+------+-----+---------+----------------+
| id_category   | int(11)     | NO   | PRI | NULL    | auto_increment |
| category_name | varchar(50) | NO   |     | NULL    |                |
+---------------+-------------+------+-----+---------+----------------+
```

__dbprefix_comment__
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

__dbprefix_migrations__
```
+---------+------------+------+-----+---------+-------+
| Field   | Type       | Null | Key | Default | Extra |
+---------+------------+------+-----+---------+-------+
| version | bigint(20) | NO   |     | NULL    |       |
+---------+------------+------+-----+---------+-------+
```

__dbprefix_question__
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
| viewers              | int(11)      | NO   |     | 0       |                |
| url_question         | varchar(250) | NO   |     | NULL    |                |
+----------------------+--------------+------+-----+---------+----------------+
```

__dbprefix_question_tag__
```
+-------------+---------+------+-----+---------+----------------+
| Field       | Type    | Null | Key | Default | Extra          |
+-------------+---------+------+-----+---------+----------------+
| id_qt       | int(11) | NO   | PRI | NULL    | auto_increment |
| question_id | int(11) | NO   | MUL | NULL    |                |
| tag_id      | int(11) | NO   | MUL | NULL    |                |
+-------------+---------+------+-----+---------+----------------+
```

__dbprefix_role__
```
+-----------+-------------+------+-----+---------+----------------+
| Field     | Type        | Null | Key | Default | Extra          |
+-----------+-------------+------+-----+---------+----------------+
| id_role   | int(11)     | NO   | PRI | NULL    | auto_increment |
| role_name | varchar(25) | NO   |     | NULL    |                |
+-----------+-------------+------+-----+---------+----------------+
```

__dbprefix_session__
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

__dbprefix_tag__
```
+----------+-------------+------+-----+---------+----------------+
| Field    | Type        | Null | Key | Default | Extra          |
+----------+-------------+------+-----+---------+----------------+
| id_tag   | int(11)     | NO   | PRI | NULL    | auto_increment |
| tag_name | varchar(50) | NO   |     | NULL    |                |
+----------+-------------+------+-----+---------+----------------+
```

__dbprefix_user__
```
+----------------+--------------+------+-----+-------------------+-----------------------------+
| Field          | Type         | Null | Key | Default           | Extra                       |
+----------------+--------------+------+-----+-------------------+-----------------------------+
| id_user        | int(11)      | NO   | PRI | NULL              | auto_increment              |
| username       | varchar(25)  | NO   |     | NULL              |                             |
| password       | varchar(200) | NO   |     | NULL              |                             |
| activated      | tinyint(4)   | NO   |     | 0                 |                             |
| nama           | varchar(100) | NO   |     | NULL              |                             |
| email          | varchar(100) | NO   |     | NULL              |                             |
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

__dbprefix_vote__
```
+-------------+---------------------------+------+-----+---------+----------------+
| Field       | Type                      | Null | Key | Default | Extra          |
+-------------+---------------------------+------+-----+---------+----------------+
| id_vote     | int(11)                   | NO   | PRI | NULL    | auto_increment |
| user_id     | int(11)                   | NO   | MUL | NULL    |                |
| question_id | int(11)                   | YES  | MUL | NULL    |                |
| answer_id   | int(11)                   | YES  | MUL | NULL    |                |
| vote_in     | enum('Question','Answer') | NO   |     | NULL    |                |
| vote_date   | datetime                  | NO   |     | NULL    |                |
| vote_update | datetime                  | YES  |     | NULL    |                |
| vote_for    | enum('Up','Down')         | NO   |     | NULL    |                |
+-------------+---------------------------+------+-----+---------+----------------+
```