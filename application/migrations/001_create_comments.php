<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Comments extends  CI_Migration
{
    public  function up()
    {
        $this->dbforge->add_field(array(
            'comment_id' => array(
                'type' => 'INT',
                'constraint' => '5',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'post_id' => array(
                'type' => 'INT',
                'constraint' => '11',
            ),
            'comment_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',

            ),
            'comment_email' => array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),
            'comment_body' => array(
                'type' => 'TEXT'

            ),
            'comment_date' => array(
                'type' => 'TIMESTAMP',

            ),

        ));
        $this->dbforge->add_key('comment_id',true);
        $this->dbforge->create_table('comments');

    }
    public function down()
    {
        $this->dbforge->drop_table('comments');
    }
}