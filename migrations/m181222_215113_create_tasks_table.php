<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m181222_215113_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'login'=>$this->string(222)->notNull(),
            'password'=>$this->string(222)->notNull(),
            'name'=>$this->string(222),
        ]);
        $this->createIndex('ix_login','user','login',true);
        $this->addForeignKey(
            'fk_users_task',
            'tasks',
            'responsible_id',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
