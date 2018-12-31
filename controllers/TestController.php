<?php
/**
 * Created by PhpStorm.
 * User: Posi_
 * Date: 24.12.2018
 * Time: 23:43
 */

namespace app\controllers;


use app\models\tables\Tasks;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        $model = new Tasks();
        return $this->render('index', ['model' => $model]);
    }
}