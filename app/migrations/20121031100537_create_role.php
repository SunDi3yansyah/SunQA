<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Migration_Create_role extends CI_Migration
{
    function up()
    {
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
    }

    function down()
    {
        $this->dbforge->drop_table('role');
    }
}