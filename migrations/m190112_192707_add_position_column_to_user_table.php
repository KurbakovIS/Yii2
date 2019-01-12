<?php

use yii\db\Migration;

/**
 * Handles adding position to table `user`.
 */
class m190112_192707_add_position_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','create_time',$this->date());
        $this->addColumn('user','update_time',$this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
