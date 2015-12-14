<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Migration_Create_session extends CI_Migration
{
    function up()
    {
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
    }

    function down()
    {
        $this->dbforge->drop_table('session');
    }
}