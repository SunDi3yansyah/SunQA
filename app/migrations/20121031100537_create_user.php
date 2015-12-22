<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Migration_Create_user extends CI_Migration
{
    function up()
    {
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
    }

    function down()
    {
        $this->dbforge->drop_table('user');
    }
}