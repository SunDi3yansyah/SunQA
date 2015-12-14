<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Migration_Create_question_tag extends CI_Migration
{
    function up()
    {
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
    }

    function down()
    {
        $this->dbforge->drop_table('question_tag');
    }
}