<?php

use yii\db\Migration;

/**
 * Handles the creation of table `status`.
 */
class m190120_143648_create_status_table extends Migration
{
    protected $tableName = 'task_status';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)
        ]);

        $this->batchInsert($this->tableName, ['name'], [
            ['Новая'],
            ['В работе'],
            ['Выполнена'],
            ['Тестирование'],
            ['Доработка'],
            ['Закрыта'],
        ]);

        $taskTable = \app\models\tables\Tasks::tableName();

        $this->addColumn($taskTable, 'status', $this->integer());

        $this->addForeignKey('fk_task_statuses', $taskTable,'status', $this->tableName,
            'id');
        $this->update($taskTable, ['status' => 1]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('status');
    }
}
