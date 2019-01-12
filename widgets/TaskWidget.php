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
    public $model;

    public function run()
    {
        if (is_a($this->model, Tasks::class)) {
            return $this->render('task', ['model' => $this->model]);
        }
        throw new \Exception('Невозможно отобразить модель');
    }

}