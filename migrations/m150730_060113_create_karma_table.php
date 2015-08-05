<?php

class m150730_060113_create_karma_table extends EDbMigration
{
	public function up()
	{
        $this->createTable('karma', array(
            'id' => 'pk',
            'name' => 'varchar(100) NOT NULL',
            'points' => 'int(11) NOT NULL',
            'description' => 'TEXT',
        ), '');
	}

	public function down()
	{
        $this->dropTable('karma');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}