<?php

namespace app\models\tables;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $name
 *
 * @property Tasks $id0
 */
class Users extends \yii\db\ActiveRecord
{
    const SCENARIO_AUTH = 'auth';


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_time',
                'updatedAtAttribute' => 'update_time',
//                'value' => new Expression('NOW()'),
                'value' => function () {
                    return date('Y-m-d H:i:s');
                }
            ]

        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login'], 'required'],
            [['name', 'login', 'password'], 'string', 'max' => 222],
            [['login'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::class, 'targetAttribute' => ['id' => 'responsible_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'name' => 'Name',
            'email' => 'Email',
            'role_id' => 'Role_id',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId()
    {
        return $this->hasOne(Tasks::class, ['responsible_id' => 'id']);
    }
    public function getRole()
    {
        return $this->hasOne(Roles::class, ['id' => 'role_id']);
    }

    public function fields()
    {
        if ($this->scenario == self::SCENARIO_AUTH) {
            return [
                'id',
                'username' => 'login',
                'password',
            ];
        }
        return parent::fields();
    }

    public static function getUsersList()
    {
        $users = static::find()
            ->select(['id', 'login'])
            ->asArray()
            ->all();

        return ArrayHelper::map($users, 'id', 'login');
    }
}
