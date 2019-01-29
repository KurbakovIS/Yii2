<?php
/**
 * Created by PhpStorm.
 * User: Posi_
 * Date: 30.01.2019
 * Time: 0:44
 */

namespace app\commands;


use app\models\tables\Tasks;
use yii\console\Controller;
use yii\db\ActiveQuery;

class TaskController extends Controller
{
    public function actionDeadline()
    {
        /** @var ActiveQuery $tasks */
        $tasks = Tasks::find()
            ->where('DATEDIFF(NOW(), tasks.date) <=1')
            ->with('responsible')
            ->all();

        foreach ($tasks->each() as $task) {
            \Yii::$app->mailer->compose()
                ->setTo($task->responsible->email)
                ->setFrom('administrator@test.ru')
                ->setSubject('Task Deadline')
                ->setTextBody('У вас осталось мало времени')
                ->send();
        }
    }


}