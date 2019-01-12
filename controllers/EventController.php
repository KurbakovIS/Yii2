<?php
/**
 * Created by PhpStorm.
 * User: Posi_
 * Date: 12.01.2019
 * Time: 19:56
 */

namespace app\controllers;
use app\models\tables\Tasks;
use yii\web\Controller;

class EventController extends Controller
{

    public function actionIndex()
    {
        $model = new Tasks();

        $model->on(Tasks::EVENT_RUN_COMPLETE,  function (){
            'cbuyfk gjkexty';
        });

        $model->getTask();

    }



}