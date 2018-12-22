<?php
/**
 * Created by PhpStorm.
 * User: Posi_
 * Date: 22.12.2018
 * Time: 23:52
 */

namespace app\controllers;


use yii\web\Controller;

class DbController extends Controller
{
    public function actionIndex()
    {
        \Yii::$app->db->createCommand("
         INSERT INTO test (title,content) VALUES
            ('2323232','2323232')
        ")->execute();
    }
}