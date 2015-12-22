<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Migration_Create_comment extends CI_Migration
{
    function up()
    {
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
    }

    function down()
    {
        $this->dbforge->drop_table('comment');
    }
}