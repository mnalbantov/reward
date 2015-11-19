<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Blog extends  CI_Migration
{
    public  function up()
    {
        $this->dbforge->add_field(array(
            'blog_id' => array(
                'type' => 'INT',
                'constraint' => '5',
                'unsigned' => 'TRUE',
                'auto_increment' => 'TRUE'
            ),
            'blog_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'short_description' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',

            ),
            'post' => array(
                'type' => 'TEXT',
                'null' => 'TRUE',

            ),
            'author_id' => array(
                'type' => 'INT',
                'constraint' => '11',

            ),'picture' => array(
                'type' => 'VARCHAR',
                'constraint' => '350',
                'null' => 'TRUE',

            ),
            'date_published' => array(
                'type' => 'TIMESTAMP',

            ),

        ));
        $this->dbforge->add_key('blog_id',true);
        $this->dbforge->create_table('blog');

    }
    public function down()
    {
        $this->dbforge->drop_table('blog');
    }
}