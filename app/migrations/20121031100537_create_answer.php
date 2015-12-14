<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Migration_Create_answer extends CI_Migration
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
    }

    function down()
    {
        $this->dbforge->drop_table('answer');
    }
}