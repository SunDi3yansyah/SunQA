<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Migration_Create_question extends CI_Migration
{
    function up()
    {
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
    }

    function down()
    {
        $this->dbforge->drop_table('question');
    }
}