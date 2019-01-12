<?php

use yii\db\Migration;

/**
 * Class m190112_185935_addColumn_tasks_table
 */
class m190112_185935_addColumn_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tasks','create_time',$this->date());
        $this->addColumn('tasks','update_time',$this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190112_185935_addColumn_tasks_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190112_185935_addColumn_tasks_table cannot be reverted.\n";

        return false;
    }
    */
}
