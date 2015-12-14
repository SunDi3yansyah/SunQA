<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Migration_Create_vote extends CI_Migration
{
    function up()
    {
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
                'default' => NULL
                ),
            'answer_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => NULL,
                ),
            'vote_in' => array(
                'type' => 'ENUM("Question", "Answer")',
                'constraint' => 50
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
    }

    function down()
    {
        $this->dbforge->drop_table('vote');
    }
}