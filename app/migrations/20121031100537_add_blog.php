<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package             Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author              Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version             1.0
 * @license             MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Migration_Add_blog extends CI_Migration
{
    function up()
    {
        $this->dbforge->add_field(array(
            'blog_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
                ),
            'blog_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                ),
            'blog_description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
                ),
            ));
        $this->dbforge->add_key('blog_id', TRUE);
        $this->dbforge->create_table('blog');
    }

    function down()
    {
        $this->dbforge->drop_table('blog');
    }
}