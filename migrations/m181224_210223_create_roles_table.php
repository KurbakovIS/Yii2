<?php

use yii\db\Migration;

/**
 * Handles the creation of table `roles`.
 */
class m181224_210223_create_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('roles', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()
        ]);
        $this->addColumn('user','role_id','INT');
        $this->addForeignKey(
            'fk_users_roles',
            'user',
            'role_id',
            'roles',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('roles');
    }
}
