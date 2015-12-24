<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Migration_Create_init_schemadb extends CI_Migration
{
    function up()
    {
        $this->dbforge->add_field(array(
            'id_answer' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
                ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11
                ),
            'question_id' => array(
                'type' => 'INT',
                'constraint' => 11
                ),
            'description_answer' => array(
                'type' => 'TEXT'
                ),
            'answer_date' => array(
                'type' => 'DATETIME'
                ),
            'answer_update' => array(
                'type' => 'DATETIME',
                'null' => TRUE
                )
            ));
        $this->dbforge->add_key('id_answer', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->add_key('question_id');
        $engine = array('ENGINE' => 'InnoDB');
        $this->dbforge->create_table('answer', FALSE, $engine);

        $this->dbforge->add_field(array(
            'id_category' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
                ),
            'category_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
            ));
        $this->dbforge->add_key('id_category', TRUE);
        $engine = array('ENGINE' => 'InnoDB');
        $this->dbforge->create_table('category', FALSE, $engine);

        $this->dbforge->add_field(array(
            'id_comment' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
                ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11
                ),
            'question_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
                'default' => NULL
                ),
            'answer_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
                'default' => NULL
                ),
            'comment_in' => array(
                'type' => 'ENUM("Question", "Answer")'
                ),
            'description_comment' => array(
                'type' => 'TEXT'
                ),
            'comment_date' => array(
                'type' => 'DATETIME'
                ),
            'comment_update' => array(
                'type' => 'DATETIME',
                'null' => TRUE
                ),
            ));
        $this->dbforge->add_key('id_comment', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->add_key('question_id');
        $this->dbforge->add_key('answer_id');
        $engine = array('ENGINE' => 'InnoDB');
        $this->dbforge->create_table('comment', FALSE, $engine);

        $this->dbforge->add_field(array(
            'id_question' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
                ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11
                ),
            'subject' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
                ),
            'category_id' => array(
                'type' => 'INT',
                'constraint' => 11
                ),
            'description_question' => array(
                'type' => 'TEXT'
                ),
            'answer_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
                'default' => NULL
                ),
            'question_date' => array(
                'type' => 'DATETIME'
                ),
            'question_update' => array(
                'type' => 'DATETIME',
                'null' => TRUE
                ),
            'viewers' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
                ),
            'url_question' => array(
                'type' => 'VARCHAR',
                'constraint' => 250
                )
            ));
        $this->dbforge->add_key('id_question', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->add_key('category_id');
        $this->dbforge->add_key('answer_id');
        $engine = array('ENGINE' => 'InnoDB');
        $this->dbforge->create_table('question', FALSE, $engine);
        
        $this->dbforge->add_field(array(
            'id_qt' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
                ),
            'question_id' => array(
                'type' => 'INT',
                'constraint' => 11
                ),
            'tag_id' => array(
                'type' => 'INT',
                'constraint' => 11
                )
            ));
        $this->dbforge->add_key('id_qt', TRUE);
        $this->dbforge->add_key('question_id');
        $this->dbforge->add_key('tag_id');
        $engine = array('ENGINE' => 'InnoDB');
        $this->dbforge->create_table('question_tag', FALSE, $engine);

        $this->dbforge->add_field(array(
            'id_role' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
                ),
            'role_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 25
                )
            ));
        $this->dbforge->add_key('id_role', TRUE);
        $this->dbforge->create_table('role');

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 40
                ),
            'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => 45
                ),
            'timestamp' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
                'unsigned' => TRUE
                ),
            'data' => array(
                'type' => 'BLOB'
                )
            ));
        $this->dbforge->add_key('id', TRUE);
        $engine = array('ENGINE' => 'InnoDB');
        $this->dbforge->create_table('session', FALSE, $engine);

        $this->dbforge->add_field(array(
            'id_tag' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
                ),
            'tag_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                )
            ));
        $this->dbforge->add_key('id_tag', TRUE);
        $engine = array('ENGINE' => 'InnoDB');
        $this->dbforge->create_table('tag', FALSE, $engine);

        $this->dbforge->add_field(array(
            'id_user' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
                ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => 25
                ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => 200
                ),
            'activated' => array(
                'type' => 'TINYINT',
                'constraint' => 4,
                'default' => 0
                ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
                ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
                ),
            'bio' => array(
                'type' => 'TEXT'
                ),
            'web' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
            'lokasi' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
            'role_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 2
                ),
            'user_date' => array(
                'type' => 'DATETIME'
                ),
            'last_login' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
                'default' => NULL
                ),
            'last_ip' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE,
                'default' => NULL
                ),
            'modified TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'lost_password' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE,
                'default' => NULL
                ),
            'image' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE,
                'default' => NULL
                ),
            'activated_hash' => array(
                'type' => 'VARCHAR',
                'constraint' => 40,
                'null' => TRUE,
                'default' => NULL
                )
            ));
        $this->dbforge->add_key('id_user', TRUE);
        $this->dbforge->add_key('role_id');
        $engine = array('ENGINE' => 'InnoDB');
        $this->dbforge->create_table('user', FALSE, $engine);
        
        $this->dbforge->add_field(array(
            'id_vote' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
                ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11
                ),
            'question_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
                'default' => NULL
                ),
            'answer_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
                'default' => NULL,
                ),
            'vote_in' => array(
                'type' => 'ENUM("Question", "Answer")'
                ),
            'vote_date' => array(
                'type' => 'DATETIME'
                ),
            'vote_update' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
                'default' => NULL
                ),
            'vote_for' => array(
                'type' => 'ENUM("Up", "Down")'
                )
            ));
        $this->dbforge->add_key('id_vote', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->add_key('question_id');
        $this->dbforge->add_key('answer_id');
        $engine = array('ENGINE' => 'InnoDB');
        $this->dbforge->create_table('vote', FALSE, $engine);

        $role = array(
            array(
                'role_name' => 'Administrator',
                ),
            array(
                'role_name' => 'User',
                )
            );
        $this->db->insert_batch('role', $role);

        $this->load->library('phpass');
        $user = array(
                'username' => 'root',
                'password' => $this->phpass->hash_password('passwd'),
                'activated' => '1',
                'nama' => 'My Name is ROOT',
                'email' => 'example@localhost',
                'bio' => '',
                'web' => 'localhost',
                'lokasi' => date_default_timezone_get(),
                'role_id' => '1',
                'user_date' => date('Y-m-d H-i-s'),
            );
        $this->db->insert('user', $user);
    }

    function down()
    {
        $this->dbforge->drop_table('answer');
        $this->dbforge->drop_table('category');
        $this->dbforge->drop_table('comment');
        $this->dbforge->drop_table('question');
        $this->dbforge->drop_table('question_tag');
        $this->dbforge->drop_table('role');
        $this->dbforge->drop_table('session');
        $this->dbforge->drop_table('tag');
        $this->dbforge->drop_table('user');
        $this->dbforge->drop_table('vote');
    }
}