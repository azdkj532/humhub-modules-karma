<?php

class m150730_060312_create_karma_user_table extends EDbMigration
{
	public function up()
	{
        $this->createTable('karma_user', array(
            'id' => 'pk',
            'user_id' => 'int(11) NOT NULL',
            'karma_id' => 'int(11) NOT NULL',
            'created_at' => 'datetime DEFAULT NULL',
            'updated_at' => 'datetime DEFAULT NULL',
        ), '');
	}

	public function down()
	{
        $this->dropTable('karma_user');
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