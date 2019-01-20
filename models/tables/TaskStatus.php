<?php

namespace app\models\tables;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "task_status".
 *
 * @property int $id
 * @property string $name
 *
 * @property Tasks[] $tasks
 */
class TaskStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::className(), ['status' => 'id']);
    }

    public static function getList()
    {
        return ArrayHelper::map(
            static::find()
                ->select(['id', 'name'])
                ->asArray()
                ->indexBy('id')
                ->all(), 'id', 'name');

    }
}
