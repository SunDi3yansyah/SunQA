<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Migration_Create_category extends CI_Migration
{
    function up()
    {
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
    }

    function down()
    {
        $this->dbforge->drop_table('category');
    }
}