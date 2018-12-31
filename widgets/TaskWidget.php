<?php
/**
 * Created by PhpStorm.
 * User: Posi_
 * Date: 31.12.2018
 * Time: 12:06
 */

namespace app\widgets;


use app\models\tables\Tasks;
use app\models\tables\Users;
use yii\base\Widget;

class TaskWidget extends Widget
{
    public $names = '';

    public function run()
    {
        $tasks = Tasks::find()->all();
        $users = Users::find()->all();
        return $this->render('task', ['tasks' => $tasks, 'users' => $users]);
    }

}